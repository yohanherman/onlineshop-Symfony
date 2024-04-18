<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240418081451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vins ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vins ADD CONSTRAINT FK_1A64B65CA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_1A64B65CA21214B7 ON vins (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vins DROP FOREIGN KEY FK_1A64B65CA21214B7');
        $this->addSql('DROP INDEX IDX_1A64B65CA21214B7 ON vins');
        $this->addSql('ALTER TABLE vins DROP categories_id');
    }
}
