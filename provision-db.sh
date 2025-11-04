#!/usr/bin/env bash

# Actualizar paquetes
sudo apt update -y

# Instalar PostgreSQL
sudo apt install -y postgresql postgresql-contrib

# Habilitar e iniciar el servicio
sudo systemctl enable postgresql
sudo systemctl start postgresql

# Crear base de datos y usuario
sudo -u postgres psql -c "CREATE DATABASE webdb;"
sudo -u postgres psql -c "CREATE USER ana_user WITH ENCRYPTED PASSWORD '12345';"
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE webdb TO ana_user;"

# Crear tabla y datos de ejemplo
sudo -u postgres psql -d webdb -c "CREATE TABLE usuarios (id SERIAL PRIMARY KEY, nombre VARCHAR(50));"
sudo -u postgres psql -d webdb -c "INSERT INTO usuarios (nombre) VALUES ('Laura'), ('Carlos'), ('Ana');"

echo " Base de datos webdb creada, usuario ana_user configurado y datos insertados correctamente."

