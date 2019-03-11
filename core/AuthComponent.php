<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/03/2019
 * Time: 11:57
 */

namespace Core;

use Core\Router\Route;

class AuthComponent
{

    /**
     * @param Request $request
     * @return bool
     */
    static public function checkAuthenticated(Request $request)
    {
        $session = $request->getSession('is_connected');

        if (!isset($session)) {
            return false;
        }elseif (isset($session)){
            setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+3600);
        }
        elseif ($_COOKIE['PHPSESSID'] === $session){

            return true;
        }

        return true;
    }


    /**
     *
     */
    static public function create()
    {
        $_SESSION['is_connected'] = true;
    }

    /**
     * @param Request $request
     * @param Route $route
     * @param array $args
     */
    static public function delete(Request $request, Route $route, $args = [])
    {
        $session = $request->getSession('is_connected');
        if (isset($session)){
            session_destroy();
            unset($_COOKIE['PHPSESSID']);

            self::redirect($route, ['param' => $args]);
        }
    }

    /**
     * @param Route $route
     * @param array $args
     */
    public static function redirect(Route $route, $args = [])
    {
        header(sprintf("Location: %s", $route->generateUrl($args)));
    }

}