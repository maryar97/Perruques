<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231108102240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detailscommandes (commande_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, prix INT NOT NULL, INDEX IDX_71421EC782EA2E54 (commande_id), INDEX IDX_71421EC7F347EFB (produit_id), PRIMARY KEY(commande_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE detailscommandes ADD CONSTRAINT FK_71421EC782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE detailscommandes ADD CONSTRAINT FK_71421EC7F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commande ADD reference VARCHAR(20) NOT NULL, CHANGE datecom datecom DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE datepaiement datepaiement DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE facturedate facturedate DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detailscommandes DROP FOREIGN KEY FK_71421EC782EA2E54');
        $this->addSql('ALTER TABLE detailscommandes DROP FOREIGN KEY FK_71421EC7F347EFB');
        $this->addSql('DROP TABLE detailscommandes');
        $this->addSql('ALTER TABLE commande DROP reference, CHANGE datecom datecom DATETIME NOT NULL, CHANGE datepaiement datepaiement DATETIME NOT NULL, CHANGE facturedate facturedate DATETIME NOT NULL');
    }
}
