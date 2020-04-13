<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200412233559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pronos (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pronos_sports (pronos_id INT NOT NULL, sports_id INT NOT NULL, INDEX IDX_C7606AB74C37E07C (pronos_id), INDEX IDX_C7606AB754BBBFB7 (sports_id), PRIMARY KEY(pronos_id, sports_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pronos_sports ADD CONSTRAINT FK_C7606AB74C37E07C FOREIGN KEY (pronos_id) REFERENCES pronos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pronos_sports ADD CONSTRAINT FK_C7606AB754BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pronos_sports DROP FOREIGN KEY FK_C7606AB74C37E07C');
        $this->addSql('DROP TABLE pronos');
        $this->addSql('DROP TABLE pronos_sports');
    }
}
