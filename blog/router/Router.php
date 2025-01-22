<?php
class Router
{
    private $routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($url)
    {
        foreach ($this->routes as $route => $params) {
            // Pokus o shodu cesty (s volitelnou číselnou části /123)
            if (preg_match("#^$route(/([0-9]+))?$#", $url, $matches)) {
                $controllerName = $params['controller'];
                $actionName = $params['action'];

                $controller = new $controllerName();

                // Pokud existuje GET parametr ?id=...
                if (isset($_GET['id'])) {
                    $controller->$actionName($_GET['id']);
                } else {
                    $controller->$actionName();
                }
                return;
            }
        }

        // Pokud žádná route nesedí
        echo "404 Not Found: The page does not exist.";
    }
}
