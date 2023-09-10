#!/bin/bash

PORT_BARU=443  # Ganti dengan port yang Anda inginkan

# Mengganti port dalam berkas konfigurasi Apache2
sed -i "s/Listen 80/Listen $PORT_BARU/g" /etc/apache2/ports.conf
sed -i "s/:80/:$PORT_BARU/g" /etc/apache2/sites-available/000-default.conf

# Me-restart layanan Apache2
systemctl restart apache2

echo "Port Apache2 telah diubah menjadi $PORT_BARU"
