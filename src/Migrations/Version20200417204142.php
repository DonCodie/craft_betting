<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417204142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prono_sur ADD country_and_league_id INT NOT NULL, ADD home_team_id INT NOT NULL, ADD visitor_team_id INT NOT NULL, ADD result_id INT NOT NULL, ADD website_id INT NOT NULL, ADD website_url_id INT NOT NULL, ADD sport_id INT NOT NULL, ADD date DATE NOT NULL, ADD time TIME NOT NULL, ADD odd VARCHAR(255) NOT NULL, ADD analysis LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A772F873C084 FOREIGN KEY (country_and_league_id) REFERENCES country_and_league (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A7729C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A772EB7F4866 FOREIGN KEY (visitor_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A7727A7B643 FOREIGN KEY (result_id) REFERENCES result (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A77218F45C82 FOREIGN KEY (website_id) REFERENCES website (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A772134A3ECC FOREIGN KEY (website_url_id) REFERENCES website_url (id)');
        $this->addSql('ALTER TABLE prono_sur ADD CONSTRAINT FK_8527A772AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('CREATE INDEX IDX_8527A772F873C084 ON prono_sur (country_and_league_id)');
        $this->addSql('CREATE INDEX IDX_8527A7729C4C13F6 ON prono_sur (home_team_id)');
        $this->addSql('CREATE INDEX IDX_8527A772EB7F4866 ON prono_sur (visitor_team_id)');
        $this->addSql('CREATE INDEX IDX_8527A7727A7B643 ON prono_sur (result_id)');
        $this->addSql('CREATE INDEX IDX_8527A77218F45C82 ON prono_sur (website_id)');
        $this->addSql('CREATE INDEX IDX_8527A772134A3ECC ON prono_sur (website_url_id)');
        $this->addSql('CREATE INDEX IDX_8527A772AC78BCF8 ON prono_sur (sport_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A772F873C084');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A7729C4C13F6');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A772EB7F4866');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A7727A7B643');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A77218F45C82');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A772134A3ECC');
        $this->addSql('ALTER TABLE prono_sur DROP FOREIGN KEY FK_8527A772AC78BCF8');
        $this->addSql('DROP INDEX IDX_8527A772F873C084 ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A7729C4C13F6 ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A772EB7F4866 ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A7727A7B643 ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A77218F45C82 ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A772134A3ECC ON prono_sur');
        $this->addSql('DROP INDEX IDX_8527A772AC78BCF8 ON prono_sur');
        $this->addSql('ALTER TABLE prono_sur DROP country_and_league_id, DROP home_team_id, DROP visitor_team_id, DROP result_id, DROP website_id, DROP website_url_id, DROP sport_id, DROP date, DROP time, DROP odd, DROP analysis');
    }
}
