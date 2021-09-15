<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913215155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vcard ADD country VARCHAR(255) DEFAULT NULL, ADD region VARCHAR(255) DEFAULT NULL, ADD street_house_number VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, CHANGE adr postcode VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vcard ADD adr VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP postcode, DROP country, DROP region, DROP street_house_number, DROP city');
    }
}
