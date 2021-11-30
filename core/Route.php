<?php

namespace Core;

use Exception;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

class Route
{

    private array $routes;

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    /**
     * @param string $path
     * @param Callable|array $action
     * @param string $name
     * 
     */
    public function get(string $path, $action)
    {
        $route = new Router($path, $action);
        $this->routes['GET'][] = $route;
        return $route;
    }

    /**
     * @param string $path
     * @param Callable|string $action
     * @param string $name
     * 
     */
    public function post(string $path, $action)
    {
        $route = new Router($path, $action);
        $this->routes['POST'][] = $route;
        return $route;
    }

    public function routesByName()
    {
        $routes = [];
        foreach ($this->routes as $request => $routers) {
            foreach ($this->routes[$request] as $router) {
                $routes[$router->name] = $router;
            }
        }
        return $routes;
    }

    public function crud(string $namespace, $controller, array $only = [])
    {
        $controllerName = str_replace('App\\Http\\Controllers\\', '', $controller);
        $id = strtolower(str_replace('Controller', '', $controllerName));
        $controllerName = get_plural($id);
        $crudActions = [
            'index' => ['request' => 'get', 'path' => "/$namespace", 'action' => [$controller, 'index'], 'name' => "$controllerName.index"],
            'show' => ['request' => 'get', 'path' => "/$namespace/:$id", 'action' => [$controller, 'show'], 'name' => "$controllerName.show"],
            'new' => ['request' => 'get', 'path' => "/$namespace/new", 'action' => [$controller, 'new'], 'name' => "$controllerName.new"],
            'create' => ['request' => 'post', 'path' => "/$namespace", 'action' => [$controller, 'create'], 'name' => "$controllerName.create"],
            'edit' => ['request' => 'get', 'path' => "/$namespace/edit/:$id", 'action' => [$controller, 'edit'], 'name' => "$controllerName.edit"],
            'update' => ['request' => 'post', 'path' => "/$namespace/update/:$id", 'action' => [$controller, 'update'], 'name' => "$controllerName.update"],
            'delete' => ['request' => 'get', 'path' => "/$namespace/delete/:$id", 'action' => [$controller, 'delete'], 'name' => "$controllerName.delete"],
        ];
        foreach ($crudActions as $key => $crudAction) {
            if (!empty($only) && in_array($key, $only)) {
                $router = call_user_func_array([$this, $crudAction['request']], [$crudAction['path'], $crudAction['action']]);
                call_user_func_array([$router, 'name'], [$crudAction['name']]);
            } elseif (empty($only)) {
                $router = call_user_func_array([$this, $crudAction['request']], [$crudAction['path'], $crudAction['action']]);
                call_user_func_array([$router, 'name'], [$crudAction['name']]);
            }
        }
    }

    public function routeNeedParams($path)
    {
        $needed = [];
        $pathArray = explode('/', $path);
        $needed = array_map(function ($p) use ($needed) {
            if (strpos($p, ':') === 0) {
                $p = str_replace(':', '', $p);
                return $p;
            };
        }, $pathArray);
        $needed = array_filter($needed);
        if (!empty($needed)) {
            throw new Exception('need params');
        }
        return $path;
    }

    public function generateUrlByName(string $routeName, $params = [])
    {
        $path = '';
        $err = 0;
        foreach ($this->routes as $method => $routes) {
            foreach ($routes as $router) {
                if ($router->name === $routeName) {
                    $path = $router->path;
                    if (!empty($params)) {
                        $path = explode('/', $path);
                        foreach ($path as $key => $value) {
                            if (strpos($value, ':') === 0) {
                                $value = str_replace(':', '', $value);
                                if (isset($params[$value])) {
                                    $path[$key] = $params[$value];
                                } else {
                                    throw new Exception("Le paramètre '$value' est requie", 13);
                                }
                            }
                        }
                        $path = implode('/', $path);
                    }
                } else {
                    $err += 1;
                }
            }
        }
        if ($err == count($routes)) {
            throw new Exception("La route '$routeName' n'existe pas.", 13);
        }
        return $this->routeNeedParams($path);
    }

    /**
     * @param string $route
     * 
     * @return [type]
     */
    public function currentRoute(string $route = '')
    {
        $currentRoute = ServerRequest::fromGlobals()->getUri()->getPath();
        if ($route) {
            return $currentRoute === $route;
        }
        return $currentRoute;
    }

    /**
     * @param string $route
     * 
     * @return [type]
     */
    public function namespaceRoute(string $route = '')
    {
        $currentRoute = ServerRequest::fromGlobals()->getUri()->getPath();
        $currentRouteArray = explode('/', trim($currentRoute, '/'));
        if ($route) {
            return $currentRouteArray[0] === $route;
        }
        return false;
    }

    public function run(ServerRequestInterface $request)
    {
        foreach ($this->routes[$request->getMethod()] as $route) {
            if ($route->match($request)) {
                return $route->execute($request);
            }
        }
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function redirectName(string $name)
    {
        $path = $this->generateUrlByName($name);
        header("Location: $path");
    }

    public function toArray()
    {
        includeAll('routes');
        $routes = [];
        $namespace = "/";
        $currentPath = "\t";
        foreach ($this->routes as $method => $routers) {
            foreach ($routers as $router) {
                $paths = explode('/', trim($router->path, '/'));
                if (in_array($namespace, $paths)) {
                    unset($paths[0]);
                    $currentPath = "\t/" . join('/', $paths);
                } else {
                    $namespace = $paths[0];
                    $currentPath = $router->path;
                }
                $routes[] = [$method, $currentPath, str_replace('App\\Http\\Controllers\\', '', $router->action[0]), $router->action[1], $router->name, $router->middleware];
            }
        }
        return $routes;
    }
}
