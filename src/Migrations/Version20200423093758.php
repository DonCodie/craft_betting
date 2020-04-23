<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423093758 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chart_curve DROP FOREIGN KEY FK_B1A8E2EB7A7B643');
        $this->addSql('DROP TABLE chart_curve_result');
        $this->addSql('DROP INDEX IDX_B1A8E2EB7A7B643 ON chart_curve');
        $this->addSql('ALTER TABLE chart_curve DROP result_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chart_curve_result (id INT AUTO_INCREMENT NOT NULL, result VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE chart_curve ADD result_id INT NOT NULL');
        $this->addSql('ALTER TABLE chart_curve ADD CONSTRAINT FK_B1A8E2EB7A7B643 FOREIGN KEY (result_id) REFERENCES chart_curve_result (id)');
        $this->addSql('CREATE INDEX IDX_B1A8E2EB7A7B643 ON chart_curve (result_id)');
    }
}
