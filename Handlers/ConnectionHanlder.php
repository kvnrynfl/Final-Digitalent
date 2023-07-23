<?php

$conn = mysqli_connect(
    $config['DB_HOST'],
    $config['DB_USERNAME'],
    $config['DB_PASSWORD'],
    $config['DB_NAME']
);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
