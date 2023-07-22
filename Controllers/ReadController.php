<?php

$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);

$bookData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bookData[] = $row;
}

if (count($bookData) > 0) {
    constructResponse(200, 'success', 'Data fetched successfully', $bookData);
} else {
    constructResponse(404, 'failed', 'No data found');
}
