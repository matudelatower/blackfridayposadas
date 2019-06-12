<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612210027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tip_empresa ADD creado_por_id INT DEFAULT NULL, ADD actualizado_por_id INT DEFAULT NULL, ADD activo TINYINT(1) DEFAULT NULL, ADD fecha_creacion DATETIME NOT NULL, ADD fecha_actualizacion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tip_empresa ADD CONSTRAINT FK_519018B6FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE tip_empresa ADD CONSTRAINT FK_519018B6F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_519018B6FE35D8C4 ON tip_empresa (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_519018B6F6167A1C ON tip_empresa (actualizado_por_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tip_empresa DROP FOREIGN KEY FK_519018B6FE35D8C4');
        $this->addSql('ALTER TABLE tip_empresa DROP FOREIGN KEY FK_519018B6F6167A1C');
        $this->addSql('DROP INDEX IDX_519018B6FE35D8C4 ON tip_empresa');
        $this->addSql('DROP INDEX IDX_519018B6F6167A1C ON tip_empresa');
        $this->addSql('ALTER TABLE tip_empresa DROP creado_por_id, DROP actualizado_por_id, DROP activo, DROP fecha_creacion, DROP fecha_actualizacion');
    }
}
