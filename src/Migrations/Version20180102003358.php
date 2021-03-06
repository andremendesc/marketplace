<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180102003358 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE product ADD COLUMN image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD COLUMN updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, price, description FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, name VARCHAR(100) NOT NULL, price NUMERIC(10, 2) NOT NULL, description CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, name, price, description) SELECT id, name, price, description FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }
}
