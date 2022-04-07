<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407172247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fitness DROP FOREIGN KEY FK_E583D7471179CD6');
        $this->addSql('ALTER TABLE gainage DROP FOREIGN KEY FK_17F2D46859442CB');
        $this->addSql('ALTER TABLE musculation DROP FOREIGN KEY FK_F9EDEE4471179CD6');
        $this->addSql('CREATE TABLE titresfit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titresgainage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titresmuscu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE titres_fit');
        $this->addSql('DROP TABLE titres_gainage');
        $this->addSql('DROP TABLE titres_muscu');
        $this->addSql('ALTER TABLE fitness DROP FOREIGN KEY FK_E583D7471179CD6');
        $this->addSql('ALTER TABLE fitness CHANGE pente pente VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE fitness ADD CONSTRAINT FK_E583D7471179CD6 FOREIGN KEY (name_id) REFERENCES titresfit (id)');
        $this->addSql('ALTER TABLE gainage DROP FOREIGN KEY FK_17F2D46859442CB');
        $this->addSql('ALTER TABLE gainage CHANGE poids poids DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE gainage ADD CONSTRAINT FK_17F2D46859442CB FOREIGN KEY (id_titre_id) REFERENCES titresgainage (id)');
        $this->addSql('ALTER TABLE musculation DROP FOREIGN KEY FK_F9EDEE4471179CD6');
        $this->addSql('ALTER TABLE musculation CHANGE poids poids DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE musculation ADD CONSTRAINT FK_F9EDEE4471179CD6 FOREIGN KEY (name_id) REFERENCES titresmuscu (id)');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_2C64E8D9E934951A');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_2C64E8D9217BBB47');
        $this->addSql('DROP INDEX idx_2c64e8d9217bbb47 ON training');
        $this->addSql('CREATE INDEX IDX_D5128A8F217BBB47 ON training (person_id)');
        $this->addSql('DROP INDEX idx_2c64e8d9e934951a ON training');
        $this->addSql('CREATE INDEX IDX_D5128A8FE934951A ON training (exercise_id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_2C64E8D9E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_2C64E8D9217BBB47 FOREIGN KEY (person_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fitness DROP FOREIGN KEY FK_E583D7471179CD6');
        $this->addSql('ALTER TABLE gainage DROP FOREIGN KEY FK_17F2D46859442CB');
        $this->addSql('ALTER TABLE musculation DROP FOREIGN KEY FK_F9EDEE4471179CD6');
        $this->addSql('CREATE TABLE titres_fit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE titres_gainage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE titres_muscu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE titresfit');
        $this->addSql('DROP TABLE titresgainage');
        $this->addSql('DROP TABLE titresmuscu');
        $this->addSql('ALTER TABLE fitness DROP FOREIGN KEY FK_E583D7471179CD6');
        $this->addSql('ALTER TABLE fitness CHANGE pente pente VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fitness ADD CONSTRAINT FK_E583D7471179CD6 FOREIGN KEY (name_id) REFERENCES titres_fit (id)');
        $this->addSql('ALTER TABLE gainage DROP FOREIGN KEY FK_17F2D46859442CB');
        $this->addSql('ALTER TABLE gainage CHANGE poids poids DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE gainage ADD CONSTRAINT FK_17F2D46859442CB FOREIGN KEY (id_titre_id) REFERENCES titres_gainage (id)');
        $this->addSql('ALTER TABLE musculation DROP FOREIGN KEY FK_F9EDEE4471179CD6');
        $this->addSql('ALTER TABLE musculation CHANGE poids poids DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE musculation ADD CONSTRAINT FK_F9EDEE4471179CD6 FOREIGN KEY (name_id) REFERENCES titres_muscu (id)');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F217BBB47');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FE934951A');
        $this->addSql('DROP INDEX idx_d5128a8f217bbb47 ON training');
        $this->addSql('CREATE INDEX IDX_2C64E8D9217BBB47 ON training (person_id)');
        $this->addSql('DROP INDEX idx_d5128a8fe934951a ON training');
        $this->addSql('CREATE INDEX IDX_2C64E8D9E934951A ON training (exercise_id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F217BBB47 FOREIGN KEY (person_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
    }
}
