#!/usr/bin/env python3
"""Generate PDF reports for UniBank+ unit tests - matching the existing PDF format."""

from fpdf import FPDF
import os

BASE_DIR = os.path.dirname(os.path.abspath(__file__))
PROJECT_DIR = os.path.dirname(BASE_DIR)
SCREENSHOTS_DIR = BASE_DIR


class UnibankPDF(FPDF):
    def header(self):
        pass

    def footer(self):
        self.set_y(-15)
        self.set_font('Helvetica', 'I', 8)
        self.set_text_color(128, 128, 128)
        self.cell(0, 10, f'Page {self.page_no()}/{{nb}}', align='C')

    def section_title(self, title, color=(231, 76, 60)):
        self.set_font('Helvetica', 'B', 18)
        self.set_text_color(*color)
        self.cell(0, 12, title, new_x="LMARGIN", new_y="NEXT")
        self.ln(4)

    def sub_title(self, title, color=(231, 76, 60)):
        self.set_font('Helvetica', 'B', 14)
        self.set_text_color(*color)
        self.cell(0, 10, title, new_x="LMARGIN", new_y="NEXT")
        self.ln(2)

    def body_text(self, text):
        self.set_font('Helvetica', '', 11)
        self.set_text_color(51, 51, 51)
        self.multi_cell(0, 7, text)
        self.ln(2)

    def bullet_point(self, label, text):
        self.set_font('Helvetica', 'B', 11)
        self.set_text_color(51, 51, 51)
        x = self.get_x()
        self.cell(5, 7, '-')
        self.cell(50, 7, f' {label} :')
        self.set_font('Helvetica', '', 11)
        self.cell(0, 7, text, new_x="LMARGIN", new_y="NEXT")

    def add_screenshot(self, img_path, w=170):
        if os.path.exists(img_path):
            # Check if we need a new page
            if self.get_y() + 80 > self.h - 30:
                self.add_page()
            self.image(img_path, x=20, w=w)
            self.ln(8)
        else:
            self.body_text(f"[Screenshot: {os.path.basename(img_path)}]")

    def code_block(self, code):
        self.set_font('Courier', '', 9)
        self.set_fill_color(40, 42, 54)
        self.set_text_color(248, 248, 242)
        # Sanitize text for latin-1 encoding
        safe_code = code.encode('latin-1', errors='replace').decode('latin-1')
        lines = safe_code.split('\n')
        # Process in page-sized chunks
        max_lines_per_block = 40
        i = 0
        while i < len(lines):
            chunk = lines[i:i+max_lines_per_block]
            block_height = len(chunk) * 5 + 8
            if self.get_y() + block_height > self.h - 30:
                self.add_page()
            y_start = self.get_y()
            self.rect(15, y_start, 180, block_height, 'F')
            self.set_xy(18, y_start + 4)
            for line in chunk:
                # Truncate long lines
                if len(line) > 90:
                    line = line[:90] + '...'
                self.cell(0, 5, line, new_x="LMARGIN", new_y="NEXT")
                self.set_x(18)
            self.ln(6)
            i += max_lines_per_block
        self.set_text_color(51, 51, 51)


def read_test_file(filename):
    filepath = os.path.join(PROJECT_DIR, filename)
    with open(filepath, 'r') as f:
        return f.read()


# ============================================================
# PDF 1: GESTION DES UTILISATEURS
# ============================================================
def generate_pdf_user_management():
    pdf = UnibankPDF()
    pdf.alias_nb_pages()
    pdf.set_auto_page_break(auto=True, margin=25)

    # Page 1 - Title
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 24)
    pdf.set_text_color(44, 62, 80)
    pdf.ln(20)
    pdf.cell(0, 15, 'RAPPORT DE PERFORMANCE & OPTIMISATION', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)
    pdf.set_font('Helvetica', 'B', 18)
    pdf.set_text_color(231, 76, 60)
    pdf.cell(0, 12, 'Gestion des Utilisateurs', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(10)
    pdf.set_font('Helvetica', '', 12)
    pdf.set_text_color(100, 100, 100)
    pdf.cell(0, 8, 'UniBank+ - Symfony 7 / PHP 8.2 / PHPUnit 11.5', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.cell(0, 8, 'Entites: Utilisateur, Session, HistoriqueConnexion', align='C', new_x="LMARGIN", new_y="NEXT")

    # ---- Section 1: PHPStan ----
    pdf.ln(15)
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '1 - PHPStan', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    # PHPStan config
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '09_phpstan_config.png'), w=120)

    pdf.sub_title('Utilisateur Avant et apres Optimisation :')
    pdf.body_text(
        "PHPStan a signale une erreur dans le fichier UtilisateurTest.php : "
        "l'appel a assertTrue() avec la valeur true est redondant (method.alreadyNarrowedType). "
        "Cette erreur a ete corrigee en remplacant le test par une assertion plus significative."
    )

    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '01_phpstan_user_before.png'))
    pdf.body_text("Apres correction :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '02_phpstan_user_after.png'))

    # ---- Section 2: Tests Unitaires ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '2 - Tests Unitaires', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    # --- Utilisateur ---
    pdf.sub_title('1/ Gestion Utilisateur :')
    pdf.bullet_point('Regle metier 1', 'Le role par defaut est CLIENT')
    pdf.bullet_point('Regle metier 2', 'Utilisateur inactif et non verifie a la creation')
    pdf.bullet_point('Regle metier 3', 'Le role determine les permissions (ROLE_CLIENT ou ROLE_AGENT)')
    pdf.bullet_point('Regle metier 4', 'Systeme de ban permanent et temporaire')
    pdf.bullet_point('Regle metier 5', "L'identifiant est l'email")
    pdf.bullet_point('Regle metier 6', 'Le nom complet = prenom + nom')
    pdf.bullet_point('Regle metier 7', 'Token de verification avec expiration')
    pdf.bullet_point('Regle metier 8', 'Statut client (PENDING, APPROVED, REJECTED, SUSPENDED)')
    pdf.bullet_point('Regle metier 9', 'Champs agent : matricule et departement')

    pdf.ln(5)
    pdf.body_text("Execution des tests unitaires UtilisateurTest.php (16 tests, 49 assertions) :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '03_phpunit_utilisateur.png'))

    # --- Session ---
    pdf.add_page()
    pdf.sub_title('2/ Gestion Session :')
    pdf.bullet_point('Regle metier 1', 'Session expire apres 24 heures par defaut')
    pdf.bullet_point('Regle metier 2', 'Session active par defaut a la creation')
    pdf.bullet_point('Regle metier 3', 'Detection de session expiree')
    pdf.bullet_point('Regle metier 4', 'Session valide = active ET non expiree')

    pdf.ln(5)
    pdf.body_text("Execution des tests unitaires SessionTest.php (8 tests, 11 assertions) :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '04_phpunit_session.png'))

    # --- HistoriqueConnexion ---
    pdf.sub_title('3/ Historique de Connexion :')
    pdf.bullet_point('Regle metier 1', 'Statut par defaut = SUCCESS')
    pdf.bullet_point('Regle metier 2', 'Date de connexion generee automatiquement')
    pdf.bullet_point('Regle metier 3', "Connexion echouee avec raison d'echec")
    pdf.bullet_point('Regle metier 4', 'Informations device/browser optionnelles')

    pdf.ln(5)
    pdf.body_text("Execution des tests unitaires HistoriqueConnexionTest.php (6 tests, 13 assertions) :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '05_phpunit_historique.png'))

    # ---- Section 3: Code Source des Tests ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '3 - Code Source des Tests', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    pdf.sub_title('UtilisateurTest.php')
    code = read_test_file('tests/Unit/Entity/UtilisateurTest.php')
    pdf.code_block(code)

    pdf.add_page()
    pdf.sub_title('SessionTest.php')
    code = read_test_file('tests/Unit/Entity/SessionTest.php')
    pdf.code_block(code)

    pdf.add_page()
    pdf.sub_title('HistoriqueConnexionTest.php')
    code = read_test_file('tests/Unit/Entity/HistoriqueConnexionTest.php')
    pdf.code_block(code)

    # ---- Summary ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '4 - Resume', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    pdf.set_font('Helvetica', '', 12)
    pdf.set_text_color(51, 51, 51)

    # Summary table
    pdf.set_fill_color(52, 73, 94)
    pdf.set_text_color(255, 255, 255)
    pdf.set_font('Helvetica', 'B', 11)
    pdf.cell(60, 10, 'Fichier de Test', border=1, fill=True, align='C')
    pdf.cell(40, 10, 'Tests', border=1, fill=True, align='C')
    pdf.cell(40, 10, 'Assertions', border=1, fill=True, align='C')
    pdf.cell(40, 10, 'Resultat', border=1, fill=True, align='C', new_x="LMARGIN", new_y="NEXT")

    pdf.set_text_color(51, 51, 51)
    pdf.set_font('Helvetica', '', 10)

    rows = [
        ('UtilisateurTest.php', '16', '49', 'OK'),
        ('SessionTest.php', '8', '11', 'OK'),
        ('HistoriqueConnexionTest.php', '6', '13', 'OK'),
    ]
    for row in rows:
        pdf.cell(60, 8, row[0], border=1, align='C')
        pdf.cell(40, 8, row[1], border=1, align='C')
        pdf.cell(40, 8, row[2], border=1, align='C')
        pdf.set_text_color(39, 174, 96)
        pdf.set_font('Helvetica', 'B', 10)
        pdf.cell(40, 8, row[3], border=1, align='C', new_x="LMARGIN", new_y="NEXT")
        pdf.set_text_color(51, 51, 51)
        pdf.set_font('Helvetica', '', 10)

    # Total row
    pdf.set_fill_color(39, 174, 96)
    pdf.set_text_color(255, 255, 255)
    pdf.set_font('Helvetica', 'B', 11)
    pdf.cell(60, 10, 'TOTAL', border=1, fill=True, align='C')
    pdf.cell(40, 10, '30', border=1, fill=True, align='C')
    pdf.cell(40, 10, '73', border=1, fill=True, align='C')
    pdf.cell(40, 10, '100% PASS', border=1, fill=True, align='C', new_x="LMARGIN", new_y="NEXT")

    pdf.ln(10)
    pdf.set_text_color(51, 51, 51)
    pdf.set_font('Helvetica', '', 11)
    pdf.body_text("PHPStan : 0 erreurs (niveau 5) sur 10 fichiers analyses")
    pdf.body_text("PHPUnit : 30 tests, 73 assertions - 100% de reussite")

    output_path = os.path.join(PROJECT_DIR, 'Test-Unitaire-Gestion-Utilisateurs.pdf')
    pdf.output(output_path)
    print(f"PDF 1 generated: {output_path}")


# ============================================================
# PDF 2: TRANSACTIONS & COMPTE BANCAIRE
# ============================================================
def generate_pdf_transactions_compte():
    pdf = UnibankPDF()
    pdf.alias_nb_pages()
    pdf.set_auto_page_break(auto=True, margin=25)

    # Page 1 - Title
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 24)
    pdf.set_text_color(44, 62, 80)
    pdf.ln(20)
    pdf.cell(0, 15, 'RAPPORT DE PERFORMANCE & OPTIMISATION', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)
    pdf.set_font('Helvetica', 'B', 18)
    pdf.set_text_color(231, 76, 60)
    pdf.cell(0, 12, 'Transactions & Compte Bancaire', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(10)
    pdf.set_font('Helvetica', '', 12)
    pdf.set_text_color(100, 100, 100)
    pdf.cell(0, 8, 'UniBank+ - Symfony 7 / PHP 8.2 / PHPUnit 11.5', align='C', new_x="LMARGIN", new_y="NEXT")
    pdf.cell(0, 8, 'Entites: Compte, TransactionBancaire', align='C', new_x="LMARGIN", new_y="NEXT")

    # ---- Section 1: PHPStan ----
    pdf.ln(15)
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '1 - PHPStan', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '09_phpstan_config.png'), w=120)

    pdf.sub_title('Compte & Transaction Avant et apres Optimisation :')
    pdf.body_text(
        "L'analyse PHPStan au niveau 5 a ete executee sur les entites Compte.php, "
        "TransactionBancaire.php, les controleurs CompteController.php, TransactionController.php, "
        "ainsi que les fichiers de test CompteTest.php et TransactionBancaireTest.php. "
        "Le resultat affiche 100% sans erreurs sur les 6 fichiers cibles."
    )

    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '06_phpstan_transaction_compte.png'))

    # ---- Section 2: Tests Unitaires ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '2 - Tests Unitaires', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    # --- Compte ---
    pdf.sub_title('1/ Gestion Compte Bancaire :')
    pdf.bullet_point('Regle metier 1', 'Le solde initial est 0.00')
    pdf.bullet_point('Regle metier 2', 'Le type de compte par defaut est COURANT')
    pdf.bullet_point('Regle metier 3', 'Le compte est actif par defaut')
    pdf.bullet_point('Regle metier 4', 'La date de creation est generee automatiquement')
    pdf.bullet_point('Regle metier 5', 'Changement de type (COURANT <-> EPARGNE)')
    pdf.bullet_point('Regle metier 6', 'Desactivation/reactivation de compte')
    pdf.bullet_point('Regle metier 7', 'Mise a jour du solde apres depot')
    pdf.bullet_point('Regle metier 8', 'Mise a jour du solde apres retrait')

    pdf.ln(5)
    pdf.body_text("Execution des tests unitaires CompteTest.php (10 tests, 16 assertions) :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '07_phpunit_compte.png'))

    # --- TransactionBancaire ---
    pdf.add_page()
    pdf.sub_title('2/ Gestion Transaction Bancaire :')
    pdf.bullet_point('Regle metier 1', 'Virement necessite un compte source ET destination')
    pdf.bullet_point('Regle metier 2', 'La date de creation est generee automatiquement')
    pdf.bullet_point('Regle metier 3', 'Retrait sans compte destination (nullable)')
    pdf.bullet_point('Regle metier 4', 'Depot sur un compte source')
    pdf.bullet_point('Regle metier 5', 'Trois types: VIREMENT, RETRAIT, DEPOT')
    pdf.bullet_point('Regle metier 6', 'Description optionnelle')
    pdf.bullet_point('Regle metier 7', 'Virement met a jour les soldes source et destination')

    pdf.ln(5)
    pdf.body_text("Execution des tests unitaires TransactionBancaireTest.php (8 tests, 19 assertions) :")
    pdf.add_screenshot(os.path.join(SCREENSHOTS_DIR, '08_phpunit_transaction.png'))

    # ---- Section 3: Code Source des Tests ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '3 - Code Source des Tests', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    pdf.sub_title('CompteTest.php')
    code = read_test_file('tests/Unit/Entity/CompteTest.php')
    pdf.code_block(code)

    pdf.add_page()
    pdf.sub_title('TransactionBancaireTest.php')
    code = read_test_file('tests/Unit/Entity/TransactionBancaireTest.php')
    pdf.code_block(code)

    # ---- Summary ----
    pdf.add_page()
    pdf.set_font('Helvetica', 'B', 22)
    pdf.set_text_color(44, 62, 80)
    pdf.cell(0, 12, '4 - Resume', new_x="LMARGIN", new_y="NEXT")
    pdf.ln(5)

    # Summary table
    pdf.set_fill_color(52, 73, 94)
    pdf.set_text_color(255, 255, 255)
    pdf.set_font('Helvetica', 'B', 11)
    pdf.cell(70, 10, 'Fichier de Test', border=1, fill=True, align='C')
    pdf.cell(35, 10, 'Tests', border=1, fill=True, align='C')
    pdf.cell(35, 10, 'Assertions', border=1, fill=True, align='C')
    pdf.cell(40, 10, 'Resultat', border=1, fill=True, align='C', new_x="LMARGIN", new_y="NEXT")

    pdf.set_text_color(51, 51, 51)
    pdf.set_font('Helvetica', '', 10)

    rows = [
        ('CompteTest.php', '10', '16', 'OK'),
        ('TransactionBancaireTest.php', '8', '19', 'OK'),
    ]
    for row in rows:
        pdf.cell(70, 8, row[0], border=1, align='C')
        pdf.cell(35, 8, row[1], border=1, align='C')
        pdf.cell(35, 8, row[2], border=1, align='C')
        pdf.set_text_color(39, 174, 96)
        pdf.set_font('Helvetica', 'B', 10)
        pdf.cell(40, 8, row[3], border=1, align='C', new_x="LMARGIN", new_y="NEXT")
        pdf.set_text_color(51, 51, 51)
        pdf.set_font('Helvetica', '', 10)

    # Total row
    pdf.set_fill_color(39, 174, 96)
    pdf.set_text_color(255, 255, 255)
    pdf.set_font('Helvetica', 'B', 11)
    pdf.cell(70, 10, 'TOTAL', border=1, fill=True, align='C')
    pdf.cell(35, 10, '18', border=1, fill=True, align='C')
    pdf.cell(35, 10, '35', border=1, fill=True, align='C')
    pdf.cell(40, 10, '100% PASS', border=1, fill=True, align='C', new_x="LMARGIN", new_y="NEXT")

    pdf.ln(10)
    pdf.set_text_color(51, 51, 51)
    pdf.set_font('Helvetica', '', 11)
    pdf.body_text("PHPStan : 0 erreurs (niveau 5) sur 6 fichiers analyses")
    pdf.body_text("PHPUnit : 18 tests, 35 assertions - 100% de reussite")

    output_path = os.path.join(PROJECT_DIR, 'Test-Unitaire-Transactions-Compte.pdf')
    pdf.output(output_path)
    print(f"PDF 2 generated: {output_path}")


if __name__ == '__main__':
    generate_pdf_user_management()
    generate_pdf_transactions_compte()
    print("\nBoth PDFs generated successfully!")
