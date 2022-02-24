<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220223161150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD firstname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD lastname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD adress VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD city VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD postalcode VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client ADD country VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE client DROP firstname');
        $this->addSql('ALTER TABLE client DROP lastname');
        $this->addSql('ALTER TABLE client DROP adress');
        $this->addSql('ALTER TABLE client DROP city');
        $this->addSql('ALTER TABLE client DROP postalcode');
        $this->addSql('ALTER TABLE client DROP country');
    }
}
