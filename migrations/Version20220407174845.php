<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407174845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fitness CHANGE pente pente VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE gainage CHANGE poids poids DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE musculation CHANGE poids poids DOUBLE PRECISION DEFAULT NULL');
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
        $this->addSql('ALTER TABLE fitness CHANGE pente pente VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE gainage CHANGE poids poids DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE musculation CHANGE poids poids DOUBLE PRECISION DEFAULT \'NULL\'');
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
