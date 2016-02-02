#!/bin/bash
# MYSQL="/opt/lampp/bin/mysql"

if [ ! -f structure_production.sql ]; then
    echo "Asegúrate de ejecutar este script desde el directorio install del código."
    exit 1;
fi

echo "A continuación se ELIMINARÁ el contenido de las bases de datos."
read -p "Presione [Enter] para continuar..." fackEnterKey

echo
mysql --user=root --password='' < structure_production.sql
echo "Ok"

echo -n "Insertando datos de necesarios de la aplicaion..."
mysql --user=root --password='' < data_production.sql
echo "Ok"

echo
echo "Todo listo"
