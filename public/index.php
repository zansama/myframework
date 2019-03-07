<?php

    require __DIR__ . "/../vendor/autoload.php";


    use \Core\Request;
    use \Core\Router\Router;
    use \Core\Router\Route;

    $request = Request::createFromGlobals();

    try {
        $router = new Router($request);
        $router
            ->addRoute(new Route("testsFoo", "/tests/foo", [], \App\Controller\FirstController::class, "foo"))
            ->addRoute(new Route("testsBar", "/tests/bar/:param", ["param" => "[\w]+"], \App\Controller\FirstController::class, "bar"))
            ->addRoute(new Route("testsRedirection", "/tests/redirection/:param", ["param" => "[\w]+"], \App\Controller\FirstController::class, "redirection"))
            ->addRoute(new Route("login", "/users/login", [], \App\Controller\UsersController::class, "login"))
            ->addRoute(new Route("index", "/users/index", [], \App\Controller\UsersController::class, "index"))
        ->addRoute(new Route("logout", "/users/logout", [], \App\Controller\UsersController::class, "logout"));


        $route = $router -> getRouteByRequest();
        $route->call($request, $router);

    } catch (\Exception $e) {
        echo $e->getMessage();
    }
