<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240323154450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, category_id_id INT NOT NULL, first_image_id_id INT DEFAULT NULL, second_image_id_id INT DEFAULT NULL, third_image_id_id INT DEFAULT NULL, title VARCHAR(200) NOT NULL, text VARCHAR(7000) NOT NULL, date_publication DATETIME NOT NULL, INDEX IDX_23A0E669777D11E (category_id_id), INDEX IDX_23A0E66F6F4173C (first_image_id_id), INDEX IDX_23A0E661E486E0 (second_image_id_id), INDEX IDX_23A0E66286FF10A (third_image_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(200) NOT NULL, url VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669777D11E FOREIGN KEY (category_id_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F6F4173C FOREIGN KEY (first_image_id_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E661E486E0 FOREIGN KEY (second_image_id_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66286FF10A FOREIGN KEY (third_image_id_id) REFERENCES image (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669777D11E');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F6F4173C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E661E486E0');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66286FF10A');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE image');
    }
}
