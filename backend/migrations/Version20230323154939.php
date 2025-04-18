<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230323154939 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
create table "user" (
    id serial not null
        constraint user_pk
            primary key,
    name varchar not null,
    email varchar not null,
    roles varchar not null,
    password varchar not null,
    created_at timestamp not null
);
SQL
        );

        $this->addSql(
            <<<SQL
create table item_type (
    id serial not null
        constraint item_type_pk
            primary key,
    code varchar not null,
    title varchar not null
);
SQL
        );

        $this->addSql(
            <<<SQL
create table item (
    id serial not null
        constraint item_pk
            primary key,
    code varchar not null,
    title varchar not null,
    item_type_id int not null,
    wb_link varchar,
    ozon_link varchar,
    description varchar,
    is_active boolean default false not null,
    created_at timestamp not null,
    updated_at timestamp not null,
    FOREIGN KEY (item_type_id) REFERENCES "item_type" (id) on delete cascade on update cascade
);
SQL
        );
    }

    public function down(Schema $schema): void
    {

    }
}
