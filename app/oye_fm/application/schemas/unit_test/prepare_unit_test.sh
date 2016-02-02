#!/bin/bash

#Variables
# MYSQL_DIR="/opt/levelampp/mysql/bin"
STRUCTURE_DATA="structure_unit_test.sql"

if [ ! -f prepare_unit_test.sh ]; then
    echo "Asegúrate de ejecutar este script desde el directorio install del código."
    exit 1;
fi

echo "A continuación se ELIMINARÁ el contenido de las bases de datos."
read -p "Presione [Enter] para continuar..." fackEnterKey

echo -n "Reseteando y creando estructuras ... "
# $MYSQL_DIR/mysql --user=root --password='levelampp' < $STRUCTURE_DATA
mysql --user=root --password='' < $STRUCTURE_DATA
echo "[OK]"

echo
echo "Todo listo"
