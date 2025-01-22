<?php
require_once 'config.php';
require_once 'router/Router.php';
require_once 'controllers/PostController.php';

$router = new Router();

// Definice rout
$router->addRoute('/', 'PostController', 'index');
$router->addRoute('/create', 'PostController', 'create');
$router->addRoute('/edit', 'PostController', 'edit');
$router->addRoute('/delete', 'PostController', 'delete');
$router->addRoute('/view', 'PostController', 'view');

// Získá cestu (bez query stringu)
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Odstraní '/blog' z cesty, aby router matchoval například '/create'
$url = str_replace('/blog', '', $url);

$router->dispatch($url);
