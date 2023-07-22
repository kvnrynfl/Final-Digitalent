<?php

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$isbn = $_POST['isbn'];

$query = "INSERT INTO buku (judul, pengarang, tahun_terbit, isbn) VALUES ('$judul','$pengarang','$tahun_terbit','$isbn`)";
$result = mysqli_query($conn, $query);

if ($result) {
    $newBookId = mysqli_insert_id($conn);
    $newBookQuery = "SELECT * FROM buku WHERE id = $newBookId";
    $newBookResult = mysqli_query($conn, $newBookQuery);
    $newBookData = mysqli_fetch_assoc($newBookResult);
    constructResponse(201, 'success', 'Book added successfully', $newBookData);
} else {
    constructResponse(500, 'failed', 'Failed to add book');
}
