<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190625205237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE web_texto ADD concejos LONGTEXT DEFAULT NULL, ADD acerca_de LONGTEXT DEFAULT NULL, ADD instagram VARCHAR(255) DEFAULT NULL, ADD facebook VARCHAR(255) DEFAULT NULL, ADD twitter VARCHAR(255) DEFAULT NULL, ADD youtube VARCHAR(255) DEFAULT NULL, ADD contacto_direccion VARCHAR(255) DEFAULT NULL, ADD contacto_telefono VARCHAR(255) DEFAULT NULL, ADD contacto_whatsapp VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE web_texto DROP concejos, DROP acerca_de, DROP instagram, DROP facebook, DROP twitter, DROP youtube, DROP contacto_direccion, DROP contacto_telefono, DROP contacto_whatsapp');
    }
}
