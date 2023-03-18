#!/bin/sh
sudo apt update && sudo apt upgrade -y
sudo apt install apache2 -y
dpkg -i var/www/server/cloudflared.deb
rm -r /etc/apache2
cp -r /var/www/server/Backup/apache2 /etc/apache2
cp /var/www/server/Backup/bin/updateserver /bin/updateserver
chmod a+x /bin/updateserver
sudo apt install software-properties-common -y
sudo apt -y install php7.4 libapache2-mod-php -y
a2enmod ssl
a2enmod proxy
sudo systemctl reload apache2
sudo apt install phpmyadmin -y
sudo apt install php-mysql -y
