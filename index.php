<?php 
require_once './connection/connection.php'; 
$apis =  require_once "./routes/api.php";

$base_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($request, $base_dir) === 0) {
    $request = substr($request, strlen($base_dir));
}

if ($request == '') {
    $request = '/';
}

if (isset($apis[$request])) {
    $controller_name = $apis[$request]['controller']; //if $request == /articles, then the $controller_name will be "ArticleController" 
    $method = $apis[$request]['method'];
    require_once "controllers/{$controller_name}.php";

    $controller = new $controller_name($mysqli);
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Error: Method {$method} not found in {$controller_name}.";
    }
} else {
    echo "404 Not Found";
}