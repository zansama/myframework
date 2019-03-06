<?php


namespace Core\Router;


use Core\Request;


class Router

{


    /**
     * @var array
     */

    private $routes;


    /**
     * @var Request
     */

    private $request;


    /**
     * RouterInterface constructor.
     *
     * @param Request $request
     */

    public function __construct(Request $request)

    {

        $this->request = $request;

    }


    /**
     * @param Route $route
     *
     * @return php
     * @throws \Exception
     */

    public function addRoute(Route $route)

    {

        // TODO: Implement addRoute(Route $route) method.


        // Si la route existe déjà (teste sur le nom) alors on soulève une erreur
        if (isset($this->routes[$route->getName()])) {
            // throw new \Exception() ...
            throw new \Exception("cet route existe déjà");
        }
        // Sinon on l'ajoute a la liste de nos routes !
        $this->routes[$route->getName()] = $route;

        return $this;
    }


    /**
     * @return mixed
     * @throws \Exception
     */

    public function getRouteByRequest()

    {

        // TODO: Implement getRouteByRequest() method.


        // Pour chaque route, on teste si elle correspond à la requête, si oui alors on renvoie cette route
        foreach ($this->routes as $route) {
            // Si aucune route ne correspond alors on renvoie une erreur
            if ($route->match($this->request->getServer()['REQUEST_URI'])) {
                return $route;
            }
        }

        // throw new \Exception() ...
        throw new \Exception("cette route n'existe pas!");

    }
    /**

     * @param string $routeName

     * @return Route

     * @throws \Exception

     */

    public function getRoute($routeName)

    {

        // Si la route existe (teste sur le nom) alors on renvoie la route en question

        if(isset($this->routes[$routeName])) {

            return $this->routes[$routeName];

        }



        // Sinon on soulève une erreur

        throw new \Exception("Cette route n'existe pas !");

    }




}