<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM buku WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $deletedRows = mysqli_affected_rows($conn);
        if ($deletedRows > 0) {
            constructResponse(200, 'success', 'Book deleted successfully');
        } else {
            constructResponse(404, 'failed', 'Book with the specified ID not found');
        }
    } else {
        constructResponse(400, 'failed', 'Failed to delete book');
    }
} else {
    constructResponse(400, 'failed', 'Failed to get ID book');
}
