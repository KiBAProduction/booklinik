<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712162205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, typeof_operation_id INT NOT NULL, name VARCHAR(255) NOT NULL, img VARCHAR(255) DEFAULT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_1981A66D2E4324B5 (typeof_operation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeof_operation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D2E4324B5 FOREIGN KEY (typeof_operation_id) REFERENCES typeof_operation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D2E4324B5');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE typeof_operation');
    }
}
