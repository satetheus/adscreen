#! /usr/bin/env bash

sudo apt-get update
sudo apt-get install apache2 php libapache2-mod-php -y
./composer_programmic_install.sh
php composer.phar install
sudo snap install heroku --classic
