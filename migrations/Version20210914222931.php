<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914222931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0913E8E72F8 FOREIGN KEY (agencies_id) REFERENCES agencies (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091A8117BFE FOREIGN KEY (type_material_id) REFERENCES type_materiel (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091FAC7D83F FOREIGN KEY (designation_id) REFERENCES designation (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091ED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('CREATE INDEX IDX_18D2B091670C757F ON materiel (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_18D2B0913E8E72F8 ON materiel (agencies_id)');
        $this->addSql('CREATE INDEX IDX_18D2B091A8117BFE ON materiel (type_material_id)');
        $this->addSql('CREATE INDEX IDX_18D2B091FAC7D83F ON materiel (designation_id)');
        $this->addSql('CREATE INDEX IDX_18D2B091ED5CA9E6 ON materiel (service_id)');
        $this->addSql('ALTER TABLE type_materiel ADD designation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_materiel ADD CONSTRAINT FK_D52D976DFAC7D83F FOREIGN KEY (designation_id) REFERENCES designation (id)');
        $this->addSql('CREATE INDEX IDX_D52D976DFAC7D83F ON type_materiel (designation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091670C757F');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0913E8E72F8');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091A8117BFE');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091FAC7D83F');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091ED5CA9E6');
        $this->addSql('DROP INDEX IDX_18D2B091670C757F ON materiel');
        $this->addSql('DROP INDEX IDX_18D2B0913E8E72F8 ON materiel');
        $this->addSql('DROP INDEX IDX_18D2B091A8117BFE ON materiel');
        $this->addSql('DROP INDEX IDX_18D2B091FAC7D83F ON materiel');
        $this->addSql('DROP INDEX IDX_18D2B091ED5CA9E6 ON materiel');
        $this->addSql('ALTER TABLE type_materiel DROP FOREIGN KEY FK_D52D976DFAC7D83F');
        $this->addSql('DROP INDEX IDX_D52D976DFAC7D83F ON type_materiel');
        $this->addSql('ALTER TABLE type_materiel DROP designation_id');
    }
}
