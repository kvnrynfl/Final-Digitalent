<?php

$id = $_POST['id'];

$query = "DELETE FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    constructResponse(200, 'success', 'Book deleted successfully');
} else {
    constructResponse(400, 'failed', 'Failed to delete book');
}
