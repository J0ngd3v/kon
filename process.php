<?php
// Ambil input dari formulir (contoh: $_POST['folder_name'])
$folderName = $_POST['folder_name'];

// Validasi input: pastikan hanya huruf, angka, dan underscore diperbolehkan
if (!preg_match('/^[A-Za-z0-9_]+$/', $folderName)) {
    echo "Nama folder tidak valid. Hanya huruf, angka, dan underscore diperbolehkan.";
    exit;
}

// Melakukan eksekusi skrip Bash dengan input yang telah divalidasi
$output = shell_exec('/var/www/html/newhost.sh ' . escapeshellarg($folderName));
echo "Hasil eksekusi: $output";
?>
