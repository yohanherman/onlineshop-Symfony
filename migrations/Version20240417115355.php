<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240417115355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coffretrouge (id INT AUTO_INCREMENT NOT NULL, path_product VARCHAR(255) NOT NULL, product_name VARCHAR(255) NOT NULL, product_note VARCHAR(255) NOT NULL, product_area VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, flag_path VARCHAR(255) NOT NULL, cepage VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, productagreement VARCHAR(255) NOT NULL, product_taste VARCHAR(255) NOT NULL, status INT NOT NULL, discount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE coffretrouge');
    }
}
