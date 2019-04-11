<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190410185304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipe_pokemon (id INT AUTO_INCREMENT NOT NULL, surnom VARCHAR(255) DEFAULT NULL, pv INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon ADD equipe_pokemon_id INT NOT NULL');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F35D446CF FOREIGN KEY (equipe_pokemon_id) REFERENCES equipe_pokemon (id)');
        $this->addSql('CREATE INDEX IDX_62DC90F35D446CF ON pokemon (equipe_pokemon_id)');
        $this->addSql('ALTER TABLE dresseur ADD equipe_pokemon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dresseur ADD CONSTRAINT FK_77EA2FC65D446CF FOREIGN KEY (equipe_pokemon_id) REFERENCES equipe_pokemon (id)');
        $this->addSql('CREATE INDEX IDX_77EA2FC65D446CF ON dresseur (equipe_pokemon_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F35D446CF');
        $this->addSql('ALTER TABLE dresseur DROP FOREIGN KEY FK_77EA2FC65D446CF');
        $this->addSql('DROP TABLE equipe_pokemon');
        $this->addSql('DROP INDEX IDX_77EA2FC65D446CF ON dresseur');
        $this->addSql('ALTER TABLE dresseur DROP equipe_pokemon_id');
        $this->addSql('DROP INDEX IDX_62DC90F35D446CF ON pokemon');
        $this->addSql('ALTER TABLE pokemon DROP equipe_pokemon_id');
    }
}
