<?php

$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = strtok($request_uri, '?');

$base_path = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$uri = substr($request_uri, strlen($base_path));

$segments = explode('/', $uri);

$page = $segments[0];

$action = isset($segments[1]) ? $segments[1] : 'index';

if (!empty($action)) {
    $page .= '/' . $action;
}

switch ($page) {
    case '':
        include './Pages/Home.php';
        break;

    case '/Api':
        header('Content-Type: application/json');

        $config = require './Assets/Config.php';

        include './Handlers/ConnectionHanlder.php';

        include './Handlers/ResponseHandler.php';


        $request_method = $_SERVER['REQUEST_METHOD'];

        switch ($request_method) {
            case 'POST':
                include './Controllers/CreateController.php';
                break;

            case 'GET':
                include './Controllers/ReadController.php';
                break;

            case 'PUT':
                include './Controllers/UpdateController.php';
                break;

            case 'DELETE':
                include './Controllers/DeleteController.php';
                break;

            default:
                http_response_code(404);
                echo json_encode([
                    'code' => '404',
                    'status' => 'error',
                    'message' => 'Invalid HTTP request method'
                ]);
                break;
        }
        break;

    default:
        http_response_code(404);
        include './Pages/404.php';
        break;
}
