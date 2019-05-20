<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411091624 extends AbstractMigration
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
        $this->addSql('CREATE TABLE dresseur (id INT AUTO_INCREMENT NOT NULL, equipe_pokemon_id INT NOT NULL, nom VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_77EA2FC66C6E55B5 (nom), INDEX IDX_77EA2FC65D446CF (equipe_pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_pokemon (id INT AUTO_INCREMENT NOT NULL, surnom VARCHAR(255) DEFAULT NULL, pv INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objects (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, effet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, equipe_pokemon_id INT DEFAULT NULL, enable TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, name VARCHAR(255) NOT NULL, type SMALLINT NOT NULL, pv INT NOT NULL, INDEX IDX_62DC90F35D446CF (equipe_pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_atk (pokemon_id INT NOT NULL, atk_id INT NOT NULL, INDEX IDX_8DFDEE032FE71C3E (pokemon_id), INDEX IDX_8DFDEE03B1F5773 (atk_id), PRIMARY KEY(pokemon_id, atk_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dresseur ADD CONSTRAINT FK_77EA2FC65D446CF FOREIGN KEY (equipe_pokemon_id) REFERENCES equipe_pokemon (id)');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F35D446CF FOREIGN KEY (equipe_pokemon_id) REFERENCES equipe_pokemon (id)');
        $this->addSql('ALTER TABLE pokemon_atk ADD CONSTRAINT FK_8DFDEE032FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_atk ADD CONSTRAINT FK_8DFDEE03B1F5773 FOREIGN KEY (atk_id) REFERENCES atk (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon_atk DROP FOREIGN KEY FK_8DFDEE03B1F5773');
        $this->addSql('ALTER TABLE dresseur DROP FOREIGN KEY FK_77EA2FC65D446CF');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F35D446CF');
        $this->addSql('ALTER TABLE pokemon_atk DROP FOREIGN KEY FK_8DFDEE032FE71C3E');
        $this->addSql('DROP TABLE atk');
        $this->addSql('DROP TABLE dresseur');
        $this->addSql('DROP TABLE equipe_pokemon');
        $this->addSql('DROP TABLE objects');
        $this->addSql('DROP TABLE pokemon');
        $this->addSql('DROP TABLE pokemon_atk');
    }
}
