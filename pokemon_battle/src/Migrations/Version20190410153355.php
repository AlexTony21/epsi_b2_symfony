<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190410153355 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE atk (id INT AUTO_INCREMENT NOT NULL, enable TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, name VARCHAR(255) NOT NULL, pwr INT NOT NULL, type SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objects (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, effet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, enable TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, name VARCHAR(255) NOT NULL, type SMALLINT NOT NULL, pv INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_atk (pokemon_id INT NOT NULL, atk_id INT NOT NULL, INDEX IDX_8DFDEE032FE71C3E (pokemon_id), INDEX IDX_8DFDEE03B1F5773 (atk_id), PRIMARY KEY(pokemon_id, atk_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_atk ADD CONSTRAINT FK_8DFDEE032FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_atk ADD CONSTRAINT FK_8DFDEE03B1F5773 FOREIGN KEY (atk_id) REFERENCES atk (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon_atk DROP FOREIGN KEY FK_8DFDEE03B1F5773');
        $this->addSql('ALTER TABLE pokemon_atk DROP FOREIGN KEY FK_8DFDEE032FE71C3E');
        $this->addSql('DROP TABLE atk');
        $this->addSql('DROP TABLE objects');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE pokemon_atk');
    }
}
