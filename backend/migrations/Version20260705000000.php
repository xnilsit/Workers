<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260705000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add type column to monthly_time_sheet_entry and make start/break_duration/end nullable';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE monthly_time_sheet_entry CHANGE start start TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE break_duration break_duration INT DEFAULT NULL, CHANGE end end TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', ADD type INT NOT NULL DEFAULT 1 AFTER end');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE monthly_time_sheet_entry DROP type, CHANGE start start TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', CHANGE break_duration break_duration INT NOT NULL, CHANGE end end TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\'');
    }
}
