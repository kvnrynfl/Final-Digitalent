<?php

if (isset($_GET['judul']) && isset($_GET['pengarang']) && isset($_GET['tahun_terbit']) && isset($_GET['isbn'])) {
    $judul = $_GET['judul'];
    $pengarang = $_GET['pengarang'];
    $tahun_terbit = $_GET['tahun_terbit'];
    $isbn = $_GET['isbn'];

    $query = "INSERT INTO buku (judul, pengarang, tahun_terbit, isbn) VALUES ('$judul','$pengarang','$tahun_terbit','$isbn')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Book added successfully, fetch the newly added book data
        $newBookId = mysqli_insert_id($conn);
        $newBookQuery = "SELECT * FROM buku WHERE id = $newBookId";
        $newBookResult = mysqli_query($conn, $newBookQuery);

        if ($newBookResult && mysqli_num_rows($newBookResult) > 0) {
            $newBookData = mysqli_fetch_assoc($newBookResult);
            constructResponse(201, 'success', 'Book added successfully', $newBookData);
        } else {
            constructResponse(404, 'failed', 'Failed to fetch newly added book data');
        }
    } else {
        constructResponse(500, 'failed', 'Failed to add book');
    }
} else {
    constructResponse(400, 'failed', 'Incomplete or missing parameters');
}
