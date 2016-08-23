<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160823174412 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingredient DROP starch, DROP sugars, DROP fibers, DROP cholesterol, DROP fatty_acids_mono, DROP fatty_acids_sat, DROP fatty_acids_poly');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingredient ADD starch NUMERIC(5, 2) NOT NULL, ADD sugars NUMERIC(5, 2) NOT NULL, ADD fibers NUMERIC(5, 2) NOT NULL, ADD cholesterol NUMERIC(5, 2) NOT NULL, ADD fatty_acids_mono NUMERIC(5, 2) NOT NULL, ADD fatty_acids_sat NUMERIC(5, 2) NOT NULL, ADD fatty_acids_poly NUMERIC(5, 2) NOT NULL');
    }
}
