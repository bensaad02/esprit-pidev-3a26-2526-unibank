#!/bin/bash
# UniBank+ AI - One-Click Launcher
# Works on macOS, Linux, and Windows (Git Bash / MINGW64).
# Usage: bash start.sh

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$SCRIPT_DIR"

VENV_DIR="$SCRIPT_DIR/venv"
MODEL_NAME="qwen2.5:3b"
WHISPER_MODEL="small"
SERVER_PORT="${PORT:-8001}"

# ── Detect OS ────────────────────────────
if [[ "$OSTYPE" == "darwin"* ]]; then
    OS_TYPE="macos"
elif [[ "$OSTYPE" == "msys" || "$OSTYPE" == "cygwin" || "$OSTYPE" == "mingw"* ]]; then
    OS_TYPE="windows"
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    OS_TYPE="linux"
else
    OS_TYPE="linux"
    echo "Unknown OS ($OSTYPE), assuming Linux."
fi

# Python command name differs per OS
if [ "$OS_TYPE" = "windows" ]; then
    PY_CMD="python"
else
    PY_CMD="python3"
fi

# ── Windows: locate Ollama on PATH ──────
refresh_ollama_path_windows() {
    [ "$OS_TYPE" != "windows" ] && return 0
    command -v ollama &>/dev/null && return 0
    # Convert Windows LOCALAPPDATA to Unix path and check default install dir
    local ollama_dir
    ollama_dir="$(cygpath -u "$LOCALAPPDATA/Programs/Ollama" 2>/dev/null)"
    if [ -n "$ollama_dir" ] && [ -f "$ollama_dir/ollama.exe" ]; then
        export PATH="$PATH:$ollama_dir"
        return 0
    fi
    # Fallback: ask PowerShell to find ollama.exe on the Windows PATH
    local ps_dir
    ps_dir="$(powershell.exe -NoProfile -Command "
        \$p = (Get-Command ollama.exe -ErrorAction SilentlyContinue).Source;
        if (\$p) { Split-Path \$p }
    " 2>/dev/null | tr -d '\r')"
    if [ -n "$ps_dir" ]; then
        local unix_dir
        unix_dir="$(cygpath -u "$ps_dir" 2>/dev/null)"
        [ -n "$unix_dir" ] && export PATH="$PATH:$unix_dir"
    fi
}

# colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m'
CHECK="${GREEN}✓${NC}"
SKIP="${YELLOW}⏭${NC}"
WORK="${BLUE}⏳${NC}"
FAIL="${RED}✗${NC}"

step=0
total=8

print_step() {
    step=$((step + 1))
    echo ""
    echo -e "${BLUE}[$step/$total]${NC} $1"
    echo "─────────────────────────────────────────"
}

# ──────────────────────────────────────────
# Step 1: Check Python
# ──────────────────────────────────────────
print_step "Checking Python..."
if command -v $PY_CMD &>/dev/null; then
    PY_VERSION=$($PY_CMD --version 2>&1)
    PY_MINOR=$($PY_CMD -c "import sys; print(sys.version_info.minor)" 2>/dev/null)
    PY_MAJOR=$($PY_CMD -c "import sys; print(sys.version_info.major)" 2>/dev/null)

    if [ "$PY_MAJOR" = "3" ] && [ "$PY_MINOR" -ge 13 ] 2>/dev/null; then
        echo -e "  ${FAIL} $PY_VERSION detected — too new!"
        echo ""
        echo -e "  ${YELLOW}AI/ML packages (pydantic, chromadb, torch, etc.) don't support"
        echo -e "  Python 3.13+ yet. You MUST use Python 3.11 or 3.12.${NC}"
        echo ""
        echo "  ↓ Download Python 3.11.9:"
        echo "    https://www.python.org/ftp/python/3.11.9/python-3.11.9-amd64.exe"
        echo ""
        echo "  During install:"
        echo "    1. Check 'Add python.exe to PATH'"
        echo "    2. Click 'Install Now'"
        echo "    3. After install, CLOSE this terminal and open a new one"
        echo "    4. Delete the venv folder: rm -rf venv"
        echo "    5. Run: bash start.sh"
        exit 1
    fi

    echo -e "  ${CHECK} $PY_VERSION found"
else
    echo -e "  ${FAIL} Python 3 not found."
    if [ "$OS_TYPE" = "windows" ]; then
        echo "  Please install Python 3.11 or 3.12 from https://www.python.org/downloads/"
        echo "  Make sure to check 'Add Python to PATH' during installation."
    else
        echo "  Please install Python 3.11 or 3.12 first."
    fi
    exit 1
fi

# ──────────────────────────────────────────
# Step 2: Check/Install Ollama
# ──────────────────────────────────────────
print_step "Checking Ollama..."
# On Windows, Ollama may already be installed but not on the Git Bash PATH
refresh_ollama_path_windows

if command -v ollama &>/dev/null; then
    echo -e "  ${CHECK} Ollama is installed"
else
    echo -e "  ${WORK} Ollama not found. Installing..."

    if [ "$OS_TYPE" = "macos" ]; then
        if command -v brew &>/dev/null; then
            brew install ollama
        else
            echo -e "  ${WORK} Downloading Ollama for macOS..."
            curl -fsSL https://ollama.com/install.sh | sh
        fi

    elif [ "$OS_TYPE" = "linux" ]; then
        curl -fsSL https://ollama.com/install.sh | sh

    elif [ "$OS_TYPE" = "windows" ]; then
        echo -e "  ${WORK} Downloading Ollama installer for Windows..."
        # Silent install: /VERYSILENT prevents the GUI from blocking the script
        powershell.exe -NoProfile -Command "
            [Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12;
            \$outFile = Join-Path \$env:TEMP 'OllamaSetup.exe';
            Write-Host \"Downloading from ollama.com to \$outFile ...\";
            Invoke-WebRequest -Uri 'https://ollama.com/download/OllamaSetup.exe' -OutFile \$outFile -UseBasicParsing;
            if (Test-Path \$outFile) {
                Write-Host 'Download complete. Installing silently...';
                Start-Process -FilePath \$outFile -ArgumentList '/VERYSILENT /SUPPRESSMSGBOXES /NORESTART /SP-' -Wait;
                Remove-Item \$outFile -Force -ErrorAction SilentlyContinue;
                Write-Host 'Ollama installed.';
            } else {
                Write-Host 'ERROR: Download failed.';
                exit 1;
            }
        "
        echo -e "  ${WORK} Waiting for Ollama to initialize..."
        sleep 3
        # Refresh PATH so bash can find the new ollama.exe
        refresh_ollama_path_windows
    fi

    # Final verification (also refreshes PATH on Windows one more time)
    refresh_ollama_path_windows
    if command -v ollama &>/dev/null; then
        echo -e "  ${CHECK} Ollama installed successfully"
    else
        echo -e "  ${FAIL} Ollama installation failed. Please install manually from https://ollama.com"
        exit 1
    fi
fi

# ──────────────────────────────────────────
# Step 3: Start Ollama server
# ──────────────────────────────────────────
print_step "Starting Ollama server..."
if curl -s http://localhost:11434/api/tags &>/dev/null; then
    echo -e "  ${CHECK} Ollama server already running"
else
    echo -e "  ${WORK} Starting Ollama server in background..."

    if [ "$OS_TYPE" = "macos" ]; then
        osascript -e 'tell application "Terminal"
            do script "ollama serve"
            activate
        end tell' &>/dev/null

    elif [ "$OS_TYPE" = "windows" ]; then
        # Use PowerShell to start Ollama in a new window (more reliable than cmd)
        powershell.exe -NoProfile -Command "Start-Process ollama -ArgumentList 'serve' -WindowStyle Normal" &>/dev/null

    else
        nohup ollama serve > /tmp/ollama.log 2>&1 &
    fi

    for i in $(seq 1 20); do
        if curl -s http://localhost:11434/api/tags &>/dev/null; then
            break
        fi
        sleep 1
    done

    if curl -s http://localhost:11434/api/tags &>/dev/null; then
        echo -e "  ${CHECK} Ollama server running"
        if [ "$OS_TYPE" = "macos" ]; then
            echo -e "  ${YELLOW}Note: Keep the Terminal window open while using UniBank+.${NC}"
        elif [ "$OS_TYPE" = "windows" ]; then
            echo -e "  ${YELLOW}Note: Keep the Ollama window open while using UniBank+.${NC}"
        else
            echo -e "  ${YELLOW}Note: Ollama running in background (log: /tmp/ollama.log)${NC}"
        fi
    else
        echo -e "  ${FAIL} Failed to start Ollama server. Try running 'ollama serve' manually."
        exit 1
    fi
fi

# ──────────────────────────────────────────
# Step 4: Pull model if needed
# ──────────────────────────────────────────
print_step "Checking model '$MODEL_NAME'..."
if ollama list 2>/dev/null | grep -q "$MODEL_NAME"; then
    echo -e "  ${CHECK} Model '$MODEL_NAME' already downloaded"
else
    echo -e "  ${WORK} Downloading model '$MODEL_NAME' (this may take a few minutes)..."
    ollama pull "$MODEL_NAME"
    echo -e "  ${CHECK} Model '$MODEL_NAME' downloaded"
fi

# ──────────────────────────────────────────
# Step 5: Create venv & install dependencies
# ──────────────────────────────────────────
print_step "Setting up Python environment..."

# venv activate path differs on Windows vs Unix
if [ "$OS_TYPE" = "windows" ]; then
    VENV_ACTIVATE="$VENV_DIR/Scripts/activate"
else
    VENV_ACTIVATE="$VENV_DIR/bin/activate"
fi

# If venv exists but was built with a different Python version, nuke it
if [ -d "$VENV_DIR" ] && [ -f "$VENV_ACTIVATE" ]; then
    source "$VENV_ACTIVATE" 2>/dev/null || true
    VENV_PY_VER=$(python --version 2>&1 || echo "unknown")
    SYSTEM_PY_VER=$($PY_CMD --version 2>&1)
    deactivate 2>/dev/null || true
    if [ "$VENV_PY_VER" != "$SYSTEM_PY_VER" ]; then
        echo -e "  ${YELLOW}⚠  Existing venv uses $VENV_PY_VER but system has $SYSTEM_PY_VER${NC}"
        echo -e "  ${WORK} Removing old venv and recreating..."
        rm -rf "$VENV_DIR"
    fi
fi

if [ -d "$VENV_DIR" ] && [ -f "$VENV_ACTIVATE" ]; then
    echo -e "  ${CHECK} Virtual environment already exists"
    source "$VENV_ACTIVATE"

    MISSING=false
    while IFS= read -r line; do
        pkg=$(echo "$line" | cut -d'=' -f1)
        if [ -n "$pkg" ] && ! pip show "$pkg" &>/dev/null; then
            MISSING=true
            break
        fi
    done < requirements.txt

    if [ "$MISSING" = true ]; then
        echo -e "  ${WORK} Some packages missing, installing..."
        python -m pip install -r requirements.txt --quiet
        echo -e "  ${CHECK} Dependencies installed"
    else
        echo -e "  ${CHECK} All dependencies already installed"
    fi
else
    echo -e "  ${WORK} Creating virtual environment..."
    $PY_CMD -m venv "$VENV_DIR"
    source "$VENV_ACTIVATE"
    echo -e "  ${WORK} Upgrading pip..."
    python -m pip install --upgrade pip --quiet 2>/dev/null || true
    echo -e "  ${WORK} Installing dependencies (first time, may take a few minutes)..."
    python -m pip install -r requirements.txt --quiet
    echo -e "  ${CHECK} Virtual environment created and dependencies installed"
fi

# ──────────────────────────────────────────
# Step 6: Build RAG index if needed
# ──────────────────────────────────────────
print_step "Checking RAG knowledge base index..."
if [ -d "$SCRIPT_DIR/.chroma_db" ] && [ "$(ls -A "$SCRIPT_DIR/.chroma_db" 2>/dev/null)" ]; then
    if [ "$SCRIPT_DIR/dataset/knowledge.txt" -nt "$SCRIPT_DIR/.chroma_db" ]; then
        echo -e "  ${WORK} Knowledge base updated, rebuilding index..."
        python -c "from rag_engine import build_index; build_index()"
        echo -e "  ${CHECK} Index rebuilt"
    else
        echo -e "  ${CHECK} RAG index already up to date"
    fi
else
    echo -e "  ${WORK} Building RAG index for the first time..."
    python -c "from rag_engine import build_index; build_index()"
    echo -e "  ${CHECK} RAG index built"
fi

# ──────────────────────────────────────────
# Step 7: Download Whisper model if needed
# ──────────────────────────────────────────
print_step "Checking Whisper speech-to-text model..."
WHISPER_CACHED=$(python -c "
import os
from faster_whisper.utils import download_model
try:
    model_dir = download_model('$WHISPER_MODEL', output_dir=None)
    if os.path.isdir(model_dir):
        print('yes')
    else:
        print('no')
except:
    print('no')
" 2>/dev/null || echo "no")

if [ "$WHISPER_CACHED" = "yes" ]; then
    echo -e "  ${CHECK} Whisper model '$WHISPER_MODEL' already downloaded"
else
    echo -e "  ${WORK} Downloading Whisper model '$WHISPER_MODEL' (this may take a minute)..."
    python -c "
from faster_whisper import WhisperModel
print('Downloading and loading Whisper model...')
model = WhisperModel('$WHISPER_MODEL', device='cpu', compute_type='int8')
print('Done.')
"
    echo -e "  ${CHECK} Whisper model '$WHISPER_MODEL' downloaded"
fi

# ──────────────────────────────────────────
# Step 8: Start FastAPI server
# ──────────────────────────────────────────
print_step "Starting UniBank+ AI server..."
if curl -s "http://localhost:$SERVER_PORT/health" &>/dev/null; then
    echo -e "  ${SKIP} Server already running on port $SERVER_PORT"
    echo ""
    echo -e "${GREEN}════════════════════════════════════════════${NC}"
    echo -e "${GREEN}  UniBank+ AI is ready!${NC}"
    echo -e "${GREEN}  Server: http://localhost:$SERVER_PORT${NC}"
    echo -e "${GREEN}════════════════════════════════════════════${NC}"
    echo ""
else
    # kill anything on the port first
    if [ "$OS_TYPE" = "macos" ]; then
        lsof -ti:$SERVER_PORT 2>/dev/null | xargs kill -9 2>/dev/null || true
    elif [ "$OS_TYPE" = "windows" ]; then
        WIN_PID=$(netstat -ano 2>/dev/null | grep ":$SERVER_PORT " | grep LISTENING | awk '{print $NF}' | head -1)
        if [ -n "$WIN_PID" ]; then
            taskkill //PID "$WIN_PID" //F &>/dev/null || true
        fi
    else
        fuser -k $SERVER_PORT/tcp 2>/dev/null || true
    fi
    sleep 1

    echo ""
    echo -e "${GREEN}════════════════════════════════════════════${NC}"
    echo -e "${GREEN}  UniBank+ AI is starting!${NC}"
    echo -e "${GREEN}  Server: http://localhost:$SERVER_PORT${NC}"
    echo -e "${GREEN}  Press Ctrl+C to stop${NC}"
    echo -e "${GREEN}════════════════════════════════════════════${NC}"
    echo ""

    export PORT="$SERVER_PORT"
    python server.py
fi
