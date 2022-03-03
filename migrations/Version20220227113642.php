<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220227113642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE add_money ADD accounts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE add_money ADD CONSTRAINT FK_A6C1925CC5E8CE8 FOREIGN KEY (accounts_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A6C1925CC5E8CE8 ON add_money (accounts_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE add_money DROP CONSTRAINT FK_A6C1925CC5E8CE8');
        $this->addSql('DROP INDEX IDX_A6C1925CC5E8CE8');
        $this->addSql('ALTER TABLE add_money DROP accounts_id');
    }
}
