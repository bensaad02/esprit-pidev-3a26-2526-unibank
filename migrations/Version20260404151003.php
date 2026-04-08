<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260404151003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_session (id_session INT AUTO_INCREMENT NOT NULL, token VARCHAR(500) NOT NULL, date_creation DATETIME NOT NULL, date_expiration DATETIME NOT NULL, est_active TINYINT NOT NULL, id_utilisateur INT NOT NULL, INDEX IDX_3D19559950EAE44 (id_utilisateur), PRIMARY KEY (id_session)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, bank VARCHAR(100) DEFAULT NULL, status VARCHAR(30) NOT NULL, type_carte VARCHAR(30) NOT NULL, card_number VARCHAR(20) NOT NULL, expiration_date VARCHAR(10) DEFAULT NULL, solde NUMERIC(15, 2) NOT NULL, id_utilisateur INT NOT NULL, INDEX IDX_BAD4FFFD50EAE44 (id_utilisateur), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE compte (id_compte INT AUTO_INCREMENT NOT NULL, numero_compte VARCHAR(30) NOT NULL, solde NUMERIC(15, 2) NOT NULL, type_compte VARCHAR(20) NOT NULL, est_actif TINYINT NOT NULL, date_creation DATETIME NOT NULL, id_utilisateur INT NOT NULL, UNIQUE INDEX UNIQ_CFF652609731415A (numero_compte), INDEX IDX_CFF6526050EAE44 (id_utilisateur), PRIMARY KEY (id_compte)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE contrat (id_contrat INT AUTO_INCREMENT NOT NULL, numero_contrat VARCHAR(50) NOT NULL, montant_credit NUMERIC(15, 2) NOT NULL, taux_interet NUMERIC(5, 2) NOT NULL, duree_en_mois INT NOT NULL, mensualite NUMERIC(15, 2) NOT NULL, montant_total NUMERIC(15, 2) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, date_generation DATETIME NOT NULL, date_signature DATETIME DEFAULT NULL, statut VARCHAR(30) NOT NULL, date_creation DATETIME NOT NULL, date_maj DATETIME NOT NULL, id_credit INT NOT NULL, id_client INT NOT NULL, id_agent INT NOT NULL, INDEX IDX_603499933AF6DB13 (id_credit), INDEX IDX_60349993E173B1B8 (id_client), INDEX IDX_60349993C80EDDAD (id_agent), PRIMARY KEY (id_contrat)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE credit (id_credit INT AUTO_INCREMENT NOT NULL, montant NUMERIC(15, 2) NOT NULL, taux_interet NUMERIC(5, 2) NOT NULL, duree_en_mois INT NOT NULL, mensualite NUMERIC(15, 2) NOT NULL, montant_total NUMERIC(15, 2) NOT NULL, statut VARCHAR(30) NOT NULL, motif_demande LONGTEXT DEFAULT NULL, motif_rejet LONGTEXT DEFAULT NULL, salaire_mensuel NUMERIC(15, 2) DEFAULT NULL, type_contrat VARCHAR(40) DEFAULT NULL, date_prise DATE DEFAULT NULL, date_debut_paiement DATE DEFAULT NULL, date_creation DATETIME NOT NULL, date_traitement DATETIME DEFAULT NULL, date_maj DATETIME NOT NULL, id_client INT NOT NULL, id_agent INT DEFAULT NULL, INDEX IDX_1CC16EFEE173B1B8 (id_client), INDEX IDX_1CC16EFEC80EDDAD (id_agent), PRIMARY KEY (id_credit)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE historique_connexion (id_historique INT AUTO_INCREMENT NOT NULL, ip_address VARCHAR(45) DEFAULT NULL, device_info VARCHAR(255) DEFAULT NULL, browser_info VARCHAR(255) DEFAULT NULL, date_connexion DATETIME NOT NULL, statut VARCHAR(30) NOT NULL, raison_echec LONGTEXT DEFAULT NULL, id_utilisateur INT NOT NULL, INDEX IDX_C018B2D450EAE44 (id_utilisateur), PRIMARY KEY (id_historique)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(30) NOT NULL, date_reclamation DATETIME NOT NULL, sentiment VARCHAR(50) DEFAULT NULL, image_path VARCHAR(255) DEFAULT NULL, id_utilisateur INT NOT NULL, INDEX IDX_CE60640450EAE44 (id_utilisateur), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, date_reponse DATETIME NOT NULL, auteur VARCHAR(100) NOT NULL, reclamation_id INT NOT NULL, INDEX IDX_5FB6DEC72D6BA2D9 (reclamation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE transaction_bancaire (id_transaction INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, montant NUMERIC(15, 2) NOT NULL, description LONGTEXT DEFAULT NULL, date_creation DATETIME NOT NULL, id_compte_source INT NOT NULL, id_compte_destination INT DEFAULT NULL, INDEX IDX_9C7E9B4B3B3BF721 (id_compte_source), INDEX IDX_9C7E9B4B91F50651 (id_compte_destination), PRIMARY KEY (id_transaction)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE transaction_carte (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, description LONGTEXT DEFAULT NULL, montant NUMERIC(15, 2) NOT NULL, statut VARCHAR(30) NOT NULL, date_transaction DATETIME NOT NULL, carte_id INT NOT NULL, INDEX IDX_1BE72FBDC9C7CEB6 (carte_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, telephone VARCHAR(15) NOT NULL, role VARCHAR(20) NOT NULL, is_verified TINYINT NOT NULL, est_actif TINYINT NOT NULL, verification_token VARCHAR(255) DEFAULT NULL, token_expiry DATETIME DEFAULT NULL, cin VARCHAR(8) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, selected_offer VARCHAR(100) DEFAULT NULL, client_status VARCHAR(20) DEFAULT NULL, matricule VARCHAR(50) DEFAULT NULL, departement VARCHAR(100) DEFAULT NULL, date_creation DATETIME NOT NULL, date_maj DATETIME NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), UNIQUE INDEX UNIQ_1D1C63B3ABE530DA (cin), PRIMARY KEY (id_utilisateur)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE app_session ADD CONSTRAINT FK_3D19559950EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFD50EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526050EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499933AF6DB13 FOREIGN KEY (id_credit) REFERENCES credit (id_credit)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993E173B1B8 FOREIGN KEY (id_client) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993C80EDDAD FOREIGN KEY (id_agent) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFEE173B1B8 FOREIGN KEY (id_client) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFEC80EDDAD FOREIGN KEY (id_agent) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE historique_connexion ADD CONSTRAINT FK_C018B2D450EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640450EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC72D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE transaction_bancaire ADD CONSTRAINT FK_9C7E9B4B3B3BF721 FOREIGN KEY (id_compte_source) REFERENCES compte (id_compte)');
        $this->addSql('ALTER TABLE transaction_bancaire ADD CONSTRAINT FK_9C7E9B4B91F50651 FOREIGN KEY (id_compte_destination) REFERENCES compte (id_compte)');
        $this->addSql('ALTER TABLE transaction_carte ADD CONSTRAINT FK_1BE72FBDC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_session DROP FOREIGN KEY FK_3D19559950EAE44');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY FK_BAD4FFFD50EAE44');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526050EAE44');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499933AF6DB13');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993E173B1B8');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993C80EDDAD');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFEE173B1B8');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFEC80EDDAD');
        $this->addSql('ALTER TABLE historique_connexion DROP FOREIGN KEY FK_C018B2D450EAE44');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640450EAE44');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC72D6BA2D9');
        $this->addSql('ALTER TABLE transaction_bancaire DROP FOREIGN KEY FK_9C7E9B4B3B3BF721');
        $this->addSql('ALTER TABLE transaction_bancaire DROP FOREIGN KEY FK_9C7E9B4B91F50651');
        $this->addSql('ALTER TABLE transaction_carte DROP FOREIGN KEY FK_1BE72FBDC9C7CEB6');
        $this->addSql('DROP TABLE app_session');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE historique_connexion');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE transaction_bancaire');
        $this->addSql('DROP TABLE transaction_carte');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
