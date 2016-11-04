#!/bin/bash
# migration.sh
echo "> Iniciando la migracion"

echo "> Creando directorio /var/www/html/neubox ..."
mkdir /var/www/html/neubox
echo "> Directorio /var/www/html/neubox creado"

echo "> Copiando views/ ..."
cp -r views /var/www/html/neubox/
echo "> Directorio views/ copiado"

echo "> Copiando index.html ..."
cp index.php /var/www/html/neubox/
echo "> index.php copiado"
