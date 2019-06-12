<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612122312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubro (id INT AUTO_INCREMENT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_92866CEFFE35D8C4 (creado_por_id), INDEX IDX_92866CEFF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comercio (id INT AUTO_INCREMENT NOT NULL, rubro_id INT DEFAULT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, direccion VARCHAR(255) DEFAULT NULL, latitud VARCHAR(255) DEFAULT NULL, longitud VARCHAR(255) DEFAULT NULL, observacion LONGTEXT DEFAULT NULL, activo TINYINT(1) DEFAULT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, INDEX IDX_419511CD96C5081 (rubro_id), INDEX IDX_419511CDFE35D8C4 (creado_por_id), INDEX IDX_419511CDF6167A1C (actualizado_por_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rubro ADD CONSTRAINT FK_92866CEFFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE rubro ADD CONSTRAINT FK_92866CEFF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE comercio ADD CONSTRAINT FK_419511CD96C5081 FOREIGN KEY (rubro_id) REFERENCES rubro (id)');
        $this->addSql('ALTER TABLE comercio ADD CONSTRAINT FK_419511CDFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE comercio ADD CONSTRAINT FK_419511CDF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rubro DROP FOREIGN KEY FK_92866CEFFE35D8C4');
        $this->addSql('ALTER TABLE rubro DROP FOREIGN KEY FK_92866CEFF6167A1C');
        $this->addSql('ALTER TABLE comercio DROP FOREIGN KEY FK_419511CDFE35D8C4');
        $this->addSql('ALTER TABLE comercio DROP FOREIGN KEY FK_419511CDF6167A1C');
        $this->addSql('ALTER TABLE comercio DROP FOREIGN KEY FK_419511CD96C5081');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE rubro');
        $this->addSql('DROP TABLE comercio');
    }
}
