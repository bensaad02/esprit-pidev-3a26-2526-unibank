<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260422101500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add missing utilisateur ban columns (ban_until, ban_reason).';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN IF NOT EXISTS ban_until DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN IF NOT EXISTS ban_reason VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur DROP COLUMN IF EXISTS ban_until');
        $this->addSql('ALTER TABLE utilisateur DROP COLUMN IF EXISTS ban_reason');
    }
}
