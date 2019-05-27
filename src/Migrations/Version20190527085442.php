<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527085442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tags CHANGE main main TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE articles_tags_relations ADD CONSTRAINT FK_FFCC4480C5CC8026 FOREIGN KEY (articleID) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE articles_tags_relations ADD CONSTRAINT FK_FFCC448054788D14 FOREIGN KEY (tagID) REFERENCES tags (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles_tags_relations DROP FOREIGN KEY FK_FFCC4480C5CC8026');
        $this->addSql('ALTER TABLE articles_tags_relations DROP FOREIGN KEY FK_FFCC448054788D14');
        $this->addSql('ALTER TABLE tags CHANGE main main TINYINT(1) DEFAULT NULL');
    }
}
