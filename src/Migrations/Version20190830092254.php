<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830092254 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, postalcode INT NOT NULL, ville VARCHAR(255) NOT NULL, phone INT NOT NULL, email VARCHAR(255) NOT NULL, birthday DATE NOT NULL, doctor_name VARCHAR(255) NOT NULL, doctor_adress VARCHAR(255) NOT NULL, doctor_phone INT NOT NULL, emergency_people VARCHAR(255) NOT NULL, emergency_phone INT NOT NULL, medical_agreement TINYINT(1) NOT NULL, blood_group VARCHAR(255) NOT NULL, allergy VARCHAR(255) NOT NULL, pictures_agreement TINYINT(1) NOT NULL, pack_choice TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite CHANGE description description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE member');
        $this->addSql('ALTER TABLE activite CHANGE description description VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
