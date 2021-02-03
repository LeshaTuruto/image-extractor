<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203081056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE extracted_image (id INT AUTO_INCREMENT NOT NULL, image_url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extracted_image_characteristic (id INT AUTO_INCREMENT NOT NULL, extracted_image_id INT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_8042AA76CA47FB23 (extracted_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE extracted_image_characteristic ADD CONSTRAINT FK_8042AA76CA47FB23 FOREIGN KEY (extracted_image_id) REFERENCES extracted_image (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE extracted_image_characteristic DROP FOREIGN KEY FK_8042AA76CA47FB23');
        $this->addSql('DROP TABLE extracted_image');
        $this->addSql('DROP TABLE extracted_image_characteristic');
    }
}
