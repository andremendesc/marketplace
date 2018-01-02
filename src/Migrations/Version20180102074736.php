<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180102074736 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE bank_account (id INTEGER NOT NULL, bank_code INTEGER NOT NULL, agencia INTEGER NOT NULL, agencia_dv INTEGER NOT NULL, conta INTEGER NOT NULL, conta_dv INTEGER NOT NULL, document_number INTEGER NOT NULL, document_type VARCHAR(255) DEFAULT NULL, legal_name VARCHAR(255) DEFAULT NULL, date_created DATETIME NOT NULL, type VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, price, description, image, updated_at FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, name VARCHAR(100) NOT NULL COLLATE BINARY, price NUMERIC(10, 2) NOT NULL, description CLOB NOT NULL COLLATE BINARY, image VARCHAR(255) DEFAULT NULL COLLATE BINARY, updated_at DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, name, price, description, image, updated_at) SELECT id, name, price, description, image, updated_at FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE bank_account');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, price, description, image, updated_at FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, name VARCHAR(100) NOT NULL, price NUMERIC(10, 2) NOT NULL, description CLOB NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, name, price, description, image, updated_at) SELECT id, name, price, description, image, updated_at FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }
}
