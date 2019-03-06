<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 13:56
 */

namespace Core;

use Core\Router\Router;

abstract class Controller
{
    /**

     * @var Request

     */

    private $request;



    /**

     * @var Router

     */

    private $router;



    /**

     * Controller constructor.

     *

     * @param Request $request

     * @param Router  $router

     */
    public function __construct(Request $request, Router $router)

    {

        $this->request = $request;

        $this->router = $router;

    }



    /**

     * @param       $routeName

     * @param array $args

     *

     * @throws \Exception

     */

    protected final function redirect($routeName, $args = [])

    {

        $route = $this->router->getRoute($routeName);

        header(sprintf("Location: %s", $route->generateUrl($args)));

    }
}