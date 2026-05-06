from fastapi import FastAPI, HTTPException
from pydantic import BaseModel, Field
from typing import Optional, List, Dict, Any
from datetime import datetime
import uvicorn
import joblib
import os
import sys
import traceback

# Ajouter le dossier courant au path
sys.path.append(os.path.dirname(os.path.abspath(__file__)))

from train_model import ReclamationMLModel

# ============================================
# INITIALISATION DE L'API
# ============================================

app = FastAPI(
    title="ML API pour Gestion des Réclamations",
    description="API de Machine Learning pour la suggestion de réponses automatiques",
    version="1.0.0"
)

MODEL_PATH = os.environ.get('MODEL_PATH', 'model.pkl')
model = None

# ============================================
# MODÈLES PYDANTIC (Validation des données)
# ============================================

class ReclamationRequest(BaseModel):
    """Requête de prédiction"""
    description: str = Field(..., min_length=5, max_length=5000, description="Description de la réclamation")
    client_id: Optional[str] = Field(None, description="ID du client (optionnel)")
    commande_id: Optional[str] = Field(None, description="ID de la commande (optionnel)")

    class Config:
        json_schema_extra = {
            "example": {
                "description": "Mon colis n'est jamais arrivé commande #12345",
                "client_id": "C12345",
                "commande_id": "CMD-12345"
            }
        }


class PredictionResponse(BaseModel):
    """Réponse de prédiction"""
    success: bool
    categorie: str
    priorite: str
    sentiment: str
    confiance_categorie: float
    confiance_priorite: float
    confiance_sentiment: float
    reponse_suggerée: str
    a_reviser: bool
    timestamp: str

    class Config:
        json_schema_extra = {
            "example": {
                "success": True,
                "categorie": "livraison",
                "priorite": "haute",
                "sentiment": "negatif",
                "confiance_categorie": 0.85,
                "confiance_priorite": 0.75,
                "confiance_sentiment": 0.80,
                "reponse_suggerée": "Bonjour, je comprends votre frustration...",
                "a_reviser": False,
                "timestamp": "2026-04-26T16:30:00"
            }
        }


class FeedbackRequest(BaseModel):
    """Feedback pour améliorer le modèle"""
    reclamation_id: str
    categorie_corrigee: Optional[str] = None
    priorite_corrigee: Optional[str] = None
    sentiment_corrige: Optional[str] = None
    reponse_utilisee: str
    est_utile: bool

    class Config:
        json_schema_extra = {
            "example": {
                "reclamation_id": "rec_12345",
                "categorie_corrigee": "livraison",
                "priorite_corrigee": "haute",
                "sentiment_corrige": "negatif",
                "reponse_utilisee": "Merci pour votre message...",
                "est_utile": True
            }
        }


# ============================================
# STOCKAGE TEMPORAIRE
# ============================================

feedbacks: List[Dict[str, Any]] = []
prediction_counter: int = 0

# ============================================
# ÉVÉNEMENTS DE DÉMARRAGE
# ============================================

@app.on_event("startup")
async def load_model():
    """Charge ou entraîne le modèle au démarrage"""
    global model
    
    print("=" * 50)
    print("🚀 Démarrage du service ML...")
    print("=" * 50)
    
    try:
        # Étape 1: Importer la classe
        print("📦 1. Chargement de la classe ReclamationMLModel...")
        print("   ✅ Classe chargée")
        
        # Étape 2: Créer l'instance
        print("🔧 2. Création de l'instance du modèle...")
        model = ReclamationMLModel()
        print("   ✅ Instance créée")
        
        # Étape 3: Charger ou entraîner le modèle
        if os.path.exists(MODEL_PATH):
            print(f"💾 3. Chargement du modèle depuis {MODEL_PATH}...")
            model.load_model(MODEL_PATH)
            print("   ✅ Modèle chargé avec succès")
        else:
            print(f"⚠️ 3. Modèle non trouvé à {MODEL_PATH}")
            print("   🧠 Lancement de l'entraînement...")
            
            data_path = 'data/reclamations.csv'
            if not os.path.exists(data_path):
                print(f"   ❌ Fichier de données non trouvé: {data_path}")
                print("   Créez le fichier data/reclamations.csv avec des données d'exemple")
                model = None
                return
            
            print(f"   📊 Entraînement avec {data_path}...")
            model.train(data_path)
            model.save_model(MODEL_PATH)
            print("   ✅ Modèle entraîné et sauvegardé")
        
        # Étape 4: Vérification
        print("✅ 4. Service ML prêt !")
        print("=" * 50)
        
    except Exception as e:
        print(f"\n❌ ERREUR lors du chargement du modèle:")
        print(f"   Type: {type(e).__name__}")
        print(f"   Message: {str(e)}")
        print("\n📋 Détails complets:")
        traceback.print_exc()
        model = None
        print("=" * 50)


# ============================================
# ENDPOINTS API
# ============================================

@app.get("/")
async def root():
    """Endpoint racine - Informations sur l'API"""
    return {
        "service": "ML API pour Gestion des Réclamations",
        "version": "1.0.0",
        "status": "running" if model else "degraded",
        "model_loaded": model is not None,
        "endpoints": {
            "GET /": "Informations sur l'API",
            "GET /health": "Health check",
            "POST /predict": "Prédire catégorie, priorité, sentiment et réponse",
            "POST /feedback": "Envoyer un feedback",
            "GET /stats": "Statistiques d'utilisation"
        }
    }


@app.get("/health")
async def health():
    """Health check pour monitoring"""
    return {
        "status": "healthy" if model is not None else "unhealthy",
        "model_loaded": model is not None,
        "timestamp": datetime.now().isoformat()
    }


@app.post("/predict", response_model=PredictionResponse)
async def predict(request: ReclamationRequest):
    """Prédit la catégorie, priorité, sentiment et génère une réponse suggérée"""
    global prediction_counter
    
    # Vérifier que le modèle est chargé
    if model is None:
        raise HTTPException(
            status_code=503, 
            detail="Modèle non disponible. Vérifiez les logs pour plus d'informations."
        )
    
    try:
        print(f"📝 Prédiction en cours pour: {request.description[:50]}...")
        
        # Appeler le modèle
        result = model.predict(request.description)
        
        # Incrémenter le compteur
        prediction_counter += 1
        
        print(f"   ✅ Prédiction: {result.get('categorie')} / {result.get('priorite')} / {result.get('sentiment')}")
        
        return PredictionResponse(
            success=True,
            categorie=result.get('categorie', 'autre'),
            priorite=result.get('priorite', 'basse'),
            sentiment=result.get('sentiment', 'neutre'),
            confiance_categorie=float(result.get('confiance_categorie', 0.5)),
            confiance_priorite=float(result.get('confiance_priorite', 0.5)),
            confiance_sentiment=float(result.get('confiance_sentiment', 0.5)),
            reponse_suggerée=result.get('reponse_suggerée', "Je reviens vers vous rapidement."),
            a_reviser=bool(result.get('a_reviser', True)),
            timestamp=datetime.now().isoformat()
        )
        
    except Exception as e:
        print(f"   ❌ Erreur: {str(e)}")
        raise HTTPException(status_code=500, detail=f"Erreur de prédiction: {str(e)}")


@app.post("/feedback")
async def send_feedback(feedback: FeedbackRequest):
    """Collecte les feedbacks pour améliorer le modèle"""
    global feedbacks
    
    # Ajouter le feedback avec timestamp
    feedback_dict = feedback.dict()
    feedback_dict['timestamp'] = datetime.now().isoformat()
    feedbacks.append(feedback_dict)
    
    # Sauvegarder pour réentraînement futur
    import json
    try:
        with open('feedbacks.json', 'a', encoding='utf-8') as f:
            f.write(json.dumps(feedback_dict, ensure_ascii=False) + '\n')
        print(f"📝 Feedback enregistré (total: {len(feedbacks)})")
    except Exception as e:
        print(f"⚠️ Erreur sauvegarde feedback: {e}")
    
    return {
        "message": "Feedback enregistré, merci pour votre contribution !",
        "total_feedbacks": len(feedbacks)
    }


@app.get("/stats")
async def get_stats():
    """Retourne les statistiques d'utilisation"""
    return {
        "total_predictions": prediction_counter,
        "total_feedbacks": len(feedbacks),
        "model_ready": model is not None,
        "model_info": {
            "categories": list(model.category_encoder.classes_) if model and hasattr(model, 'category_encoder') else [],
            "priorities": list(model.priority_encoder.classes_) if model and hasattr(model, 'priority_encoder') else [],
            "sentiments": list(model.sentiment_encoder.classes_) if model and hasattr(model, 'sentiment_encoder') else []
        } if model else {}
    }


@app.get("/categories")
async def get_categories():
    """Retourne la liste des catégories disponibles"""
    if model is None:
        return {"categories": [], "priorities": [], "sentiments": []}
    
    return {
        "categories": list(model.category_encoder.classes_) if hasattr(model, 'category_encoder') else [],
        "priorities": list(model.priority_encoder.classes_) if hasattr(model, 'priority_encoder') else [],
        "sentiments": list(model.sentiment_encoder.classes_) if hasattr(model, 'sentiment_encoder') else []
    }


# ============================================
# POINT D'ENTRÉE PRINCIPAL
# ============================================

if __name__ == "__main__":
    print("\n" + "=" * 50)
    print("🚀 Démarrage du serveur ML API")
    print("=" * 50)
    
    # CORRECTION: Utiliser le port 8001 pour éviter conflit avec Symfony
    port = int(os.environ.get('ML_API_PORT', 8001))
    host = os.environ.get('ML_API_HOST', '127.0.0.1')
    
    print(f"📡 Serveur: http://{host}:{port}")
    print(f"📖 Documentation: http://{host}:{port}/docs")
    print("=" * 50 + "\n")
    
    uvicorn.run(
        app, 
        host=host, 
        port=port,
        reload=False,
        log_level="info"
    )