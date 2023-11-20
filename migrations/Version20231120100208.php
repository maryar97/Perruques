<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120100208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP adrfact, DROP adrlivr, CHANGE reference reference VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE rubriqueart rubriqueart VARCHAR(255) DEFAULT NULL, CHANGE sousrubriqueart sousrubriqueart VARCHAR(255) DEFAULT NULL, CHANGE reffou reffou VARCHAR(100) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL, CHANGE reset_token reset_token VARCHAR(100) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE reset_token reset_token VARCHAR(100) DEFAULT \'NULL\', CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE produit CHANGE rubriqueart rubriqueart VARCHAR(255) DEFAULT \'NULL\', CHANGE sousrubriqueart sousrubriqueart VARCHAR(255) DEFAULT \'NULL\', CHANGE reffou reffou VARCHAR(100) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commande ADD adrfact VARCHAR(255) NOT NULL, ADD adrlivr VARCHAR(255) NOT NULL, CHANGE reference reference VARCHAR(20) DEFAULT \'NULL\'');
    }
}
