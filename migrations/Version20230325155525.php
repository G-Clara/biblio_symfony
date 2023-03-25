<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230325155525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier_livre (panier_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_854E6024F77D927C (panier_id), INDEX IDX_854E602437D925CB (livre_id), PRIMARY KEY(panier_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier_livre ADD CONSTRAINT FK_854E6024F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_livre ADD CONSTRAINT FK_854E602437D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur ADD relation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD id_editeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9996FF3DF6 FOREIGN KEY (id_editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F9996FF3DF6 ON livre (id_editeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier_livre DROP FOREIGN KEY FK_854E6024F77D927C');
        $this->addSql('ALTER TABLE panier_livre DROP FOREIGN KEY FK_854E602437D925CB');
        $this->addSql('DROP TABLE panier_livre');
        $this->addSql('ALTER TABLE auteur DROP relation');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9996FF3DF6');
        $this->addSql('DROP INDEX IDX_AC634F9996FF3DF6 ON livre');
        $this->addSql('ALTER TABLE livre DROP id_editeur_id');
    }
}
