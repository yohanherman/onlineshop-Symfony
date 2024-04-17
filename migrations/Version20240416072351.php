<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416072351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reviews_user (reviews_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B3564F048092D97F (reviews_id), INDEX IDX_B3564F04A76ED395 (user_id), PRIMARY KEY(reviews_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F048092D97F FOREIGN KEY (reviews_id) REFERENCES reviews (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F04A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F048092D97F');
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F04A76ED395');
        $this->addSql('DROP TABLE reviews_user');
    }
}
