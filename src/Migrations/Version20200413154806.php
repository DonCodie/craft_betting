<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413154806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prono (id INT AUTO_INCREMENT NOT NULL, country_and_league_id INT NOT NULL, home_team_id INT NOT NULL, visitor_team_id INT NOT NULL, result_id INT NOT NULL, website_id INT NOT NULL, website_url_id INT NOT NULL, datetime DATETIME NOT NULL, odd VARCHAR(255) NOT NULL, INDEX IDX_9B3EC938F873C084 (country_and_league_id), INDEX IDX_9B3EC9389C4C13F6 (home_team_id), INDEX IDX_9B3EC938EB7F4866 (visitor_team_id), INDEX IDX_9B3EC9387A7B643 (result_id), INDEX IDX_9B3EC93818F45C82 (website_id), INDEX IDX_9B3EC938134A3ECC (website_url_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC938F873C084 FOREIGN KEY (country_and_league_id) REFERENCES country_and_league (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC9389C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC938EB7F4866 FOREIGN KEY (visitor_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC9387A7B643 FOREIGN KEY (result_id) REFERENCES result (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC93818F45C82 FOREIGN KEY (website_id) REFERENCES website (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC938134A3ECC FOREIGN KEY (website_url_id) REFERENCES website_url (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE prono');
    }
}
