<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128030743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (comment_id INT AUTO_INCREMENT NOT NULL, comment_text VARCHAR(255) NOT NULL, UserID INT DEFAULT NULL, EventID INT DEFAULT NULL, INDEX IDX_5F9E962A58746832 (UserID), INDEX IDX_5F9E962ADFFDA238 (EventID), PRIMARY KEY(comment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (event_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date VARCHAR(255) NOT NULL, end_date VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, organizerID INT DEFAULT NULL, UNIQUE INDEX UNIQ_5387574A32C39171 (organizerID), PRIMARY KEY(event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE likes (reaction_id INT AUTO_INCREMENT NOT NULL, is_like TINYINT(1) NOT NULL, timestamp VARCHAR(255) NOT NULL, UserID INT DEFAULT NULL, EventID INT DEFAULT NULL, INDEX IDX_49CA4E7D58746832 (UserID), INDEX IDX_49CA4E7DDFFDA238 (EventID), PRIMARY KEY(reaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_event_interactions (interaction_id INT AUTO_INCREMENT NOT NULL, interaction_type VARCHAR(255) NOT NULL, timestamp VARCHAR(255) NOT NULL, userID INT DEFAULT NULL, eventID INT DEFAULT NULL, INDEX IDX_12DC98B55FD86D04 (userID), INDEX IDX_12DC98B510409BA4 (eventID), PRIMARY KEY(interaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (user_id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A58746832 FOREIGN KEY (UserID) REFERENCES users (user_id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962ADFFDA238 FOREIGN KEY (EventID) REFERENCES events (event_id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A32C39171 FOREIGN KEY (organizerID) REFERENCES users (user_id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D58746832 FOREIGN KEY (UserID) REFERENCES users (user_id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DDFFDA238 FOREIGN KEY (EventID) REFERENCES events (event_id)');
        $this->addSql('ALTER TABLE user_event_interactions ADD CONSTRAINT FK_12DC98B55FD86D04 FOREIGN KEY (userID) REFERENCES users (user_id)');
        $this->addSql('ALTER TABLE user_event_interactions ADD CONSTRAINT FK_12DC98B510409BA4 FOREIGN KEY (eventID) REFERENCES events (event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A58746832');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962ADFFDA238');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A32C39171');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D58746832');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DDFFDA238');
        $this->addSql('ALTER TABLE user_event_interactions DROP FOREIGN KEY FK_12DC98B55FD86D04');
        $this->addSql('ALTER TABLE user_event_interactions DROP FOREIGN KEY FK_12DC98B510409BA4');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE likes');
        $this->addSql('DROP TABLE user_event_interactions');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
