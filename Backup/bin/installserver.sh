#!/bin/sh
sudo apt update && sudo apt upgrade -y
sudo apt install apache2 -y
dpkg -i /root/server/cloudflared.deb
rm -r /etc/apache2
cp -r /root/server/Backup/apache2 /etc/apache2
