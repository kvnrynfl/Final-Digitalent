<?php

if (isset($_GET['id']) && isset($_GET['judul']) && isset($_GET['pengarang']) && isset($_GET['tahun_terbit']) && isset($_GET['isbn'])) {
    $id = $_GET['id'];
    $judul = $_GET['judul'];
    $pengarang = $_GET['pengarang'];
    $tahun_terbit = $_GET['tahun_terbit'];
    $isbn = $_GET['isbn'];

    $query = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', isbn = '$isbn' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Book update successful, fetch the updated book data
        $updatedBookQuery = "SELECT * FROM buku WHERE id = $id";
        $updatedBookResult = mysqli_query($conn, $updatedBookQuery);

        if ($updatedBookResult && mysqli_num_rows($updatedBookResult) > 0) {
            $updatedBookData = mysqli_fetch_assoc($updatedBookResult);
            constructResponse(200, 'success', 'Book updated successfully', $updatedBookData);
        } else {
            constructResponse(404, 'failed', 'Failed to fetch updated book data');
        }
    } else {
        constructResponse(500, 'failed', 'Failed to update book');
    }
} else {
    constructResponse(400, 'failed', 'Incomplete or missing parameters');
}
