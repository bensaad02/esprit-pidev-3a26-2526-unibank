from fastapi import FastAPI, UploadFile, File, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import tempfile
import os
import time
import logging

from rag_engine import generate_answer, build_index, get_collection

logging.basicConfig(level=logging.INFO, format="[%(asctime)s] %(levelname)s: %(message)s")
logger = logging.getLogger("unibank-ai")

app = FastAPI(title="UniBank+ AI Chatbot", version="1.0.0")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["*"],
    allow_headers=["*"],
)

# whisper model
_whisper_model = None

def get_whisper_model():
    global _whisper_model
    if _whisper_model is None:
        logger.info("Loading Whisper model (small)... this may take a moment.")
        from faster_whisper import WhisperModel
        _whisper_model = WhisperModel(
            "small",
            device="cpu",
            compute_type="int8"
        )
        logger.info("Whisper model loaded.")
    return _whisper_model


class ChatRequest(BaseModel):
    message: str

class ChatResponse(BaseModel):
    response: str
    time_ms: int

class TranscribeResponse(BaseModel):
    text: str
    language: str
    time_ms: int


# startup
@app.on_event("startup")
async def startup():
    try:
        col = get_collection()
        if col.count() == 0:
            logger.info("Building RAG index...")
            build_index()
        else:
            logger.info(f"RAG index ready ({col.count()} documents)")
    except Exception as e:
        logger.warning(f"RAG index issue, rebuilding: {e}")
        build_index()


@app.get("/health")
async def health():
    return {"status": "ok", "model": os.getenv("OLLAMA_MODEL", "qwen2.5:3b")}


# chat endpoint
@app.post("/chat", response_model=ChatResponse)
async def chat(req: ChatRequest):
    if not req.message or not req.message.strip():
        raise HTTPException(status_code=400, detail="Message vide")

    message = req.message.strip()
    if len(message) > 500:
        raise HTTPException(status_code=400, detail="Message trop long (max 500 caractères)")

    logger.info(f"Chat: {message[:80]}...")
    start = time.time()

    try:
        answer = generate_answer(message)
    except Exception as e:
        logger.error(f"Chat error: {e}")
        raise HTTPException(status_code=500, detail=str(e))

    elapsed = int((time.time() - start) * 1000)
    logger.info(f"Chat response in {elapsed}ms")
    return ChatResponse(response=answer, time_ms=elapsed)


# speech to text endpoint
@app.post("/transcribe", response_model=TranscribeResponse)
async def transcribe(file: UploadFile = File(...)):
    if not file.filename:
        raise HTTPException(status_code=400, detail="Fichier audio requis")

    allowed = {".wav", ".mp3", ".m4a", ".ogg", ".flac", ".webm"}
    ext = os.path.splitext(file.filename)[1].lower()
    if ext not in allowed:
        raise HTTPException(status_code=400, detail=f"Format non supporté. Formats acceptés: {', '.join(allowed)}")

    start = time.time()

    with tempfile.NamedTemporaryFile(suffix=ext, delete=False) as tmp:
        content = await file.read()
        tmp.write(content)
        tmp_path = tmp.name

    try:
        model = get_whisper_model()
        segments, info = model.transcribe(
            tmp_path,
            beam_size=5,
            vad_filter=True
        )
        text = " ".join(seg.text.strip() for seg in segments)
        elapsed = int((time.time() - start) * 1000)
        logger.info(f"Transcribed ({info.language}, {elapsed}ms): {text[:80]}...")
        return TranscribeResponse(text=text, language=info.language, time_ms=elapsed)
    except Exception as e:
        logger.error(f"Transcription error: {e}")
        raise HTTPException(status_code=500, detail=f"Erreur de transcription: {str(e)}")
    finally:
        os.unlink(tmp_path)


# rebuild index
@app.post("/rebuild-index")
async def rebuild_index():
    build_index()
    col = get_collection()
    return {"status": "ok", "documents": col.count()}


if __name__ == "__main__":
    import uvicorn
    port = int(os.getenv("PORT", "8000"))
    logger.info(f"Starting UniBank+ AI server on port {port}...")
    uvicorn.run(app, host="0.0.0.0", port=port)
