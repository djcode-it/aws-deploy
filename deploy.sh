#!/bin/bash
# Script by Dj Code
# 2022 21/01

# update system and install packages (force php8 2021)
configure_system() {
    sudo sudo apt-get update -y && sudo apt-get upgrade -y

    # install all packages
    sudo apt-get install gnupg2 lsb-release ca-certificates apt-transport-https nginx mariadb-server zip unzip -y

    #add the php packages apt repository
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list

    #import the repository key
    sudo wget https://packages.sury.org/php/apt.gpg && sudo apt-key add apt.gpg

    # update system
    sudo apt-get update -y
}

#install first default php8, then other version for fpm selector
install_tools() {
    sudo apt-get install php8.0 php8.0-{dev,fpm,curl,common,imagick,mbstring,mysql,xml,zip,mcrypt,intl,gd,bcmath,phpdbg,cli,cgi,memcached,apcu} -y
    #sudo apt-get install php7.4 php7.4-{dev,fpm,curl,common,imagick,mbstring,mysql,xml,zip,mcrypt,intl,gd,bcmath,phpdbg,cli,cgi,memcached,apcu} -y
    #sudo apt-get install php7.3 php7.3-{dev,fpm,curl,common,imagick,mbstring,mysql,xml,zip,mcrypt,intl,gd,bcmath,phpdbg,cli,cgi,memcached,apcu} -y
}

#optional | change php version from 8.1.1 | 2022 brick
change_php_default(){
    sudo update-alternatives --set php /usr/bin/php8.0
    sudo update-alternatives --set phar /usr/bin/phar8.0
    sudo update-alternatives --set phar.phar /usr/bin/phar.phar8.0
    sudo update-alternatives --set phpize /usr/bin/phpize8.0
    sudo update-alternatives --set php-config /usr/bin/php-config8.0
}

#install git, composer, node
install_frameworks() {
    sudo apt-get install -y git

    wget -O composer-setup.php https://getcomposer.org/installer

    sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

    sudo mysql_secure_installation #if install mariadb/mysql
}

#start services demon
start_services() {
    sudo service nginx restart
    sudo service mysql restart
    sudo service php8.0-fpm restart
}

#for init changes for user
set_permissions() {
    sudo usermod -a -G www-data "$USER"

    # setting ownership of the directory to the user 'www-data'
    sudo chown -R "$USER":www-data /var/www

    # setting the file permission for www-data
    sudo chmod -R 775 /var/www
}

# end installation script
cleanup_system() {
    #clean apt cache
    sudo apt-get autoremove -y && sudo apt-get autoclean -y && sudo apt-get clean -y
}

#''''''''''''''''''''''''''''''''''''''''''''''''''''''
#'' CALL FUNCTION | INSTALL ALL COMPONENTS IN DEBIAN ''
#''''''''''''''''''''''''''''''''''''''''''''''''''''''
configure_system
install_tools
install_frameworks
change_php_default
start_services
set_permissions
cleanup_system
