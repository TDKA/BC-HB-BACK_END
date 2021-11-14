<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211114195510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD fuel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E597C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('CREATE INDEX IDX_F65593E597C79677 ON annonce (fuel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E597C79677');
        $this->addSql('DROP INDEX IDX_F65593E597C79677 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP fuel_id');
    }
}
