<?php

namespace Core;

use Psr\Http\Message\ServerRequestInterface;
use Core\Facades\Permission;

class Router
{
    private string $path;
    private array $action;
    private string $name;
    /**
     * @var string|array
     */
    private $middleware;
    private array $matches;

    /**
     * @param string $path
     * @param array $action
     */
    public function __construct(string $path, array $action)
    {
        $this->path = '/' . trim($path, '/');
        $this->action = $action;
    }

    /**
     * @param ServerRequestInterface $request
     * @return void
     */
    public function execute(ServerRequestInterface $request)
    {
        $params = [];
        if($this->matches){
            $params = $this->matches;
        }
        if(!empty($this->middleware)){
            $appMiddlewares = [];
            $middlewares = is_array($this->middleware) ? $this->middleware : [$this->middleware];
            foreach ($middlewares as $middleware) {
                if(stripos($middleware, 'can') !== false){
                    $middlewares = explode(':', $middleware);
                    $args = explode(',', $middlewares[1]);
                    $permission = $args[0];
                    $subject = $args[1];
                    $model = "\\App\\Models\\" . ucfirst($subject);
                    $subject = $model::find($this->matches[$subject]);
                    return call_user_func([Permission::class, $middlewares[0]], $permission, $subject);
                } else {
                    $appMiddlewares[] = App::getMiddleware($middleware);
                }
            }
            $routerMiddleware = new RouterMiddleware($appMiddlewares);
            $routerMiddleware->process($request);
        }
        if($request->getParsedBody()){
            $params[] = $request->getParsedBody();
        }
        $controller = new $this->action[0]();
        $method = $this->action[1];
        call_user_func_array([$controller, $method], $params);
    }

    public function match(ServerRequestInterface $request)
    {
        $url = trim($request->getUri()->getPath(), '/');
        $path = preg_replace('#(:[\w]+)#', '([^/]+)', trim($this->path, '/'));

        $pathToMatch = "#^$path$#";
        if(preg_match($pathToMatch, $url, $matches)){
            $key = array_map(function ($pa) {
                if(strpos($pa, ':') == 0){
                    $pa = str_replace(':', '', $pa);
                }
                return $pa;
            }, explode('/:', trim($this->path, '/')));
            array_shift($key);
            array_shift($matches);
            $matches = $matches != [] ? array_combine($key, $matches) : $matches;
            $this->matches = $matches;
            return true;
        }
        return false;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of middleware
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * Set a new name to $this->name
     * @param string $name
     * @return Router
     */
    public function name(string $name): Router
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set a new middleware to $this->middleware
     * @param string|array $middleware
     * @return Router
     */
    public function middleware($middleware): Router
    {
        $this->middleware = $middleware;
        return $this;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the value of action
     */
    public function getAction()
    {
        return $this->action;
    }

    public function __get($name)
    {
        if(isset($this->{$name})){
            return $this->{'get' . ucfirst($name)}();
        }
    }
}
