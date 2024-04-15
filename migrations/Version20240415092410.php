<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415092410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD vins_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AFBA7BE81 FOREIGN KEY (vins_id) REFERENCES vins (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AFBA7BE81 ON images (vins_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AFBA7BE81');
        $this->addSql('DROP INDEX IDX_E01FBE6AFBA7BE81 ON images');
        $this->addSql('ALTER TABLE images DROP vins_id');
    }
}
