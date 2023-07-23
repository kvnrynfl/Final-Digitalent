<?php

function constructResponse($code, $status, $message, $data = [])
{
    echo json_encode([
        'meta' => [
            'code' => $code,
            'status' => $status,
            'message' => $message
        ],
        'data' => $data
    ]);
}
