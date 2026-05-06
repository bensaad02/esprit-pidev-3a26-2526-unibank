<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260418225610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_security (id INT AUTO_INCREMENT NOT NULL, pin VARCHAR(10) NOT NULL, cvv VARCHAR(10) NOT NULL, created_at DATETIME DEFAULT NULL, carte_id INT NOT NULL, UNIQUE INDEX UNIQ_4E74A5CFC9C7CEB6 (carte_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE cartes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, bank VARCHAR(100) NOT NULL, status VARCHAR(30) NOT NULL, type_carte VARCHAR(30) NOT NULL, card_number VARCHAR(20) DEFAULT NULL, expiration_date VARCHAR(10) DEFAULT NULL, solde NUMERIC(15, 2) NOT NULL, user_id INT NOT NULL, INDEX IDX_D8B89555A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE carte_security ADD CONSTRAINT FK_4E74A5CFC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES cartes (id)');
        $this->addSql('ALTER TABLE cartes ADD CONSTRAINT FK_D8B89555A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE carte DROP FOREIGN KEY `FK_BAD4FFFD50EAE44`');
        $this->addSql('DROP TABLE carte');
        $this->addSql('ALTER TABLE contrat ADD chemin_fichier VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD reponse LONGTEXT DEFAULT NULL, ADD reponse_date DATETIME DEFAULT NULL, ADD date_traitement DATETIME DEFAULT NULL, ADD type VARCHAR(50) NOT NULL, ADD reponse_par INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064041F06990 FOREIGN KEY (reponse_par) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('CREATE INDEX IDX_CE6064041F06990 ON reclamation (reponse_par)');
        $this->addSql('ALTER TABLE transaction_carte DROP FOREIGN KEY `FK_1BE72FBDC9C7CEB6`');
        $this->addSql('ALTER TABLE transaction_carte DROP description, DROP statut, CHANGE type type VARCHAR(50) NOT NULL, CHANGE montant montant DOUBLE PRECISION NOT NULL, CHANGE date_transaction date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE transaction_carte ADD CONSTRAINT FK_1BE72FBDC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES cartes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, bank VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, status VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, type_carte VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, card_number VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, expiration_date VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, solde NUMERIC(15, 2) NOT NULL, id_utilisateur INT NOT NULL, INDEX IDX_BAD4FFFD50EAE44 (id_utilisateur), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT `FK_BAD4FFFD50EAE44` FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE carte_security DROP FOREIGN KEY FK_4E74A5CFC9C7CEB6');
        $this->addSql('ALTER TABLE cartes DROP FOREIGN KEY FK_D8B89555A76ED395');
        $this->addSql('DROP TABLE carte_security');
        $this->addSql('DROP TABLE cartes');
        $this->addSql('ALTER TABLE contrat DROP chemin_fichier');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064041F06990');
        $this->addSql('DROP INDEX IDX_CE6064041F06990 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP reponse, DROP reponse_date, DROP date_traitement, DROP type, DROP reponse_par');
        $this->addSql('ALTER TABLE transaction_carte DROP FOREIGN KEY FK_1BE72FBDC9C7CEB6');
        $this->addSql('ALTER TABLE transaction_carte ADD description LONGTEXT DEFAULT NULL, ADD statut VARCHAR(30) NOT NULL, CHANGE montant montant NUMERIC(15, 2) NOT NULL, CHANGE type type VARCHAR(30) NOT NULL, CHANGE date date_transaction DATETIME NOT NULL');
        $this->addSql('ALTER TABLE transaction_carte ADD CONSTRAINT `FK_1BE72FBDC9C7CEB6` FOREIGN KEY (carte_id) REFERENCES carte (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
