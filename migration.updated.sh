#!/bin/bash
# migration.sh
echo "> Iniciando la migracion"

echo "> Creando directorio /var/www/html/neubox ..."
mkdir /var/www/html/neubox
echo "> Directorio /var/www/html/neubox creado"

echo "> Copiando todo..."
cp -r . /var/www/html/neubox
echo "> Se ha copiado todo"
