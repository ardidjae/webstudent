<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111085417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence_etudiant (competence_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_AAD1A38A15761DAB (competence_id), INDEX IDX_AAD1A38ADDEAB1A3 (etudiant_id), PRIMARY KEY(competence_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_etudiant ADD CONSTRAINT FK_AAD1A38A15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_etudiant ADD CONSTRAINT FK_AAD1A38ADDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_etudiant DROP FOREIGN KEY FK_AAD1A38A15761DAB');
        $this->addSql('ALTER TABLE competence_etudiant DROP FOREIGN KEY FK_AAD1A38ADDEAB1A3');
        $this->addSql('DROP TABLE competence_etudiant');
    }
}
