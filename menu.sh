if (( $EUID != 0 )); then
    echo -e "Run script as root"
    exit
fi

clear



portuguese(){
    bash <(curl https://raw.githubusercontent.com/CatValentine-Dev/pterodactylregisteraddonauto/main/instaladorportugues.sh)
}


    CYAN='\033[0;36m'
    echo -e "Copyright (c) 2022 TemuxOS"
    echo -e "This Software is opensource."
    echo -e "Module Instalator"
    echo -e "Discord: https://discord.gg/WkVVtTaBRh/"
    echo -e "Select your Language"
    echo -e "[1] Portuguese"
    echo -e "[2] Exit"
    
read -p "Insira um numero: " choice
if [ $choice == "1" ]
    then
    portuguese
fi

if [ $choice == "2" ]
    then
    exit
fi
