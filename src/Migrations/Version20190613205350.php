<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613205350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE web_textos (id INT AUTO_INCREMENT NOT NULL, titulo_header VARCHAR(255) DEFAULT NULL, sub_titulo_header VARCHAR(255) DEFAULT NULL, link_formulario_inscripcion_comercios VARCHAR(255) DEFAULT NULL, mostrar_tips TINYINT(1) DEFAULT NULL, texto_para_comercios LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_galeria_imagen (id INT AUTO_INCREMENT NOT NULL, galeria_id INT NOT NULL, titulo VARCHAR(255) NOT NULL, INDEX IDX_63337058D31019C (galeria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_galeria (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE web_galeria_imagen ADD CONSTRAINT FK_63337058D31019C FOREIGN KEY (galeria_id) REFERENCES web_galeria (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE web_galeria_imagen DROP FOREIGN KEY FK_63337058D31019C');
        $this->addSql('DROP TABLE web_textos');
        $this->addSql('DROP TABLE web_galeria_imagen');
        $this->addSql('DROP TABLE web_galeria');
    }
}
