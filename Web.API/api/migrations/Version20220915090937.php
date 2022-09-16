<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220915090937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE liste_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tache_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trello_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, sender_id INT DEFAULT NULL, tache_id INT NOT NULL, message VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526CF624B39D ON comment (sender_id)');
        $this->addSql('CREATE INDEX IDX_9474526CD2235D39 ON comment (tache_id)');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN comment.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE liste (id INT NOT NULL, trello_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FCF22AF4A50CDDC2 ON liste (trello_id)');
        $this->addSql('COMMENT ON COLUMN liste.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN liste.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tache (id INT NOT NULL, asigned_to_id INT DEFAULT NULL, liste_id INT NOT NULL, name VARCHAR(255) NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, labels VARCHAR(255) DEFAULT NULL, completed BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_93872075EFFB3AAC ON tache (asigned_to_id)');
        $this->addSql('CREATE INDEX IDX_93872075E85441D8 ON tache (liste_id)');
        $this->addSql('COMMENT ON COLUMN tache.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tache.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE trello (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN trello.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN trello.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE user_trello (user_id INT NOT NULL, trello_id INT NOT NULL, PRIMARY KEY(user_id, trello_id))');
        $this->addSql('CREATE INDEX IDX_9E412BF1A76ED395 ON user_trello (user_id)');
        $this->addSql('CREATE INDEX IDX_9E412BF1A50CDDC2 ON user_trello (trello_id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF624B39D FOREIGN KEY (sender_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE liste ADD CONSTRAINT FK_FCF22AF4A50CDDC2 FOREIGN KEY (trello_id) REFERENCES trello (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075EFFB3AAC FOREIGN KEY (asigned_to_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075E85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_trello ADD CONSTRAINT FK_9E412BF1A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_trello ADD CONSTRAINT FK_9E412BF1A50CDDC2 FOREIGN KEY (trello_id) REFERENCES trello (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tache DROP CONSTRAINT FK_93872075E85441D8');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CD2235D39');
        $this->addSql('ALTER TABLE liste DROP CONSTRAINT FK_FCF22AF4A50CDDC2');
        $this->addSql('ALTER TABLE user_trello DROP CONSTRAINT FK_9E412BF1A50CDDC2');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CF624B39D');
        $this->addSql('ALTER TABLE tache DROP CONSTRAINT FK_93872075EFFB3AAC');
        $this->addSql('ALTER TABLE user_trello DROP CONSTRAINT FK_9E412BF1A76ED395');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE liste_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tache_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trello_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE trello');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_trello');
    }
}
