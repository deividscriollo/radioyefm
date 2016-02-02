#!/bin/bash
MYSQL="/opt/levelampp/mysql/bin/mysql"
DB="oye_fm_testing"
CONFIGURACION="structure_testing.sql"
DATOSPRUEBA="data_testing.sql"
# USUARIOS="auth_testing.sql"

#!/bin/bash
# Script para seleccion de archivos de base de datos
## ----------------------------------
# Define variables
# ----------------------------------
EDITOR=vim
RED='\033[0;41;30m'
STD='\033[0;0;39m'

# ----------------------------------
# User defined functions
# ----------------------------------
pause(){
  read -p "Presione [Enter] para continuar..." fackEnterKey
}

configuracion(){
	echo "Creando estructuras de configuración..."
    mysql --user=root --password='' < $CONFIGURACION
    echo "Listo.."
    pause
}

datos_prueba(){
    echo "Ingresando datos de prueba..."
    mysql --user=root --password='' < $DATOSPRUEBA
    echo "Listo.."
    pause
}
todos(){
	echo "Reiniciando la base de datos..."
    echo "Creando estructuras de configuración..."
    mysql --user=root --password='' < $CONFIGURACION
    mysql --user=root --password='' < $DATOSPRUEBA
    echo "Listo.."
    pause
}

menu() {
	clear
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
	echo " M E N U -- P R I N C I P A L"
	echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
	echo "1. Estructuras de configuración"
	echo "2. Datos de prueba"
	echo "3. Todos"
	echo "4. Salir"
}

read_options(){
	local choice
	read -p "Elija la opción [1 - 4] " choice
	case $choice in
		1) configuracion ;;
		2) datos_prueba ;;
		3) todos ;;
		4) exit 0;;
		*) echo -e "${RED}Error...${STD}" && sleep 2
	esac
}

# ----------------------------------------------
# Trap CTRL+C, CTRL+Z and quit singles
# ----------------------------------------------
trap '' SIGINT SIGQUIT SIGTSTP

# -----------------------------------
# Main logic - infinite loop
# ------------------------------------
while true
do
 	menu
	read_options
done
