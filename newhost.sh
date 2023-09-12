#!/bin/bash

# Ambil nama folder dari parameter pertama (input dari PHP)
folder_name="$1"

# Validasi input: pastikan nama folder hanya mengandung huruf, angka, dan underscore
if [[ ! "$folder_name" =~ ^[A-Za-z0-9_]+$ ]]; then
    echo "Nama folder tidak valid. Hanya huruf, angka, dan underscore diperbolehkan."
    exit 1
fi

# Buat folder di /var/www/html
folder_path="/var/www/html/$folder_name"

# Cek apakah folder sudah ada
if [ -d "$folder_path" ]; then
    echo "Folder sudah ada."
    exit 1
fi

# Buat folder baru
mkdir "$folder_path"

# Cek apakah pembuatan folder berhasil
if [ $? -eq 0 ]; then
    echo "Folder berhasil dibuat: $folder_path"
else
    echo "Gagal membuat folder."
fi
