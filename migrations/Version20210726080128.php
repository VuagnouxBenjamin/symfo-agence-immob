<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726080128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE properties_option (properties_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_BB128EB73691D1CA (properties_id), INDEX IDX_BB128EB7A7C41D6F (option_id), PRIMARY KEY(properties_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE properties_option ADD CONSTRAINT FK_BB128EB73691D1CA FOREIGN KEY (properties_id) REFERENCES properties (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE properties_option ADD CONSTRAINT FK_BB128EB7A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE option_properties');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE option_properties (option_id INT NOT NULL, properties_id INT NOT NULL, INDEX IDX_6AAA29F73691D1CA (properties_id), INDEX IDX_6AAA29F7A7C41D6F (option_id), PRIMARY KEY(option_id, properties_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE option_properties ADD CONSTRAINT FK_6AAA29F73691D1CA FOREIGN KEY (properties_id) REFERENCES properties (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_properties ADD CONSTRAINT FK_6AAA29F7A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE properties_option');
    }
}
