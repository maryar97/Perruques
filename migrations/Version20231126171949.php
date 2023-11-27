<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231126171949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recap_details (id INT AUTO_INCREMENT NOT NULL, commande_produit_id INT NOT NULL, quantite INT NOT NULL, produit VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, total_recap VARCHAR(255) NOT NULL, INDEX IDX_1D1FD6997F6521D (commande_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recap_details ADD CONSTRAINT FK_1D1FD6997F6521D FOREIGN KEY (commande_produit_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE commande DROP totalcom, DROP datepaiement, DROP descppaiement, DROP modepaiement, DROP facturedate, CHANGE stripe_session_id stripe_session_id VARCHAR(255) DEFAULT NULL, CHANGE paypal_commande_id paypal_commande_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE rubriqueart rubriqueart VARCHAR(255) DEFAULT NULL, CHANGE sousrubriqueart sousrubriqueart VARCHAR(255) DEFAULT NULL, CHANGE reffou reffou VARCHAR(100) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL, CHANGE reset_token reset_token VARCHAR(100) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recap_details DROP FOREIGN KEY FK_1D1FD6997F6521D');
        $this->addSql('DROP TABLE recap_details');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE reset_token reset_token VARCHAR(100) DEFAULT \'NULL\', CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE produit CHANGE rubriqueart rubriqueart VARCHAR(255) DEFAULT \'NULL\', CHANGE sousrubriqueart sousrubriqueart VARCHAR(255) DEFAULT \'NULL\', CHANGE reffou reffou VARCHAR(100) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commande ADD totalcom INT NOT NULL, ADD datepaiement DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD descppaiement LONGTEXT NOT NULL, ADD modepaiement VARCHAR(100) NOT NULL, ADD facturedate DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE stripe_session_id stripe_session_id VARCHAR(255) DEFAULT \'NULL\', CHANGE paypal_commande_id paypal_commande_id VARCHAR(255) DEFAULT \'NULL\'');
    }
}
