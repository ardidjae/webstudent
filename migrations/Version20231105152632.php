<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231105152632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note ADD competence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1415761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA1415761DAB ON note (competence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1415761DAB');
        $this->addSql('DROP INDEX IDX_CFBDFA1415761DAB ON note');
        $this->addSql('ALTER TABLE note DROP competence_id');
    }
}
