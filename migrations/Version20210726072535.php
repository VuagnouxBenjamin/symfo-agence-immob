<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726072535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_properties (option_id INT NOT NULL, properties_id INT NOT NULL, INDEX IDX_6AAA29F7A7C41D6F (option_id), INDEX IDX_6AAA29F73691D1CA (properties_id), PRIMARY KEY(option_id, properties_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE option_properties ADD CONSTRAINT FK_6AAA29F7A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_properties ADD CONSTRAINT FK_6AAA29F73691D1CA FOREIGN KEY (properties_id) REFERENCES properties (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE option_properties DROP FOREIGN KEY FK_6AAA29F7A7C41D6F');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE option_properties');
    }
}
