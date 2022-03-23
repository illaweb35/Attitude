<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323102924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, content CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO article (id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption) SELECT id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('DROP INDEX IDX_184BFD6F7D2D84D5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__dance AS SELECT id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM dance');
        $this->addSql('DROP TABLE dance');
        $this->addSql('CREATE TABLE dance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, professor_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, content CLOB NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_184BFD6F7D2D84D5 FOREIGN KEY (professor_id) REFERENCES professor (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO dance (id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption) SELECT id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM __temp__dance');
        $this->addSql('DROP TABLE __temp__dance');
        $this->addSql('CREATE INDEX IDX_184BFD6F7D2D84D5 ON dance (professor_id)');
        $this->addSql('DROP INDEX IDX_F87474F365D64EDD');
        $this->addSql('CREATE TEMPORARY TABLE __temp__lesson AS SELECT id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat FROM lesson');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('CREATE TABLE lesson (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, dance_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, day_lesson VARCHAR(255) NOT NULL, start_hour TIME NOT NULL, end_hour TIME NOT NULL, amount DOUBLE PRECISION NOT NULL, address VARCHAR(255) DEFAULT NULL, post_code VARCHAR(60) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, lon DOUBLE PRECISION DEFAULT NULL, lat DOUBLE PRECISION NOT NULL, CONSTRAINT FK_F87474F365D64EDD FOREIGN KEY (dance_id) REFERENCES dance (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO lesson (id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat) SELECT id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat FROM __temp__lesson');
        $this->addSql('DROP TABLE __temp__lesson');
        $this->addSql('CREATE INDEX IDX_F87474F365D64EDD ON lesson (dance_id)');
        $this->addSql('DROP INDEX IDX_70E4FA78CDF80196');
        $this->addSql('CREATE TEMPORARY TABLE __temp__member AS SELECT id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug FROM member');
        $this->addSql('DROP TABLE member');
        $this->addSql('CREATE TABLE member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lesson_id INTEGER NOT NULL, user_first_name VARCHAR(255) NOT NULL, user_last_name VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, image VARCHAR(255) DEFAULT NULL, civility VARCHAR(60) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(60) DEFAULT NULL, mobile_number VARCHAR(60) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, post_code VARCHAR(60) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, infos CLOB DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, older INTEGER DEFAULT NULL, slug VARCHAR(255) NOT NULL, CONSTRAINT FK_70E4FA78CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO member (id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug) SELECT id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug FROM __temp__member');
        $this->addSql('DROP TABLE __temp__member');
        $this->addSql('CREATE INDEX IDX_70E4FA78CDF80196 ON member (lesson_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, content CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO article (id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption) SELECT id, category_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('DROP INDEX IDX_184BFD6F7D2D84D5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__dance AS SELECT id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM dance');
        $this->addSql('DROP TABLE dance');
        $this->addSql('CREATE TABLE dance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, professor_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, content CLOB NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO dance (id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption) SELECT id, professor_id, title, slug, sub_title, content, image, created_at, updated_at, image_caption FROM __temp__dance');
        $this->addSql('DROP TABLE __temp__dance');
        $this->addSql('CREATE INDEX IDX_184BFD6F7D2D84D5 ON dance (professor_id)');
        $this->addSql('DROP INDEX IDX_F87474F365D64EDD');
        $this->addSql('CREATE TEMPORARY TABLE __temp__lesson AS SELECT id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat FROM lesson');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('CREATE TABLE lesson (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, dance_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, day_lesson VARCHAR(255) NOT NULL, start_hour TIME NOT NULL, end_hour TIME NOT NULL, amount DOUBLE PRECISION NOT NULL, address VARCHAR(255) DEFAULT NULL, post_code VARCHAR(60) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, lon DOUBLE PRECISION DEFAULT NULL, lat DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO lesson (id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat) SELECT id, dance_id, title, slug, sub_title, day_lesson, start_hour, end_hour, amount, address, post_code, city, created_at, updated_at, image_caption, lon, lat FROM __temp__lesson');
        $this->addSql('DROP TABLE __temp__lesson');
        $this->addSql('CREATE INDEX IDX_F87474F365D64EDD ON lesson (dance_id)');
        $this->addSql('DROP INDEX IDX_70E4FA78CDF80196');
        $this->addSql('CREATE TEMPORARY TABLE __temp__member AS SELECT id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug FROM member');
        $this->addSql('DROP TABLE member');
        $this->addSql('CREATE TABLE member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, lesson_id INTEGER NOT NULL, user_first_name VARCHAR(255) NOT NULL, user_last_name VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, image VARCHAR(255) DEFAULT NULL, civility VARCHAR(60) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(60) DEFAULT NULL, mobile_number VARCHAR(60) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, post_code VARCHAR(60) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, infos CLOB DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image_caption VARCHAR(255) DEFAULT NULL, older INTEGER DEFAULT NULL, slug VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO member (id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug) SELECT id, lesson_id, user_first_name, user_last_name, birthday, image, civility, first_name, last_name, email, phone_number, mobile_number, address, post_code, city, infos, created_at, updated_at, image_caption, older, slug FROM __temp__member');
        $this->addSql('DROP TABLE __temp__member');
        $this->addSql('CREATE INDEX IDX_70E4FA78CDF80196 ON member (lesson_id)');
    }
}
