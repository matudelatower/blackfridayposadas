<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613210035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE web_texto (id INT AUTO_INCREMENT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, titulo_header VARCHAR(255) DEFAULT NULL, sub_titulo_header VARCHAR(255) DEFAULT NULL, link_formulario_inscripcion_comercios VARCHAR(255) DEFAULT NULL, mostrar_tips TINYINT(1) DEFAULT NULL, texto_para_comercios LONGTEXT DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_C7274B6EFE35D8C4 (creado_por_id), INDEX IDX_C7274B6EF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE web_texto ADD CONSTRAINT FK_C7274B6EFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE web_texto ADD CONSTRAINT FK_C7274B6EF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('DROP TABLE web_textos');
        $this->addSql('ALTER TABLE web_galeria_imagen ADD creado_por_id INT DEFAULT NULL, ADD actualizado_por_id INT DEFAULT NULL, ADD nombre_imagen VARCHAR(255) DEFAULT NULL, ADD activo TINYINT(1) DEFAULT NULL, ADD fecha_creacion DATETIME NOT NULL, ADD fecha_actualizacion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE web_galeria_imagen ADD CONSTRAINT FK_63337058FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE web_galeria_imagen ADD CONSTRAINT FK_63337058F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_63337058FE35D8C4 ON web_galeria_imagen (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_63337058F6167A1C ON web_galeria_imagen (actualizado_por_id)');
        $this->addSql('ALTER TABLE web_galeria ADD creado_por_id INT DEFAULT NULL, ADD actualizado_por_id INT DEFAULT NULL, ADD activo TINYINT(1) DEFAULT NULL, ADD fecha_creacion DATETIME NOT NULL, ADD fecha_actualizacion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE web_galeria ADD CONSTRAINT FK_71BF7F17FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE web_galeria ADD CONSTRAINT FK_71BF7F17F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_71BF7F17FE35D8C4 ON web_galeria (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_71BF7F17F6167A1C ON web_galeria (actualizado_por_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE web_textos (id INT AUTO_INCREMENT NOT NULL, titulo_header VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, sub_titulo_header VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, link_formulario_inscripcion_comercios VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, mostrar_tips TINYINT(1) DEFAULT NULL, texto_para_comercios LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE web_texto');
        $this->addSql('ALTER TABLE web_galeria DROP FOREIGN KEY FK_71BF7F17FE35D8C4');
        $this->addSql('ALTER TABLE web_galeria DROP FOREIGN KEY FK_71BF7F17F6167A1C');
        $this->addSql('DROP INDEX IDX_71BF7F17FE35D8C4 ON web_galeria');
        $this->addSql('DROP INDEX IDX_71BF7F17F6167A1C ON web_galeria');
        $this->addSql('ALTER TABLE web_galeria DROP creado_por_id, DROP actualizado_por_id, DROP activo, DROP fecha_creacion, DROP fecha_actualizacion');
        $this->addSql('ALTER TABLE web_galeria_imagen DROP FOREIGN KEY FK_63337058FE35D8C4');
        $this->addSql('ALTER TABLE web_galeria_imagen DROP FOREIGN KEY FK_63337058F6167A1C');
        $this->addSql('DROP INDEX IDX_63337058FE35D8C4 ON web_galeria_imagen');
        $this->addSql('DROP INDEX IDX_63337058F6167A1C ON web_galeria_imagen');
        $this->addSql('ALTER TABLE web_galeria_imagen DROP creado_por_id, DROP actualizado_por_id, DROP nombre_imagen, DROP activo, DROP fecha_creacion, DROP fecha_actualizacion');
    }
}
