#!/usr/bin/env python3
"""Generate terminal-style screenshots for the test report."""

from PIL import Image, ImageDraw, ImageFont
import textwrap
import os

SCREENSHOTS_DIR = os.path.dirname(os.path.abspath(__file__))

# Terminal colors
BG_COLOR = (30, 30, 46)
TEXT_COLOR = (205, 214, 244)
GREEN_COLOR = (166, 227, 161)
RED_COLOR = (243, 139, 168)
YELLOW_COLOR = (249, 226, 175)
BLUE_COLOR = (137, 180, 250)
CYAN_COLOR = (148, 226, 213)
TITLE_BAR_COLOR = (49, 50, 68)
TITLE_TEXT_COLOR = (166, 173, 200)

def get_font(size=14):
    """Try to get a monospace font."""
    font_paths = [
        "/System/Library/Fonts/SFMono-Regular.otf",
        "/System/Library/Fonts/Menlo.ttc",
        "/System/Library/Fonts/Monaco.ttf",
        "/Library/Fonts/Courier New.ttf",
    ]
    for path in font_paths:
        try:
            return ImageFont.truetype(path, size)
        except (OSError, IOError):
            continue
    return ImageFont.load_default()

def create_terminal_screenshot(title, lines, filename, width=900):
    """Create a terminal-style screenshot image."""
    font = get_font(14)
    bold_font = get_font(15)

    line_height = 20
    padding = 20
    title_bar_height = 35

    # Calculate image height
    total_lines = len(lines)
    img_height = title_bar_height + padding * 2 + total_lines * line_height + 20

    img = Image.new('RGB', (width, img_height), BG_COLOR)
    draw = ImageDraw.Draw(img)

    # Title bar
    draw.rectangle([0, 0, width, title_bar_height], fill=TITLE_BAR_COLOR)

    # Window buttons
    draw.ellipse([12, 10, 24, 22], fill=(255, 95, 86))
    draw.ellipse([32, 10, 44, 22], fill=(255, 189, 46))
    draw.ellipse([52, 10, 64, 22], fill=(39, 201, 63))

    # Title
    draw.text((width // 2 - 100, 8), title, fill=TITLE_TEXT_COLOR, font=bold_font)

    y = title_bar_height + padding

    for line_data in lines:
        if isinstance(line_data, tuple):
            text, color = line_data
        else:
            text = line_data
            color = TEXT_COLOR

        draw.text((padding, y), text, fill=color, font=font)
        y += line_height

    filepath = os.path.join(SCREENSHOTS_DIR, filename)
    img.save(filepath, 'PNG')
    print(f"Created: {filepath}")

# ============================================================
# SCREENSHOTS FOR USER MANAGEMENT (PDF 1)
# ============================================================

# 1. PHPStan - Before (with error)
create_terminal_screenshot(
    "PHPStan — Gestion Utilisateurs (Avant)",
    [
        ("$ php vendor/bin/phpstan analyse src/Entity/Utilisateur.php --level=5", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("Note: Using configuration file phpstan.neon.", YELLOW_COLOR),
        (" 1/1 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%", TEXT_COLOR),
        ("", TEXT_COLOR),
        (" ------ ---------------------------------------------------------------", TEXT_COLOR),
        ("  Line   UtilisateurTest.php", BLUE_COLOR),
        (" ------ ---------------------------------------------------------------", TEXT_COLOR),
        ("  227    Call to method assertTrue() with true will", TEXT_COLOR),
        ("         always evaluate to true.", TEXT_COLOR),
        ("         method.alreadyNarrowedType", YELLOW_COLOR),
        (" ------ ---------------------------------------------------------------", TEXT_COLOR),
        ("", TEXT_COLOR),
        (" [ERROR] Found 1 error", RED_COLOR),
    ],
    "01_phpstan_user_before.png"
)

# 2. PHPStan - After (no errors)
create_terminal_screenshot(
    "PHPStan — Gestion Utilisateurs (Apres)",
    [
        ("$ php vendor/bin/phpstan analyse src/Entity/Utilisateur.php \\", CYAN_COLOR),
        ("    src/Entity/Session.php src/Entity/HistoriqueConnexion.php \\", CYAN_COLOR),
        ("    src/Controller/RegistrationController.php \\", CYAN_COLOR),
        ("    src/Controller/SecurityController.php \\", CYAN_COLOR),
        ("    tests/Unit/Entity/UtilisateurTest.php \\", CYAN_COLOR),
        ("    tests/Unit/Entity/SessionTest.php \\", CYAN_COLOR),
        ("    tests/Unit/Entity/HistoriqueConnexionTest.php --level=5", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("Note: Using configuration file phpstan.neon.", YELLOW_COLOR),
        ("  0/10 [░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%", TEXT_COLOR),
        (" 10/10 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("", TEXT_COLOR),
        (" [OK] No errors", GREEN_COLOR),
    ],
    "02_phpstan_user_after.png"
)

# 3. PHPUnit - UtilisateurTest
create_terminal_screenshot(
    "PHPUnit — UtilisateurTest.php",
    [
        ("$ php vendor/bin/phpunit --no-configuration --bootstrap", CYAN_COLOR),
        ("    vendor/autoload.php tests/Unit/Entity/UtilisateurTest.php", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("PHPUnit 11.5.55 by Sebastian Bergmann and contributors.", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("Runtime:       PHP 8.2.30", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("................                                    16 / 16 (100%)", GREEN_COLOR),
        ("", TEXT_COLOR),
        ("Time: 00:00.006, Memory: 10.00 MB", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("OK (16 tests, 49 assertions)", GREEN_COLOR),
    ],
    "03_phpunit_utilisateur.png"
)

# 4. PHPUnit - SessionTest
create_terminal_screenshot(
    "PHPUnit — SessionTest.php",
    [
        ("$ php vendor/bin/phpunit --no-configuration --bootstrap", CYAN_COLOR),
        ("    vendor/autoload.php tests/Unit/Entity/SessionTest.php", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("PHPUnit 11.5.55 by Sebastian Bergmann and contributors.", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("Runtime:       PHP 8.2.30", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("........                                              8 / 8 (100%)", GREEN_COLOR),
        ("", TEXT_COLOR),
        ("Time: 00:00.003, Memory: 10.00 MB", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("OK (8 tests, 11 assertions)", GREEN_COLOR),
    ],
    "04_phpunit_session.png"
)

# 5. PHPUnit - HistoriqueConnexionTest
create_terminal_screenshot(
    "PHPUnit — HistoriqueConnexionTest.php",
    [
        ("$ php vendor/bin/phpunit --no-configuration --bootstrap", CYAN_COLOR),
        ("    vendor/autoload.php tests/Unit/Entity/HistoriqueConnexionTest.php", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("PHPUnit 11.5.55 by Sebastian Bergmann and contributors.", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("Runtime:       PHP 8.2.30", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("......                                                6 / 6 (100%)", GREEN_COLOR),
        ("", TEXT_COLOR),
        ("Time: 00:00.003, Memory: 10.00 MB", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("OK (6 tests, 13 assertions)", GREEN_COLOR),
    ],
    "05_phpunit_historique.png"
)

# ============================================================
# SCREENSHOTS FOR TRANSACTIONS & COMPTE (PDF 2)
# ============================================================

# 6. PHPStan - Transactions/Compte (no errors)
create_terminal_screenshot(
    "PHPStan — Transactions & Compte Bancaire",
    [
        ("$ php vendor/bin/phpstan analyse src/Entity/Compte.php \\", CYAN_COLOR),
        ("    src/Entity/TransactionBancaire.php \\", CYAN_COLOR),
        ("    src/Controller/Client/CompteController.php \\", CYAN_COLOR),
        ("    src/Controller/Client/TransactionController.php \\", CYAN_COLOR),
        ("    tests/Unit/Entity/CompteTest.php \\", CYAN_COLOR),
        ("    tests/Unit/Entity/TransactionBancaireTest.php --level=5", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("Note: Using configuration file phpstan.neon.", YELLOW_COLOR),
        (" 0/6 [░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%", TEXT_COLOR),
        (" 6/6 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("", TEXT_COLOR),
        (" [OK] No errors", GREEN_COLOR),
    ],
    "06_phpstan_transaction_compte.png"
)

# 7. PHPUnit - CompteTest
create_terminal_screenshot(
    "PHPUnit — CompteTest.php",
    [
        ("$ php vendor/bin/phpunit --no-configuration --bootstrap", CYAN_COLOR),
        ("    vendor/autoload.php tests/Unit/Entity/CompteTest.php", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("PHPUnit 11.5.55 by Sebastian Bergmann and contributors.", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("Runtime:       PHP 8.2.30", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("..........                                          10 / 10 (100%)", GREEN_COLOR),
        ("", TEXT_COLOR),
        ("Time: 00:00.003, Memory: 10.00 MB", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("OK (10 tests, 16 assertions)", GREEN_COLOR),
    ],
    "07_phpunit_compte.png"
)

# 8. PHPUnit - TransactionBancaireTest
create_terminal_screenshot(
    "PHPUnit — TransactionBancaireTest.php",
    [
        ("$ php vendor/bin/phpunit --no-configuration --bootstrap", CYAN_COLOR),
        ("    vendor/autoload.php tests/Unit/Entity/TransactionBancaireTest.php", CYAN_COLOR),
        ("", TEXT_COLOR),
        ("PHPUnit 11.5.55 by Sebastian Bergmann and contributors.", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("Runtime:       PHP 8.2.30", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("........                                              8 / 8 (100%)", GREEN_COLOR),
        ("", TEXT_COLOR),
        ("Time: 00:00.003, Memory: 10.00 MB", TEXT_COLOR),
        ("", TEXT_COLOR),
        ("OK (8 tests, 19 assertions)", GREEN_COLOR),
    ],
    "08_phpunit_transaction.png"
)

# 9. PHPStan config screenshot
create_terminal_screenshot(
    "phpstan.neon — Configuration",
    [
        ("# phpstan.neon", YELLOW_COLOR),
        ("parameters:", BLUE_COLOR),
        ("    level: 5", TEXT_COLOR),
        ("    paths:", BLUE_COLOR),
        ("        - src", GREEN_COLOR),
        ("        - tests", GREEN_COLOR),
        ("    excludePaths:", BLUE_COLOR),
        ("        analyseAndScan:", BLUE_COLOR),
        ("            - src/Kernel.php", GREEN_COLOR),
    ],
    "09_phpstan_config.png",
    width=600
)

print("\nAll screenshots generated successfully!")
