<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180102195505 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_957A6479C05FB297');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF');
        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8');
        $this->addSql('DROP INDEX UNIQ_957A647953A23E0A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user AS SELECT id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage FROM fos_user');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('CREATE TABLE fos_user (id INTEGER NOT NULL, bank_account INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL COLLATE BINARY, username_canonical VARCHAR(180) NOT NULL COLLATE BINARY, email VARCHAR(180) NOT NULL COLLATE BINARY, email_canonical VARCHAR(180) NOT NULL COLLATE BINARY, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL COLLATE BINARY, password_requested_at DATETIME DEFAULT NULL, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , transferEnabled BOOLEAN DEFAULT NULL, lastTransfer VARCHAR(255) DEFAULT NULL COLLATE BINARY, transferInterval VARCHAR(255) DEFAULT NULL COLLATE BINARY, transferDay INTEGER DEFAULT NULL, automaticAnticipationEnabled BOOLEAN DEFAULT NULL, anticipatableVolumePercentage INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_957A647953A23E0A FOREIGN KEY (bank_account) REFERENCES bank_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO fos_user (id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage) SELECT id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage FROM __temp__fos_user');
        $this->addSql('DROP TABLE __temp__fos_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479C05FB297 ON fos_user (confirmation_token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647953A23E0A ON fos_user (bank_account)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF');
        $this->addSql('DROP INDEX UNIQ_957A6479C05FB297');
        $this->addSql('DROP INDEX UNIQ_957A647953A23E0A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user AS SELECT id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage FROM fos_user');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('CREATE TABLE fos_user (id INTEGER NOT NULL, bank_account INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles CLOB NOT NULL --(DC2Type:array)
        , transferEnabled BOOLEAN DEFAULT NULL, lastTransfer VARCHAR(255) DEFAULT NULL, transferInterval VARCHAR(255) DEFAULT NULL, transferDay INTEGER DEFAULT NULL, automaticAnticipationEnabled BOOLEAN DEFAULT NULL, anticipatableVolumePercentage INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO fos_user (id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage) SELECT id, bank_account, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, confirmation_token, password_requested_at, roles, transferEnabled, lastTransfer, transferInterval, transferDay, automaticAnticipationEnabled, anticipatableVolumePercentage FROM __temp__fos_user');
        $this->addSql('DROP TABLE __temp__fos_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479C05FB297 ON fos_user (confirmation_token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647953A23E0A ON fos_user (bank_account)');
    }
}
