
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `app_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_session` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(500) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_expiration` datetime NOT NULL,
  `est_active` tinyint(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_session`),
  KEY `IDX_3D19559950EAE44` (`id_utilisateur`),
  CONSTRAINT `FK_3D19559950EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `carte_security`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carte_security` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(10) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `carte_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E74A5CFC9C7CEB6` (`carte_id`),
  CONSTRAINT `FK_4E74A5CFC9C7CEB6` FOREIGN KEY (`carte_id`) REFERENCES `cartes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `cartes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cartes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `bank` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `type_carte` varchar(30) NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiration_date` varchar(10) DEFAULT NULL,
  `solde` decimal(15,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8B89555A76ED395` (`user_id`),
  CONSTRAINT `FK_D8B89555A76ED395` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `numero_compte` varchar(30) NOT NULL,
  `solde` decimal(15,2) NOT NULL,
  `type_compte` varchar(20) NOT NULL,
  `est_actif` tinyint(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_compte`),
  UNIQUE KEY `UNIQ_CFF652609731415A` (`numero_compte`),
  KEY `IDX_CFF6526050EAE44` (`id_utilisateur`),
  CONSTRAINT `FK_CFF6526050EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrat` (
  `id_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `numero_contrat` varchar(50) NOT NULL,
  `montant_credit` decimal(15,2) NOT NULL,
  `taux_interet` decimal(5,2) NOT NULL,
  `duree_en_mois` int(11) NOT NULL,
  `mensualite` decimal(15,2) NOT NULL,
  `montant_total` decimal(15,2) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_generation` datetime NOT NULL,
  `date_signature` datetime DEFAULT NULL,
  `statut` varchar(30) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_maj` datetime NOT NULL,
  `id_credit` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `chemin_fichier` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_contrat`),
  KEY `IDX_603499933AF6DB13` (`id_credit`),
  KEY `IDX_60349993E173B1B8` (`id_client`),
  KEY `IDX_60349993C80EDDAD` (`id_agent`),
  CONSTRAINT `FK_603499933AF6DB13` FOREIGN KEY (`id_credit`) REFERENCES `credit` (`id_credit`),
  CONSTRAINT `FK_60349993C80EDDAD` FOREIGN KEY (`id_agent`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_60349993E173B1B8` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credit` (
  `id_credit` int(11) NOT NULL AUTO_INCREMENT,
  `montant` decimal(15,2) NOT NULL,
  `taux_interet` decimal(5,2) NOT NULL,
  `duree_en_mois` int(11) NOT NULL,
  `mensualite` decimal(15,2) NOT NULL,
  `montant_total` decimal(15,2) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `motif_demande` longtext,
  `motif_rejet` longtext,
  `salaire_mensuel` decimal(15,2) DEFAULT NULL,
  `type_contrat` varchar(40) DEFAULT NULL,
  `date_prise` date DEFAULT NULL,
  `date_debut_paiement` date DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_traitement` datetime DEFAULT NULL,
  `date_maj` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_agent` int DEFAULT NULL,
  PRIMARY KEY (`id_credit`),
  KEY `IDX_1CC16EFEE173B1B8` (`id_client`),
  KEY `IDX_1CC16EFEC80EDDAD` (`id_agent`),
  CONSTRAINT `FK_1CC16EFEC80EDDAD` FOREIGN KEY (`id_agent`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_1CC16EFEE173B1B8` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `historique_connexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historique_connexion` (
  `id_historique` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `browser_info` varchar(255) DEFAULT NULL,
  `date_connexion` datetime NOT NULL,
  `statut` varchar(30) NOT NULL,
  `raison_echec` longtext,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_historique`),
  KEY `IDX_C018B2D450EAE44` (`id_utilisateur`),
  CONSTRAINT `FK_C018B2D450EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `reclamation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `statut` varchar(30) NOT NULL,
  `date_reclamation` datetime NOT NULL,
  `sentiment` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `reponse` longtext,
  `reponse_date` datetime DEFAULT NULL,
  `date_traitement` datetime DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `reponse_par` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CE60640450EAE44` (`id_utilisateur`),
  KEY `IDX_CE6064041F06990` (`reponse_par`),
  CONSTRAINT `FK_CE6064041F06990` FOREIGN KEY (`reponse_par`) REFERENCES `utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_CE60640450EAE44` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` longtext NOT NULL,
  `date_reponse` datetime NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `reclamation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5FB6DEC72D6BA2D9` (`reclamation_id`),
  CONSTRAINT `FK_5FB6DEC72D6BA2D9` FOREIGN KEY (`reclamation_id`) REFERENCES `reclamation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `transaction_bancaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_bancaire` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `montant` decimal(15,2) NOT NULL,
  `description` longtext,
  `date_creation` datetime NOT NULL,
  `id_compte_source` int(11) NOT NULL,
  `id_compte_destination` int DEFAULT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `IDX_9C7E9B4B3B3BF721` (`id_compte_source`),
  KEY `IDX_9C7E9B4B91F50651` (`id_compte_destination`),
  CONSTRAINT `FK_9C7E9B4B3B3BF721` FOREIGN KEY (`id_compte_source`) REFERENCES `compte` (`id_compte`),
  CONSTRAINT `FK_9C7E9B4B91F50651` FOREIGN KEY (`id_compte_destination`) REFERENCES `compte` (`id_compte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `transaction_carte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `montant` double NOT NULL,
  `date` datetime NOT NULL,
  `carte_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1BE72FBDC9C7CEB6` (`carte_id`),
  CONSTRAINT `FK_1BE72FBDC9C7CEB6` FOREIGN KEY (`carte_id`) REFERENCES `cartes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(180) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  `is_verified` tinyint(11) NOT NULL,
  `est_actif` tinyint(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  `cin` varchar(8) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `selected_offer` varchar(100) DEFAULT NULL,
  `client_status` varchar(20) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_maj` datetime NOT NULL,
  `ban_until` datetime DEFAULT NULL,
  `ban_reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`),
  UNIQUE KEY `UNIQ_1D1C63B3ABE530DA` (`cin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

