<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220303113242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bank_account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transfer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bank_account (id INT NOT NULL, account_name VARCHAR(255) NOT NULL, initial_amount DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transfer (id INT NOT NULL, amount DOUBLE PRECISION NOT NULL, transmitter VARCHAR(255) NOT NULL, receiver VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE account ADD dateofbirth DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE add_money DROP CONSTRAINT fk_a6c1925cc5e8ce8');
        $this->addSql('DROP INDEX idx_a6c1925cc5e8ce8');
        $this->addSql('ALTER TABLE add_money DROP accounts_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE bank_account_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transfer_id_seq CASCADE');
        $this->addSql('DROP TABLE bank_account');
        $this->addSql('DROP TABLE transfer');
        $this->addSql('ALTER TABLE account DROP dateofbirth');
        $this->addSql('ALTER TABLE add_money ADD accounts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE add_money ADD CONSTRAINT fk_a6c1925cc5e8ce8 FOREIGN KEY (accounts_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_a6c1925cc5e8ce8 ON add_money (accounts_id)');
    }
}
