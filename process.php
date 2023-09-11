<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaFolder = $_POST["nama_folder"];
    
    // Validasi data sesuai kebutuhan Anda
    
    // Eksekusi perintah sebagai root menggunakan sudo
    $command = "sudo mkdir /var/www/html/$namaFolder";
    $output = shell_exec($command);
    
    // Cek apakah pembuatan folder berhasil
    if (is_dir("/var/www/html/$namaFolder")) {
        echo "Folder berhasil dibuat!";
    } else {
        echo "Gagal membuat folder.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
