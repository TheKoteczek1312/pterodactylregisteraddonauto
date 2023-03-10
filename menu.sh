if (( $EUID != 0 )); then
    echo -e "${CYAN}Run script as root"
    exit
fi

clear



portuguese(){
    bash <(curl https://raw.githubusercontent.com/CatValentine-Dev/pterodactylregisteraddonauto/main/instaladorportugues.sh)
}

    CYAN='\033[0;36m'
    echo -e "${CYAN}Copyright (c) 2022 TemuxOS"
    echo -e "${CYAN}This Software is opensource."
    echo -e "Register Module Instalator"
    echo -e "${CYAN}Discord: https://discord.gg/WkVVtTaBRh/"
    echo -e "Select your Language"
    echo -e "${CYAN}[1] English"
    echo -e "${CYAN}[2] Exit"
    
read -p "wprowadź numer: " choice
if [ $choice == "1" ]
    then
    portuguese
fi
if [ $choice == "2" ]
    then
    exit
fi
