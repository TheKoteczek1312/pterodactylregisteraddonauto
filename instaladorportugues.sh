#!/bin/bash
CYAN='\033[0;36m'
echo -e "${CYAN}Mudando Linguagem...."

if (( $EUID != 0 )); then
    echo -e "${CYAN}Rode esse script usando root"
    exit
fi

clear

instalartema(){
    cd /var/www/pterodactyl
    rm -r pterodactylregisteraddonauto
    rm -rf /var/www/pterodactyl/app/Providers/RouteServiceProvider.php
    rm -rf /var/www/pterodactyl/app/Http/Controllers/Auth/RegisterController.php
    rm -rf /var/www/resources/scripts/components/auth/LoginContainer.tsx
    rm -rf /var/www/pterodactyl/resources/views/templates/auth/register.blade.php
    rm -rf /var/www/pterodactyl/routes/register_module.php
    rm -rf /var/www/pterodactyl/public/modules
    rm -rf /var/www/pterodactyl/public/modules/register.css
    mkdir /var/www/pterodactyl/public/modules
    mkdir /var/www/pterodactyl/public/modules/register/
    mkdir /var/www/pterodactyl/public/modules/register/css
    git clone https://github.com/CatValentine-Dev/pterodactylregisteraddonauto.git
    cd pterodactylregisteraddonauto
    mv RouteServiceProvider.php /var/www/pterodactyl/app/Providers/
    mv RegisterController.php /var/www/pterodactyl/app/Http/Controllers/Auth/
    mv LoginContainer.tsx /var/www/pterodactyl/app/Http/Controllers/Auth/
    mv register.blade.php /var/www/pterodactyl/resources/views/templates/auth/
    mv register_module.php /var/www/pterodactyl/routes/
    mv register.css /var/www/pterodactyl/public/modules/register/css/
    cd /var/www/pterodactyl
    chmod -R 755 storage/* bootstrap/cache/

    curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -
    apt update
    apt install -y nodejs

    npm i -g yarn
    yarn

    cd /var/www/pterodactyl
    yarn build:production
    sudo php artisan optimize:clear

}

instaladordetemas(){
    while true; do
        read -p "Tem certeza de que deseja instalar o tema [y/n]? " yn
        case $yn in
            [Yy]* ) instalartema; break;;
            [Nn]* ) exit;;
            * ) echo "Por favor responda yes ou no.";;
        esac
    done
}

reparar(){
    bash <(curl https://raw.githubusercontent.com/CatValentine-Dev/pterodactylthemes/main/reparar.sh)
}

voltar(){
 bash <(curl https://raw.githubusercontent.com/CatValentine-Dev/pterodactylthemes/main/menu.sh)
}

restaurarbackup(){
    echo "Restaurando Backup..."
    cd /var/www/
    tar -xvf pterodactylbackup.tar.gz
    rm pterodactylthemes.tar.gz

    cd /var/www/pterodactyl
    yarn build:production
    sudo php artisan optimize:clear
}

    CYAN='\033[0;36m'
    echo -e "${CYAN}Copyright (c) 2022 TemuxOS"
    echo -e "${CYAN}Esse progama e um software livre, você pode modificar e distribuir sem problemas"
    echo -e ""
    echo -e "${CYAN}Discord: https://discord.gg/WkVVtTaBRh/"
    echo -e ""
    echo -e "${CYAN} [1] Instalar o Modulo"
    echo -e "${CYAN} [2] Restaurar backup"
    echo -e "${CYAN} [3] Reparar Painel (Use caso tenha algo problema na instalação do temas)"
    echo -e "${CYAN} [4] Voltar"
    echo -e "${CYAN} [5] Sair"

read -p "Insira um numero: " choice
if [ $choice == "1" ]
    then
    instaladordetemas
fi
if [ $choice == "2" ]
    then
    restaurarbackup
fi
if [ $choice == "3" ]
    then
    reparar
fi
if [ $choice == "4" ]
    then
    voltar
fi
if [ $choice == "5" ]
    then
    exit
fi
