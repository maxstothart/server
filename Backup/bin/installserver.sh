#!/bin/sh
sudo apt update && sudo apt upgrade -y
sudo apt install apache2 -y
dpkg -i var/www/server/cloudflared.deb
rm -r /etc/apache2
cp -r /var/www/server/Backup/apache2 /etc/apache2
cp /var/www/server/Backup/bin/updateserver /bin/updateserver
chmod a+x /bin/updateserver
sudo apt install software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt -y install php8.1 libapache2-mod-php mysql-server php-mysql -y
sudo mysql_secure_installation
a2enmod ssl
a2enmod proxy
sudo systemctl reload apache2
sudo apt install phpmyadmin -y
