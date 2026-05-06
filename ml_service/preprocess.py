import re
import pandas as pd
import numpy as np
from unidecode import unidecode
from nltk.corpus import stopwords
import nltk

# Télécharger les stopwords français une fois
try:
    nltk.data.find('tokenizers/punkt')
except LookupError:
    nltk.download('punkt')
    nltk.download('stopwords')

class DataPreprocessor:
    def __init__(self):
        self.stop_words_fr = set(stopwords.words('french'))
        # Ajouter des stopwords personnalisés
        self.stop_words_fr.update(['je', 'tu', 'il', 'elle', 'nous', 'vous', 'ils', 'elles',
                                   'le', 'la', 'les', 'un', 'une', 'des', 'du', 'de', 'et',
                                   'est', 'sont', 'avait', 'aura', 'avoir', 'être', 'faire',
                                   'mon', 'ton', 'son', 'notre', 'votre', 'leur', 'mais',
                                   'ou', 'donc', 'car', 'par', 'pour', 'dans', 'sans',
                                   'sur', 'sous', 'avec', 'entre', 'chez', 'vers'])
    
    def clean_text(self, text):
        """Nettoie le texte français"""
        if pd.isna(text):
            return ""
        
        # Convertir en minuscules
        text = str(text).lower()
        
        # Supprimer les accents (é -> e)
        text = unidecode(text)
        
        # Supprimer les URLs
        text = re.sub(r'https?://\S+|www\.\S+', '', text)
        
        # Supprimer les emails
        text = re.sub(r'\S+@\S+\.\S+', '', text)
        
        # Supprimer les chiffres (sauf si liés à des références)
        text = re.sub(r'\b\d+\b', '', text)
        
        # Supprimer la ponctuation
        text = re.sub(r'[^\w\s]', ' ', text)
        
        # Supprimer les espaces multiples
        text = re.sub(r'\s+', ' ', text)
        
        # Supprimer les stopwords
        words = text.split()
        words = [w for w in words if w not in self.stop_words_fr and len(w) > 2]
        
        return ' '.join(words)
    
    def extract_features(self, df):
        """Extrait des caractéristiques supplémentaires"""
        # Longueur du texte
        df['longueur'] = df['description_clean'].str.len()
        
        # Nombre de mots
        df['nb_mots'] = df['description_clean'].str.split().str.len()
        
        # Score d'urgence (mots clés d'urgence)
        mots_urgence = ['urgent', 'immédiat', 'rapidement', 'bloqué', 'plus', 'jamais',
                        'erreur', 'problème', 'urgence', 'vite', 'dépannage']
        df['score_urgence'] = df['description_clean'].apply(
            lambda x: sum(1 for mot in mots_urgence if mot in str(x))
        )
        
        # Score de frustration (mots clés négatifs)
        mots_frustration = ['déçu', 'fâché', 'colère', 'inacceptable', 'scandale',
                            'honte', 'mécontent', 'insatisfait', 'mauvaise']
        df['score_frustration'] = df['description_clean'].apply(
            lambda x: sum(1 for mot in mots_frustration if mot in str(x))
        )
        
        return df

    def prepare_training_data(self, df):
        """Prépare les données pour l'entraînement"""
        # Nettoyer le texte
        df['description_clean'] = df['description'].apply(self.clean_text)
        
        # Extraire les caractéristiques
        df = self.extract_features(df)
        
        return df