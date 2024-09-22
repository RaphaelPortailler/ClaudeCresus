<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240922131907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avancement (id INT AUTO_INCREMENT NOT NULL, type_demande_id INT NOT NULL, libelle_avancement VARCHAR(255) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, INDEX IDX_6D2A7A2A9DEA883D (type_demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beneficiaire (id INT AUTO_INCREMENT NOT NULL, libelle_prof_id INT DEFAULT NULL, civilite_beneficiaire VARCHAR(20) NOT NULL, nom_beneficiaire VARCHAR(255) NOT NULL, prenom_beneficiaire VARCHAR(255) NOT NULL, ddn_beneficiaire DATETIME DEFAULT NULL, mail_beneficiaire VARCHAR(255) DEFAULT NULL, telephone_beneficiaire VARCHAR(255) DEFAULT NULL, profession_beneficiaire VARCHAR(255) DEFAULT NULL, INDEX IDX_B140D80211870684 (libelle_prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beneficiaire_demande (beneficiaire_id INT NOT NULL, demande_id INT NOT NULL, INDEX IDX_AA2A574F5AF81F68 (beneficiaire_id), INDEX IDX_AA2A574F80E95E18 (demande_id), PRIMARY KEY(beneficiaire_id, demande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, type_charge_id INT NOT NULL, beneficiaire_id INT NOT NULL, demande_id INT DEFAULT NULL, montant_mensuel INT NOT NULL, commentaires VARCHAR(255) DEFAULT NULL, is_bdf TINYINT(1) DEFAULT NULL, INDEX IDX_556BA434E1EE0804 (type_charge_id), INDEX IDX_556BA4345AF81F68 (beneficiaire_id), INDEX IDX_556BA43480E95E18 (demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connexion (id INT AUTO_INCREMENT NOT NULL, id_pc_id INT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_936BF99C61E6122D (id_pc_id), INDEX IDX_936BF99CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, type_demande_id INT NOT NULL, position_demande_id INT NOT NULL, origine_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', adresse1_demande VARCHAR(255) DEFAULT NULL, adresse2_demande VARCHAR(255) DEFAULT NULL, cp_demande INT DEFAULT NULL, ville_demande VARCHAR(255) DEFAULT NULL, situation_logt VARCHAR(250) DEFAULT NULL, nb_enfant INT DEFAULT NULL, patrimoine VARCHAR(255) DEFAULT NULL, complement_origine VARCHAR(255) DEFAULT NULL, cause_besoin VARCHAR(255) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, garde_alternee INT DEFAULT NULL, droit_visite INT DEFAULT NULL, INDEX IDX_2694D7A59DEA883D (type_demande_id), INDEX IDX_2694D7A5AE087298 (position_demande_id), INDEX IDX_2694D7A587998E (origine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dette (id INT AUTO_INCREMENT NOT NULL, titulaire_principal_id INT NOT NULL, type_dette_id INT NOT NULL, demande_id INT DEFAULT NULL, organisme VARCHAR(255) NOT NULL, montant_initial INT DEFAULT NULL, mensualite INT DEFAULT NULL, montant_du INT NOT NULL, commentaires VARCHAR(255) DEFAULT NULL, INDEX IDX_831BC8085E4CD77B (titulaire_principal_id), INDEX IDX_831BC8082CEB275D (type_dette_id), INDEX IDX_831BC80880E95E18 (demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulaire (id INT AUTO_INCREMENT NOT NULL, nom_demandeur VARCHAR(255) NOT NULL, prenom_demandeur VARCHAR(255) NOT NULL, mail_demandeur VARCHAR(255) NOT NULL, telephone_demandeur VARCHAR(255) NOT NULL, permanence_demandeur VARCHAR(255) NOT NULL, besoin_demandeur VARCHAR(255) NOT NULL, description_besoin LONGTEXT DEFAULT NULL, is_traite TINYINT(1) NOT NULL, is_gdpr TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_avct (id INT AUTO_INCREMENT NOT NULL, demande_id INT NOT NULL, avancement_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', commentaires_avct LONGTEXT DEFAULT NULL, INDEX IDX_6F43F13B80E95E18 (demande_id), INDEX IDX_6F43F13B5DF05EC1 (avancement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ip_pc (id INT AUTO_INCREMENT NOT NULL, identifiant_pc VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origine (id INT AUTO_INCREMENT NOT NULL, libelle_origine VARCHAR(255) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permanence (id INT AUTO_INCREMENT NOT NULL, site_id INT NOT NULL, jour VARCHAR(255) NOT NULL, INDEX IDX_DF30CBB6F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_demande (id INT AUTO_INCREMENT NOT NULL, libelle_position VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, demande_id INT NOT NULL, site_id INT NOT NULL, date_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', heure_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_annule TINYINT(1) DEFAULT NULL, INDEX IDX_65E8AA0AA76ED395 (user_id), INDEX IDX_65E8AA0A80E95E18 (demande_id), INDEX IDX_65E8AA0AF6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revenu (id INT AUTO_INCREMENT NOT NULL, type_revenu_id INT NOT NULL, beneficiaire_id INT NOT NULL, demande_id INT DEFAULT NULL, montant_mensuel INT NOT NULL, commentaires VARCHAR(255) DEFAULT NULL, INDEX IDX_7DA3C04520F3EE6A (type_revenu_id), INDEX IDX_7DA3C0455AF81F68 (beneficiaire_id), INDEX IDX_7DA3C04580E95E18 (demande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, nom_site VARCHAR(255) NOT NULL, intitule_site VARCHAR(255) NOT NULL, adresse1_site VARCHAR(255) DEFAULT NULL, adresse2_site VARCHAR(255) DEFAULT NULL, cp_site INT NOT NULL, ville_site VARCHAR(255) NOT NULL, carte_site LONGTEXT NOT NULL, is_actif TINYINT(1) NOT NULL, tel_site VARCHAR(255) NOT NULL, couleur_site VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, libelle_charge VARCHAR(255) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, is_bdf TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_demande (id INT AUTO_INCREMENT NOT NULL, libelle_demande VARCHAR(100) NOT NULL, is_interne TINYINT(1) NOT NULL, libelle_externe VARCHAR(255) NOT NULL, img_petit VARCHAR(255) DEFAULT NULL, img_grand VARCHAR(255) NOT NULL, chemin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_dette (id INT AUTO_INCREMENT NOT NULL, libelle_dette VARCHAR(255) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prof (id INT AUTO_INCREMENT NOT NULL, libelle_prof VARCHAR(255) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_revenu (id INT AUTO_INCREMENT NOT NULL, libelle_revenu VARCHAR(200) NOT NULL, is_actif TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_user VARCHAR(255) NOT NULL, prenom_user VARCHAR(255) NOT NULL, tel_perso INT DEFAULT NULL, tel_assoc INT DEFAULT NULL, mail_perso VARCHAR(255) DEFAULT NULL, is_actif TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_demande (user_id INT NOT NULL, demande_id INT NOT NULL, INDEX IDX_7E99C9AFA76ED395 (user_id), INDEX IDX_7E99C9AF80E95E18 (demande_id), PRIMARY KEY(user_id, demande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_permanence (user_id INT NOT NULL, permanence_id INT NOT NULL, INDEX IDX_78570D5AA76ED395 (user_id), INDEX IDX_78570D5AA9457964 (permanence_id), PRIMARY KEY(user_id, permanence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avancement ADD CONSTRAINT FK_6D2A7A2A9DEA883D FOREIGN KEY (type_demande_id) REFERENCES type_demande (id)');
        $this->addSql('ALTER TABLE beneficiaire ADD CONSTRAINT FK_B140D80211870684 FOREIGN KEY (libelle_prof_id) REFERENCES type_prof (id)');
        $this->addSql('ALTER TABLE beneficiaire_demande ADD CONSTRAINT FK_AA2A574F5AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES beneficiaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beneficiaire_demande ADD CONSTRAINT FK_AA2A574F80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charge ADD CONSTRAINT FK_556BA434E1EE0804 FOREIGN KEY (type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE charge ADD CONSTRAINT FK_556BA4345AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES beneficiaire (id)');
        $this->addSql('ALTER TABLE charge ADD CONSTRAINT FK_556BA43480E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE connexion ADD CONSTRAINT FK_936BF99C61E6122D FOREIGN KEY (id_pc_id) REFERENCES ip_pc (id)');
        $this->addSql('ALTER TABLE connexion ADD CONSTRAINT FK_936BF99CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A59DEA883D FOREIGN KEY (type_demande_id) REFERENCES type_demande (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5AE087298 FOREIGN KEY (position_demande_id) REFERENCES position_demande (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A587998E FOREIGN KEY (origine_id) REFERENCES origine (id)');
        $this->addSql('ALTER TABLE dette ADD CONSTRAINT FK_831BC8085E4CD77B FOREIGN KEY (titulaire_principal_id) REFERENCES beneficiaire (id)');
        $this->addSql('ALTER TABLE dette ADD CONSTRAINT FK_831BC8082CEB275D FOREIGN KEY (type_dette_id) REFERENCES type_dette (id)');
        $this->addSql('ALTER TABLE dette ADD CONSTRAINT FK_831BC80880E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE historique_avct ADD CONSTRAINT FK_6F43F13B80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE historique_avct ADD CONSTRAINT FK_6F43F13B5DF05EC1 FOREIGN KEY (avancement_id) REFERENCES avancement (id)');
        $this->addSql('ALTER TABLE permanence ADD CONSTRAINT FK_DF30CBB6F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE revenu ADD CONSTRAINT FK_7DA3C04520F3EE6A FOREIGN KEY (type_revenu_id) REFERENCES type_revenu (id)');
        $this->addSql('ALTER TABLE revenu ADD CONSTRAINT FK_7DA3C0455AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES beneficiaire (id)');
        $this->addSql('ALTER TABLE revenu ADD CONSTRAINT FK_7DA3C04580E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE user_demande ADD CONSTRAINT FK_7E99C9AFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_demande ADD CONSTRAINT FK_7E99C9AF80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_permanence ADD CONSTRAINT FK_78570D5AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_permanence ADD CONSTRAINT FK_78570D5AA9457964 FOREIGN KEY (permanence_id) REFERENCES permanence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avancement DROP FOREIGN KEY FK_6D2A7A2A9DEA883D');
        $this->addSql('ALTER TABLE beneficiaire DROP FOREIGN KEY FK_B140D80211870684');
        $this->addSql('ALTER TABLE beneficiaire_demande DROP FOREIGN KEY FK_AA2A574F5AF81F68');
        $this->addSql('ALTER TABLE beneficiaire_demande DROP FOREIGN KEY FK_AA2A574F80E95E18');
        $this->addSql('ALTER TABLE charge DROP FOREIGN KEY FK_556BA434E1EE0804');
        $this->addSql('ALTER TABLE charge DROP FOREIGN KEY FK_556BA4345AF81F68');
        $this->addSql('ALTER TABLE charge DROP FOREIGN KEY FK_556BA43480E95E18');
        $this->addSql('ALTER TABLE connexion DROP FOREIGN KEY FK_936BF99C61E6122D');
        $this->addSql('ALTER TABLE connexion DROP FOREIGN KEY FK_936BF99CA76ED395');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A59DEA883D');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5AE087298');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A587998E');
        $this->addSql('ALTER TABLE dette DROP FOREIGN KEY FK_831BC8085E4CD77B');
        $this->addSql('ALTER TABLE dette DROP FOREIGN KEY FK_831BC8082CEB275D');
        $this->addSql('ALTER TABLE dette DROP FOREIGN KEY FK_831BC80880E95E18');
        $this->addSql('ALTER TABLE historique_avct DROP FOREIGN KEY FK_6F43F13B80E95E18');
        $this->addSql('ALTER TABLE historique_avct DROP FOREIGN KEY FK_6F43F13B5DF05EC1');
        $this->addSql('ALTER TABLE permanence DROP FOREIGN KEY FK_DF30CBB6F6BD1646');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AA76ED395');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A80E95E18');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AF6BD1646');
        $this->addSql('ALTER TABLE revenu DROP FOREIGN KEY FK_7DA3C04520F3EE6A');
        $this->addSql('ALTER TABLE revenu DROP FOREIGN KEY FK_7DA3C0455AF81F68');
        $this->addSql('ALTER TABLE revenu DROP FOREIGN KEY FK_7DA3C04580E95E18');
        $this->addSql('ALTER TABLE user_demande DROP FOREIGN KEY FK_7E99C9AFA76ED395');
        $this->addSql('ALTER TABLE user_demande DROP FOREIGN KEY FK_7E99C9AF80E95E18');
        $this->addSql('ALTER TABLE user_permanence DROP FOREIGN KEY FK_78570D5AA76ED395');
        $this->addSql('ALTER TABLE user_permanence DROP FOREIGN KEY FK_78570D5AA9457964');
        $this->addSql('DROP TABLE avancement');
        $this->addSql('DROP TABLE beneficiaire');
        $this->addSql('DROP TABLE beneficiaire_demande');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE dette');
        $this->addSql('DROP TABLE formulaire');
        $this->addSql('DROP TABLE historique_avct');
        $this->addSql('DROP TABLE ip_pc');
        $this->addSql('DROP TABLE origine');
        $this->addSql('DROP TABLE permanence');
        $this->addSql('DROP TABLE position_demande');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE revenu');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE type_charge');
        $this->addSql('DROP TABLE type_demande');
        $this->addSql('DROP TABLE type_dette');
        $this->addSql('DROP TABLE type_prof');
        $this->addSql('DROP TABLE type_revenu');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_demande');
        $this->addSql('DROP TABLE user_permanence');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
