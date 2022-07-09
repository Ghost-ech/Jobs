<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709152846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60A76ED395');
        $this->addSql('DROP INDEX UNIQ_D19FA60A76ED395 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP user_id');
        $this->addSql('ALTER TABLE refugier DROP FOREIGN KEY FK_FA3019D9A76ED395');
        $this->addSql('DROP INDEX UNIQ_FA3019D9A76ED395 ON refugier');
        $this->addSql('ALTER TABLE refugier DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649642B8210');
        $this->addSql('DROP INDEX UNIQ_8D93D649642B8210 ON user');
        $this->addSql('ALTER TABLE user DROP admin_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60A76ED395 ON entreprise (user_id)');
        $this->addSql('ALTER TABLE refugier ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE refugier ADD CONSTRAINT FK_FA3019D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA3019D9A76ED395 ON refugier (user_id)');
        $this->addSql('ALTER TABLE user ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649642B8210 ON user (admin_id)');
    }
}
