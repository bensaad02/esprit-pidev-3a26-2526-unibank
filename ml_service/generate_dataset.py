import csv
import random
from datetime import datetime

# ============================================
# TEMPLATES PAR CATÉGORIE
# ============================================

TEMPLATES = {
    'livraison': {
        'templates': [
            "Mon colis {ref} n'est jamais arrivé après {delay} jours",
            "Commande {ref} livrée au mauvais endroit",
            "Le transporteur a perdu mon colis {ref}",
            "Je n'ai pas reçu ma commande {ref} passée le {date}",
            "Colis {ref} endommagé à la réception",
            "Livraison en retard de {delay} jours pour la commande {ref}",
            "Mon colis {ref} est bloqué en douane",
            "Le livreur n'a pas respecté le créneau horaire",
            "Je n'ai jamais reçu mon remboursement après retour",
            "Colis {ref} marqué livré mais jamais reçu",
            "Problème de suivi pour la commande {ref}",
            "Le point relais a renvoyé mon colis {ref}",
            "Frais de livraison facturés mais service non rendu",
            "Commande {ref} livrée chez le mauvais voisin",
            "Absence de signature à la livraison pour {ref}",
            "Le colis {ref} contient des articles manquants",
            "Retard de livraison non justifié pour {ref}",
            "Impossible de reprogrammer la livraison de {ref}",
            "Le transporteur n'a pas laissé d'avis de passage",
            "Commande {ref} retournée à l'expéditeur sans raison"
        ],
        'priorites': ['haute'] * 15 + ['moyenne'] * 5,
        'sentiments': ['negatif'] * 18 + ['neutre'] * 2
    },
    
    'facturation': {
        'templates': [
            "Erreur de {amount}€ sur ma facture du {date}",
            "Double prélèvement de {amount}€ sur mon compte",
            "Frais bancaires injustifiés de {amount}€",
            "Facture {ref} non conforme à ma commande",
            "Prélèvement SEPA non autorisé de {amount}€",
            "Augmentation des frais de tenue de compte",
            "Commission prélevée sans mon accord",
            "Erreur dans le calcul des intérêts",
            "Facture {ref} reçue alors que j'ai déjà payé",
            "Remboursement {ref} non crédité après {delay} jours",
            "Frais d'incident excessifs de {amount}€",
            "Prélèvement {ref} effectué deux fois",
            "Facture {ref} non conforme au devis",
            "Débit {ref} non reconnu sur mon compte",
            "Abonnement {ref} toujours prélevé après résiliation",
            "Frais de carte trop élevés ce mois-ci",
            "Commission sur virement international excessive",
            "Erreur dans mon relevé du {date}",
            "Taxe prélevée sans justification",
            "Facture {ref} en double exemplaire"
        ],
        'priorites': ['haute'] * 12 + ['moyenne'] * 8,
        'sentiments': ['negatif'] * 18 + ['neutre'] * 2
    },
    
    'technique': {
        'templates': [
            "Je n'arrive plus à me connecter à l'application",
            "L'application mobile plante au démarrage",
            "Erreur {code} lors de la validation d'un virement",
            "Problème de synchronisation avec le site web",
            "L'application ne reconnaît plus mon empreinte digitale",
            "Mise à jour {version} bloque l'application",
            "Notifications push non reçues",
            "Site internet inaccessible depuis ce matin",
            "Problème d'affichage des soldes",
            "L'application demande une activation en boucle",
            "Code de validation {code} non reçu par SMS",
            "Lenteur excessive de l'application mobile",
            "Erreur {code} lors du changement de mot de passe",
            "L'application ne charge plus mes comptes",
            "Problème de double authentification",
            "Push notification frauduleuse reçue",
            "Session expirée en permanence",
            "Impossible de télécharger mon relevé PDF",
            "L'application {app} n'est plus compatible",
            "Erreur {code}: service temporairement indisponible"
        ],
        'priorites': ['haute'] * 10 + ['moyenne'] * 8 + ['basse'] * 2,
        'sentiments': ['negatif'] * 15 + ['neutre'] * 5
    },
    
    'compte': {
        'templates': [
            "Je souhaite clôturer mon compte {ref}",
            "Comment changer mon adresse postale ?",
            "Demande de changement de conseiller",
            "Plainte concernant mon conseiller {nom}",
            "Je n'arrive pas à accéder à mon compte",
            "Problème de vérification d'identité",
            "Demande de modification de mon IBAN",
            "Comment obtenir un chéquier ?",
            "Réclamation sur mon dossier client",
            "Demande de relevé fiscal {year}",
            "Mise à jour de mes informations personnelles",
            "Problème avec ma signature électronique",
            "Demande de portabilité de compte",
            "Fermeture de compte suite à décès",
            "Comment contacter mon conseiller ?",
            "Demande de changement de formule bancaire",
            "Problème lors de l'ouverture du compte",
            "Documents demandés déjà envoyés",
            "Délai d'activation du compte trop long",
            "Mon numéro client n'est plus reconnu"
        ],
        'priorites': ['haute'] * 5 + ['moyenne'] * 10 + ['basse'] * 5,
        'sentiments': ['negatif'] * 8 + ['neutre'] * 10 + ['positif'] * 2
    },
    
    'carte': {
        'templates': [
            "Ma carte {type} a été avalée par le distributeur",
            "Carte {type} perdue, comment faire opposition ?",
            "Paiement refusé alors que j'ai assez d'argent",
            "Carte {type} volée, appel urgent",
            "Plafond de paiement trop bas pour mon achat",
            "Code PIN {code} bloqué après 3 erreurs",
            "Carte {type} non reçue après {delay} jours",
            "Problème de paiement sans contact",
            "Carte {type} expirée, renouvellement ?",
            "Transaction suspecte sur ma carte",
            "Retrait impossible à l'étranger",
            "Paiement refusé sur site internet",
            "Carte {type} débitée sans mon autorisation",
            "Impossible d'activer ma nouvelle carte",
            "Plafond de retrait journalier trop bas",
            "Carte {type} non reconnue au distributeur",
            "Paiement {amount}€ refusé par carte",
            "Carte {type} à remplacer d'urgence",
            "Frais de change trop élevés sur ma carte",
            "Carte {type} expirée, en attente de renouvellement"
        ],
        'priorites': ['haute'] * 15 + ['moyenne'] * 5,
        'sentiments': ['negatif'] * 18 + ['neutre'] * 2
    },
    
    'transaction': {
        'templates': [
            "Virement de {amount}€ non reçu après {delay} jours",
            "Transaction {ref} débitée deux fois",
            "Virement effectué vers le mauvais bénéficiaire",
            "Prélèvement {ref} non autorisé de {amount}€",
            "Remboursement {ref} non crédité",
            "Virement international {ref} bloqué",
            "Délai de virement SEPA trop long",
            "Transaction {ref} annulée sans explication",
            "Virement programmé {ref} non exécuté",
            "Opération {ref} non reconnue sur mon compte",
            "Virement instantané {ref} non reçu",
            "Transaction {ref} bloquée par sécurité",
            "Virement refusé pour plafond dépassé",
            "Ordre de virement {ref} non pris en compte",
            "Virement {ref} en attente depuis {delay} jours",
            "Prélèvement {ref} non conforme au mandat",
            "Transaction {ref} effectuée à mon insu",
            "Virement {ref} vers compte externe échoué",
            "Remboursement {ref} jamais reçu",
            "Virement {ref} annulé pour erreur de RIB"
        ],
        'priorites': ['haute'] * 15 + ['moyenne'] * 5,
        'sentiments': ['negatif'] * 18 + ['neutre'] * 2
    },
    
    'credit': {
        'templates': [
            "Demande de crédit {type} refusée",
            "Taux d'intérêt trop élevé pour mon prêt",
            "Remboursement anticipé, comment faire ?",
            "Problème avec mon échéancier de crédit",
            "Demande de rachat de crédit",
            "Assurance emprunteur trop chère",
            "Crédit {ref} toujours pas débloqué",
            "Litige sur mon prêt {type}",
            "Modification du taux de mon crédit",
            "Demande de report d'échéance",
            "Crédit {ref} prélevé deux fois",
            "Frais de dossier abusifs",
            "Refinancement de mon prêt impossible",
            "Crédit {ref} non soldé malgré remboursement",
            "Demande de prêt {type} en attente",
            "Taux préférentiel non appliqué",
            "Crédit {ref} toujours pas accordé",
            "Problème de garantie pour mon prêt",
            "Crédit {ref} refusé malgré bon dossier",
            "Remboursement anticipé pénalisé"
        ],
        'priorites': ['haute'] * 10 + ['moyenne'] * 10,
        'sentiments': ['negatif'] * 12 + ['neutre'] * 8
    },
    
    'autre': {
        'templates': [
            "Merci pour votre service excellent !",
            "Félicitations pour votre application mobile",
            "Remerciement pour le conseiller {nom}",
            "Excellent suivi de mon dossier",
            "Service client à l'écoute, bravo !",
            "Merci pour le geste commercial",
            "Très satisfait de votre service",
            "Je recommande UniBank+ autour de moi",
            "Remerciement pour la rapidité de traitement",
            "Service après-vente exceptionnel",
            "Merci pour votre professionnalisme",
            "Un grand merci à toute l'équipe",
            "Satisfait de la résolution de mon litige",
            "Félicitations pour votre approche client",
            "Merci pour votre aide précieuse",
            "Service irréprochable",
            "Très bonne expérience avec votre banque",
            "Merci pour votre écoute et empathie",
            "Bravo pour votre réactivité",
            "Excellente application, continuez !"
        ],
        'priorites': ['basse'] * 20,
        'sentiments': ['positif'] * 20
    }
}

# ============================================
# GÉNÉRATEUR DE DONNÉES
# ============================================

def generate_reference():
    """Génère une référence aléatoire"""
    prefixes = ['CMD', 'FACT', 'VIRE', 'CRED', 'COMP']
    numbers = ''.join([str(random.randint(0, 9)) for _ in range(6)])
    return f"{random.choice(prefixes)}-{numbers}"

def generate_date():
    """Génère une date aléatoire"""
    day = random.randint(1, 28)
    month = random.randint(1, 12)
    return f"{day}/{month}/2026"

def generate_amount():
    """Génère un montant aléatoire"""
    return round(random.uniform(10, 5000), 2)

def generate_delay():
    """Génère un délai aléatoire"""
    return random.randint(2, 30)

def generate_code():
    """Génère un code d'erreur aléatoire"""
    return f"ERR-{random.randint(100, 999)}"

def generate_name():
    """Génère un nom aléatoire"""
    noms = ['Dupont', 'Martin', 'Bernard', 'Petit', 'Durand', 'Leroy', 'Moreau', 'Simon']
    return random.choice(noms)

def generate_app():
    """Génère un nom d'application"""
    apps = ['iOS 17', 'Android 14', 'mobile', 'web']
    return random.choice(apps)

def generate_type_carte():
    """Génère un type de carte"""
    types = ['Gold', 'Platinum', 'Premier', 'Business', 'Classic']
    return random.choice(types)

def generate_type_credit():
    """Génère un type de crédit"""
    types = ['auto', 'immobilier', 'consommation', 'travaux', 'personnel']
    return random.choice(types)

def generate_version():
    """Génère une version"""
    return f"{random.randint(1, 3)}.{random.randint(0, 9)}.{random.randint(0, 9)}"

def generate_year():
    """Génère une année"""
    return random.randint(2020, 2026)

# ============================================
# GÉNÉRATION DES RÉPONSES TEMPLATES
# ============================================

REPONSE_TEMPLATES = {
    'livraison_haute_negatif': "Bonjour, je comprends votre frustration concernant votre livraison. Notre service logistique va immédiatement localiser votre colis. Vous recevrez une mise à jour sous 24h. Cordialement",
    'livraison_moyenne_negatif': "Bonjour, je comprends votre mécontentement. Je vais vérifier l'état de votre livraison et reviens vers vous rapidement. Cordialement",
    'facturation_haute_negatif': "Bonjour, je suis désolé pour cette erreur de facturation. Je vais vérifier votre dossier et corriger le problème immédiatement. Cordialement",
    'facturation_moyenne_negatif': "Bonjour, je comprends votre interrogation. Je vais analyser votre facture et vous expliquer les montants. Cordialement",
    'technique_haute_negatif': "Bonjour, je comprends votre urgence. Notre équipe technique va résoudre ce problème rapidement. Cordialement",
    'technique_moyenne_negatif': "Bonjour, notre équipe technique a été informée. Merci de votre patience. Cordialement",
    'compte_haute_negatif': "Bonjour, je comprends votre mécontentement. Je vais traiter votre demande en priorité. Cordialement",
    'carte_haute_negatif': "Bonjour, je comprends votre inquiétude. Nous allons immédiatement prendre les mesures nécessaires. Cordialement",
    'transaction_haute_negatif': "Bonjour, je comprends votre colère. Je vais immédiatement vérifier cette transaction. Cordialement",
    'credit_haute_negatif': "Bonjour, je comprends votre déception. Un conseiller va étudier votre dossier. Cordialement",
    'autre_basse_positif': "Bonjour, merci beaucoup pour votre retour positif ! Nous sommes ravis d'avoir pu vous aider. Cordialement",
    'default': "Bonjour, merci pour votre message. Notre équipe va étudier votre demande et reviendra vers vous. Cordialement"
}

# ============================================
# FONCTION DE GÉNÉRATION
# ============================================

def generate_reclamation(category, template_data):
    """Génère une réclamation à partir d'un template"""
    template = random.choice(template_data['templates'])
    
    # Remplacer les variables
    template = template.replace('{ref}', generate_reference())
    template = template.replace('{date}', generate_date())
    template = template.replace('{amount}', f"{generate_amount():.2f}")
    template = template.replace('{delay}', str(generate_delay()))
    template = template.replace('{code}', generate_code())
    template = template.replace('{nom}', generate_name())
    template = template.replace('{app}', generate_app())
    template = template.replace('{type}', generate_type_carte())
    template = template.replace('{version}', generate_version())
    template = template.replace('{year}', str(generate_year()))
    
    return template

def main():
    """Génère 5000 réclamations"""
    print("=" * 60)
    print("🚀 GÉNÉRATION DU DATASET DE RÉCLAMATIONS")
    print("=" * 60)
    
    all_claims = []
    target_total = 5000
    
    # Distribuer équitablement les catégories
    categories = ['livraison', 'facturation', 'technique', 'compte', 'carte', 'transaction', 'credit', 'autre']
    per_category = target_total // len(categories)
    
    for category in categories:
        template_data = TEMPLATES[category]
        print(f"📝 Génération pour {category}: {per_category} exemples")
        
        for i in range(per_category):
            description = generate_reclamation(category, template_data)
            
            # Assigner priorité et sentiment selon les probabilités
            priorite = random.choice(template_data['priorites'])
            sentiment = random.choice(template_data['sentiments'])
            
            # Générer une réponse appropriée
            response_key = f"{category}_{priorite}_{sentiment}"
            reponse = REPONSE_TEMPLATES.get(response_key, REPONSE_TEMPLATES['default'])
            
            all_claims.append({
                'description': description,
                'categorie': category,
                'priorite': priorite,
                'sentiment': sentiment,
                'reponse_template': reponse
            })
    
    # Sauvegarder dans CSV
    output_file = 'data/reclamations_complet.csv'
    
    with open(output_file, 'w', newline='', encoding='utf-8') as f:
        writer = csv.DictWriter(f, fieldnames=['description', 'categorie', 'priorite', 'sentiment', 'reponse_template'])
        writer.writeheader()
        writer.writerows(all_claims)
    
    # Statistiques
    print("\n" + "=" * 60)
    print("📊 STATISTIQUES DU DATASET")
    print("=" * 60)
    
    # Compter par catégorie
    from collections import Counter
    cat_count = Counter([c['categorie'] for c in all_claims])
    prio_count = Counter([c['priorite'] for c in all_claims])
    sent_count = Counter([c['sentiment'] for c in all_claims])
    
    print("\n📈 Par catégorie:")
    for cat, count in sorted(cat_count.items()):
        print(f"   - {cat}: {count}")
    
    print("\n⚡ Par priorité:")
    for prio, count in sorted(prio_count.items()):
        print(f"   - {prio}: {count}")
    
    print("\n😊 Par sentiment:")
    for sent, count in sorted(sent_count.items()):
        print(f"   - {sent}: {count}")
    
    print(f"\n✅ Total: {len(all_claims)} réclamations générées")
    print(f"💾 Fichier sauvegardé: {output_file}")
    
    # Aperçu
    print("\n" + "=" * 60)
    print("🔍 APERÇU DES 10 PREMIÈRES RÉCLAMATIONS")
    print("=" * 60)
    for i, claim in enumerate(all_claims[:10], 1):
        print(f"\n{i}. {claim['description']}")
        print(f"   → {claim['categorie']} | {claim['priorite']} | {claim['sentiment']}")

if __name__ == "__main__":
    main()