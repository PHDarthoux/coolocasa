<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810095600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, roommate_offer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6A2CA10CFB4F6D9A (roommate_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, content LONGTEXT NOT NULL, send_time DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FCD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, media_id INT DEFAULT NULL, roommate_offer_id INT DEFAULT NULL, rental_search_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_29D6873EA76ED395 (user_id), UNIQUE INDEX UNIQ_29D6873EEA9FDD75 (media_id), UNIQUE INDEX UNIQ_29D6873EFB4F6D9A (roommate_offer_id), UNIQUE INDEX UNIQ_29D6873EDAE767A6 (rental_search_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental_search (id INT AUTO_INCREMENT NOT NULL, desired_city VARCHAR(255) NOT NULL, max_budget INT DEFAULT NULL, smoker TINYINT(1) DEFAULT NULL, has_animal TINYINT(1) DEFAULT NULL, desired_move_in_date DATE DEFAULT NULL, center_of_interest VARCHAR(255) DEFAULT NULL, accept_smoker TINYINT(1) DEFAULT NULL, accept_animals TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental_search_lodging_type (rental_search_id INT NOT NULL, lodging_type_id INT NOT NULL, INDEX IDX_B4E15528DAE767A6 (rental_search_id), INDEX IDX_B4E15528904223E4 (lodging_type_id), PRIMARY KEY(rental_search_id, lodging_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, author_user_id INT NOT NULL, target_user_id INT NOT NULL, rate INT NOT NULL, comment VARCHAR(255) DEFAULT NULL, INDEX IDX_794381C6E2544CD6 (author_user_id), INDEX IDX_794381C66C066AFE (target_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roommate_offer (id INT AUTO_INCREMENT NOT NULL, lodging_type_id INT NOT NULL, area INT NOT NULL, price INT NOT NULL, disponibility DATE NOT NULL, furnished TINYINT(1) NOT NULL, smoker_accepted TINYINT(1) NOT NULL, animal_accepted TINYINT(1) NOT NULL, handicap_access TINYINT(1) NOT NULL, address_line1 VARCHAR(255) DEFAULT NULL, address_line2 VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, availability_date DATE NOT NULL, INDEX IDX_BE06050C904223E4 (lodging_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CFB4F6D9A FOREIGN KEY (roommate_offer_id) REFERENCES roommate_offer (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EFB4F6D9A FOREIGN KEY (roommate_offer_id) REFERENCES roommate_offer (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EDAE767A6 FOREIGN KEY (rental_search_id) REFERENCES rental_search (id)');
        $this->addSql('ALTER TABLE rental_search_lodging_type ADD CONSTRAINT FK_B4E15528DAE767A6 FOREIGN KEY (rental_search_id) REFERENCES rental_search (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rental_search_lodging_type ADD CONSTRAINT FK_B4E15528904223E4 FOREIGN KEY (lodging_type_id) REFERENCES lodging_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6E2544CD6 FOREIGN KEY (author_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C66C066AFE FOREIGN KEY (target_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE roommate_offer ADD CONSTRAINT FK_BE06050C904223E4 FOREIGN KEY (lodging_type_id) REFERENCES lodging_type (id)');
        $this->addSql('ALTER TABLE user ADD media_id INT DEFAULT NULL, ADD gender_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD birthday DATE NOT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD last_connection DATETIME NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649EA9FDD75 ON user (media_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649708A0E0 ON user (gender_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649708A0E0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA9FDD75');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CFB4F6D9A');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCD53EDB6');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA76ED395');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EEA9FDD75');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EFB4F6D9A');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EDAE767A6');
        $this->addSql('ALTER TABLE rental_search_lodging_type DROP FOREIGN KEY FK_B4E15528DAE767A6');
        $this->addSql('ALTER TABLE rental_search_lodging_type DROP FOREIGN KEY FK_B4E15528904223E4');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6E2544CD6');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C66C066AFE');
        $this->addSql('ALTER TABLE roommate_offer DROP FOREIGN KEY FK_BE06050C904223E4');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE lodging_type');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE rental_search');
        $this->addSql('DROP TABLE rental_search_lodging_type');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE roommate_offer');
        $this->addSql('DROP INDEX UNIQ_8D93D649EA9FDD75 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649708A0E0 ON user');
        $this->addSql('ALTER TABLE user DROP media_id, DROP gender_id, DROP name, DROP firstname, DROP birthday, DROP phone, DROP last_connection, DROP created_at');
    }
}
