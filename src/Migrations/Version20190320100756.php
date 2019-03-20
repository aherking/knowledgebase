<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320100756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, changed DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, userID INT NOT NULL, workflow MEDIUMTEXT DEFAULT NULL, errormessage MEDIUMTEXT DEFAULT NULL, solution MEDIUMTEXT DEFAULT NULL, UNIQUE INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_tags_relations (articleID INT NOT NULL, tagID INT NOT NULL, INDEX IDX_FFCC4480C5CC8026 (articleID), INDEX IDX_FFCC448054788D14 (tagID), PRIMARY KEY(articleID, tagID)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles TEXT NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, parents VARCHAR(255) DEFAULT NULL, UNIQUE INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_tags_relations ADD CONSTRAINT FK_FFCC4480C5CC8026 FOREIGN KEY (articleID) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE articles_tags_relations ADD CONSTRAINT FK_FFCC448054788D14 FOREIGN KEY (tagID) REFERENCES tags (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles_tags_relations DROP FOREIGN KEY FK_FFCC4480C5CC8026');
        $this->addSql('ALTER TABLE articles_tags_relations DROP FOREIGN KEY FK_FFCC448054788D14');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles_tags_relations');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE tags');
    }
}
