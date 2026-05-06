import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
from sklearn.pipeline import Pipeline
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report, accuracy_score
import joblib
import json
import warnings
from preprocess import DataPreprocessor

warnings.filterwarnings('ignore')

class ReclamationMLModel:
    def __init__(self):
        self.preprocessor = DataPreprocessor()
        self.vectorizer = TfidfVectorizer(
            max_features=1500,
            ngram_range=(1, 3),
            min_df=1,
            sublinear_tf=True
        )
        
        # Modèles pour chaque tâche
        self.category_model = RandomForestClassifier(
            n_estimators=100,
            max_depth=15,
            random_state=42,
            n_jobs=-1
        )
        
        self.priority_model = RandomForestClassifier(
            n_estimators=100,
            max_depth=15,
            random_state=42,
            n_jobs=-1
        )
        
        self.sentiment_model = RandomForestClassifier(
            n_estimators=100,
            max_depth=10,
            random_state=42,
            n_jobs=-1
        )
        
        # Encodeurs
        self.category_encoder = LabelEncoder()
        self.priority_encoder = LabelEncoder()
        self.sentiment_encoder = LabelEncoder()
        
        # Templates de réponses
        self.response_templates = {}
    
    def train(self, data_path='data/reclamations.csv'):
        """Entraîne tous les modèles"""
        print("=" * 50)
        print("📚 Chargement des données...")
        print("=" * 50)
        df = pd.read_csv(data_path)
        print(f"   ✅ {len(df)} réclamations chargées")
        
        # Préparation des données
        print("\n🔧 Prétraitement des données...")
        df = self.preprocessor.prepare_training_data(df)
        print("   ✅ Prétraitement terminé")
        
        # Vectorisation du texte
        print("\n📊 Vectorisation du texte...")
        X_text = self.vectorizer.fit_transform(df['description_clean'])
        print(f"   ✅ {X_text.shape[1]} features créées")
        
        # Caractéristiques numériques
        X_numeric = df[['longueur', 'nb_mots', 'score_urgence', 'score_frustration']].values
        
        # Combiner les features
        from scipy.sparse import hstack
        X = hstack([X_text, X_numeric])
        
        # Encodage des cibles
        y_category = self.category_encoder.fit_transform(df['categorie'])
        y_priority = self.priority_encoder.fit_transform(df['priorite'])
        y_sentiment = self.sentiment_encoder.fit_transform(df['sentiment'])
        
        print(f"\n📋 Classes détectées:")
        print(f"   - Catégories: {list(self.category_encoder.classes_)}")
        print(f"   - Priorités: {list(self.priority_encoder.classes_)}")
        print(f"   - Sentiments: {list(self.sentiment_encoder.classes_)}")
        
        # Sauvegarder les templates de réponses
        for _, row in df.iterrows():
            if 'reponse_template' in row and pd.notna(row['reponse_template']):
                key = f"{row['categorie']}_{row['priorite']}_{row['sentiment']}"
                if key not in self.response_templates:
                    self.response_templates[key] = row['reponse_template']
        
        # Entraînement
        print("\n🤖 Entraînement des modèles...")
        print("   - Modèle de catégorie...")
        self.category_model.fit(X, y_category)
        
        print("   - Modèle de priorité...")
        self.priority_model.fit(X, y_priority)
        
        print("   - Modèle de sentiment...")
        self.sentiment_model.fit(X, y_sentiment)
        
        # Évaluation
        print("\n📈 Évaluation des modèles:")
        
        # Catégorie
        y_pred_cat = self.category_model.predict(X)
        cat_acc = accuracy_score(y_category, y_pred_cat)
        print(f"  ✅ Catégorie: {cat_acc:.2%}")
        
        # Priorité
        y_pred_prio = self.priority_model.predict(X)
        prio_acc = accuracy_score(y_priority, y_pred_prio)
        print(f"  ✅ Priorité: {prio_acc:.2%}")
        
        # Sentiment
        y_pred_sent = self.sentiment_model.predict(X)
        sent_acc = accuracy_score(y_sentiment, y_pred_sent)
        print(f"  ✅ Sentiment: {sent_acc:.2%}")
        
        print("\n" + "=" * 50)
        print("✅ Entraînement terminé avec succès!")
        print("=" * 50)
        
        return self
    
    def predict(self, description):
        """Prédit catégorie, priorité et sentiment"""
        # Préparer l'entrée
        df_temp = pd.DataFrame({'description': [description]})
        df_temp = self.preprocessor.prepare_training_data(df_temp)
        
        # Vectorisation
        X_text = self.vectorizer.transform(df_temp['description_clean'])
        X_numeric = df_temp[['longueur', 'nb_mots', 'score_urgence', 'score_frustration']].values
        
        from scipy.sparse import hstack
        X = hstack([X_text, X_numeric])
        
        # Prédictions
        cat_idx = self.category_model.predict(X)[0]
        prio_idx = self.priority_model.predict(X)[0]
        sent_idx = self.sentiment_model.predict(X)[0]
        
        # Probabilités (confiance)
        cat_proba = self.category_model.predict_proba(X)[0]
        prio_proba = self.priority_model.predict_proba(X)[0]
        sent_proba = self.sentiment_model.predict_proba(X)[0]
        
        results = {
            'categorie': self.category_encoder.inverse_transform([cat_idx])[0],
            'priorite': self.priority_encoder.inverse_transform([prio_idx])[0],
            'sentiment': self.sentiment_encoder.inverse_transform([sent_idx])[0],
            'confiance_categorie': float(max(cat_proba)),
            'confiance_priorite': float(max(prio_proba)),
            'confiance_sentiment': float(max(sent_proba)),
            'a_reviser': max(cat_proba) < 0.6 or max(prio_proba) < 0.6
        }
        
        # Générer une réponse suggérée
        results['reponse_suggerée'] = self.generate_response(results, description)
        
        return results
    
    def generate_response(self, prediction, original_description):
        """Génère une réponse personnalisée basée sur la prédiction"""
        key = f"{prediction['categorie']}_{prediction['priorite']}_{prediction['sentiment']}"
        
        # Vérifier si on a un template
        if key in self.response_templates:
            return self.response_templates[key]
        
        # Templates par défaut
        templates = {
            'livraison_haute_negatif': "Bonjour,\n\nJe comprends votre frustration concernant votre livraison. Notre service logistique va immédiatement localiser votre colis. Vous recevrez une mise à jour sous 24h.\n\nCordialement,\nL'équipe support",
            'livraison_haute_neutre': "Bonjour,\n\nJe prends en charge votre demande concernant la livraison. Je vais vérifier le statut de votre commande et vous tiens informé.\n\nCordialement,\nL'équipe support",
            'facturation_haute_negatif': "Bonjour,\n\nJe suis désolé pour cette erreur de facturation. Je vais vérifier votre dossier immédiatement et corriger le problème.\n\nCordialement,\nL'équipe financière",
            'facturation_moyenne_negatif': "Bonjour,\n\nJe comprends votre mécontentement concernant la facturation. Je vais analyser votre situation et revenir vers vous rapidement.\n\nCordialement,\nL'équipe financière",
            'technique_haute_negatif': "Bonjour,\n\nJe comprends votre urgence. Notre équipe technique a été alertée et va résoudre ce problème dans les plus brefs délais.\n\nCordialement,\nL'équipe technique",
            'technique_basse_neutre': "Bonjour,\n\nJe comprends votre demande. Notre équipe va analyser la situation et vous apportera une solution rapidement.\n\nCordialement,\nL'équipe technique",
            'compte_haute_negatif': "Bonjour,\n\nJe comprends votre situation concernant votre compte. Je vais vous aider à résoudre ce problème immédiatement.\n\nCordialement,\nL'équipe support",
            'carte_haute_negatif': "Bonjour,\n\nJe comprends votre inquiétude concernant votre carte bancaire. Nous allons immédiatement prendre les mesures nécessaires.\n\nCordialement,\nL'équipe sécurité",
            'default': "Bonjour,\n\nMerci pour votre message. J'ai bien pris connaissance de votre réclamation.\n\nNotre équipe va étudier votre demande et reviendra vers vous dans les plus brefs délais.\n\nCordialement,\nL'équipe support client"
        }
        
        base_key = f"{prediction['categorie']}_{prediction['priorite']}_{prediction['sentiment']}"
        
        if base_key in templates:
            return templates[base_key]
        
        # Essayer sans le sentiment
        fallback_key = f"{prediction['categorie']}_{prediction['priorite']}"
        if fallback_key in templates:
            return templates[fallback_key]
        
        return templates['default']
    
    def save_model(self, path='model.pkl'):
        """Sauvegarde le modèle complet"""
        model_data = {
            'category_model': self.category_model,
            'priority_model': self.priority_model,
            'sentiment_model': self.sentiment_model,
            'vectorizer': self.vectorizer,
            'category_encoder': self.category_encoder,
            'priority_encoder': self.priority_encoder,
            'sentiment_encoder': self.sentiment_encoder,
            'response_templates': self.response_templates,
            'preprocessor': self.preprocessor
        }
        joblib.dump(model_data, path)
        print(f"\n💾 Modèle sauvegardé dans {path}")
        print(f"   Taille: {round(joblib.load(path).__sizeof__() / 1024, 2)} KB")
    
    def load_model(self, path='model.pkl'):
        """Charge un modèle sauvegardé"""
        print(f"📂 Chargement du modèle depuis {path}...")
        model_data = joblib.load(path)
        self.category_model = model_data['category_model']
        self.priority_model = model_data['priority_model']
        self.sentiment_model = model_data['sentiment_model']
        self.vectorizer = model_data['vectorizer']
        self.category_encoder = model_data['category_encoder']
        self.priority_encoder = model_data['priority_encoder']
        self.sentiment_encoder = model_data['sentiment_encoder']
        self.response_templates = model_data.get('response_templates', {})
        self.preprocessor = model_data.get('preprocessor', DataPreprocessor())
        print("✅ Modèle chargé avec succès")

if __name__ == "__main__":
    print("\n" + "=" * 50)
    print("🧠 ENTRAÎNEMENT DU MODÈLE ML")
    print("=" * 50)
    
    # Entraînement du modèle
    model = ReclamationMLModel()
    model.train('data/reclamations.csv')
    model.save_model('model.pkl')
    
    # Test du modèle
    print("\n" + "=" * 50)
    print("🧪 TEST DU MODÈLE")
    print("=" * 50)
    
    test_texts = [
        "Mon colis n'est jamais arrivé, commande #12345",
        "Problème sur ma facture de ce mois",
        "Comment réinitialiser mon mot de passe ?",
        "Urgent ! Ma carte bancaire a été avalée par le distributeur",
        "Merci pour votre service excellent"
    ]
    
    for text in test_texts:
        print(f"\n📝 Réclamation: \"{text}\"")
        result = model.predict(text)
        print(f"   🏷️ Catégorie: {result['categorie']} (confiance: {result['confiance_categorie']:.0%})")
        print(f"   ⚡ Priorité: {result['priorite']} (confiance: {result['confiance_priorite']:.0%})")
        print(f"   😊 Sentiment: {result['sentiment']} (confiance: {result['confiance_sentiment']:.0%})")
        print(f"   🔍 À réviser: {'Oui' if result['a_reviser'] else 'Non'}")
        print(f"   💬 Réponse: {result['reponse_suggerée'][:80]}...")
    
    print("\n" + "=" * 50)
    print("✅ Modèle prêt à être utilisé par l'API!")
    print("=" * 50)