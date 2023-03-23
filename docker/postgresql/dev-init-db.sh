#!/bin/bash
set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE DATABASE bnt_site ENCODING 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8' TEMPLATE template0;
    CREATE USER bnt_site WITH password 'bnt_site_pass';
    GRANT ALL PRIVILEGES ON DATABASE bnt_site TO bnt_site;
    \c bnt_site;
    GRANT ALL ON SCHEMA public TO bnt_site;
    \q
EOSQL

