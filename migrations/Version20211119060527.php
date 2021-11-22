<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119060527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre_hotel DROP FOREIGN KEY cbo');
        $this->addSql('ALTER TABLE offre_hotel DROP FOREIGN KEY cfo');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE offre_hotel');
        $this->addSql('DROP TABLE offreh');
        $this->addSql('DROP TABLE paquet');
        $this->addSql('DROP TABLE prix_nuit');
        $this->addSql('DROP TABLE tourist');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE zone_de_loisir');
        $this->addSql('ALTER TABLE restauration CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE tel tel INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (idadmin INT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cin_passport VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idadmin)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hotel (id_hotel INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, tel VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, page_web VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix_nuite DOUBLE PRECISION NOT NULL, nombre_etoile INT NOT NULL, etat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'active\'\'\' NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_hotel)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE offre_hotel (id INT AUTO_INCREMENT NOT NULL, id_H INT NOT NULL, id_O INT NOT NULL, etat_offre_hotel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'active\'\'\' NOT NULL COLLATE `utf8mb4_general_ci`, INDEX cbo (id_H), INDEX cfo (id_O), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE offreh (id_offreH INT AUTO_INCREMENT NOT NULL, nom_offre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix_offre DOUBLE PRECISION NOT NULL, etat_offre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'active\'\'\' NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_offreH)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE paquet (id INT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix INT NOT NULL, date_déb DATE NOT NULL, date_fin DATE NOT NULL, id_resto INT NOT NULL, id_café INT NOT NULL, id_restocafé INT NOT NULL, id_zarch INT NOT NULL, id_ztour INT NOT NULL, id_hotel INT NOT NULL, id_transport INT NOT NULL, INDEX nom (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prix_nuit (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix DOUBLE PRECISION NOT NULL, id_hotel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tourist (idtourist INT NOT NULL, nom INT NOT NULL, cin_passport INT NOT NULL, PRIMARY KEY(idtourist)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transport (id INT NOT NULL, type VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, pwd VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cin_passport VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, role VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE zone_de_loisir (id INT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, tel INT NOT NULL, prix INT NOT NULL, type VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offre_hotel ADD CONSTRAINT cbo FOREIGN KEY (id_H) REFERENCES hotel (id_hotel) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_hotel ADD CONSTRAINT cfo FOREIGN KEY (id_O) REFERENCES offreh (id_offreH) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restauration CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, CHANGE tel tel INT DEFAULT NULL');
    }
}
