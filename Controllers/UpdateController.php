<?php

$id = $_POST['id'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$isbn = $_POST['isbn'];

$query = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', isbn = '$isbn' WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    $updatedBookQuery = "SELECT * FROM buku WHERE id = $id";
    $updatedBookResult = mysqli_query($conn, $updatedBookQuery);
    $updatedBookData = mysqli_fetch_assoc($updatedBookResult);
    constructResponse(200, 'success', 'Book updated successfully', $updatedBookData);
} else {
    constructResponse(500, 'failed', 'Failed to update book');
}
