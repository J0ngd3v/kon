<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST["nama"];
    $folder = $_POST["folder"];
    $wa = $_POST["wa"];
    
    // Validasi data sesuai kebutuhan Anda
    
    // Buat folder baru di /var/www/html
    $folderPath = "/var/www/html/" . $folder;
    if (!file_exists($folderPath)) {
        if (mkdir($folderPath, 0777, true)) {
            echo "Folder berhasil dibuat!";
        } else {
            echo "Gagal membuat folder.";
        }
    } else {
        echo "Folder sudah ada.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
