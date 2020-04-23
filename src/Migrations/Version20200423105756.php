<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423105756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chart_curve_result DROP FOREIGN KEY FK_55EB935C77B34074');
        $this->addSql('DROP INDEX IDX_55EB935C77B34074 ON chart_curve_result');
        $this->addSql('ALTER TABLE chart_curve_result DROP chart_curve_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chart_curve_result ADD chart_curve_id INT NOT NULL');
        $this->addSql('ALTER TABLE chart_curve_result ADD CONSTRAINT FK_55EB935C77B34074 FOREIGN KEY (chart_curve_id) REFERENCES chart_curve (id)');
        $this->addSql('CREATE INDEX IDX_55EB935C77B34074 ON chart_curve_result (chart_curve_id)');
    }
}
