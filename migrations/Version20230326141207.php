<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326141207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9996FF3DF6');
        $this->addSql('DROP INDEX IDX_AC634F9996FF3DF6 ON livre');
        $this->addSql('ALTER TABLE livre DROP id_editeur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre ADD id_editeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9996FF3DF6 FOREIGN KEY (id_editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F9996FF3DF6 ON livre (id_editeur_id)');
    }
}
