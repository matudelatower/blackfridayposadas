<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190625215613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE novedad (id INT AUTO_INCREMENT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, cuerpo LONGTEXT DEFAULT NULL, nombre_imagen_destacada VARCHAR(255) DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_BCCADB4CFE35D8C4 (creado_por_id), INDEX IDX_BCCADB4CF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE novedad ADD CONSTRAINT FK_BCCADB4CFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE novedad ADD CONSTRAINT FK_BCCADB4CF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE novedad');
    }
}
