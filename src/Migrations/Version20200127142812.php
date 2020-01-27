<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200127142812 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auto_brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auto ADD marqueauto_id INT NOT NULL');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAE89F974F FOREIGN KEY (marqueauto_id) REFERENCES auto_brand (id)');
        $this->addSql('CREATE INDEX IDX_66BA25FAE89F974F ON auto (marqueauto_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAE89F974F');
        $this->addSql('DROP TABLE auto_brand');
        $this->addSql('DROP INDEX IDX_66BA25FAE89F974F ON auto');
        $this->addSql('ALTER TABLE auto DROP marqueauto_id');
    }
}
