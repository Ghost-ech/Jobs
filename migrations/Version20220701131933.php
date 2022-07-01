<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701131933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD admin_id INT NOT NULL, ADD refugier_id INT NOT NULL, ADD entreprise_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64959C052C1 FOREIGN KEY (refugier_id) REFERENCES refugier (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649642B8210 ON user (admin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64959C052C1 ON user (refugier_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A4AEAFEA ON user (entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649642B8210');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64959C052C1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A4AEAFEA');
        $this->addSql('DROP INDEX UNIQ_8D93D649642B8210 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64959C052C1 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649A4AEAFEA ON user');
        $this->addSql('ALTER TABLE user DROP admin_id, DROP refugier_id, DROP entreprise_id');
    }
}
