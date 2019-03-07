<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/03/2019
 * Time: 11:57
 */

namespace Core;

use Core\Request;
use Core\Router\Route;
use function mysql_xdevapi\getSession;

class AuthComponent
{

    static public function checkAuthenticated(Request $request, Route $route, $args = [])
    {
        $email = 'le-campus-numerique@in-the-alps.fr';
        $password = 'LeCampusNumerique@2019';

        if ($request->getSession('email') !== $email || $request->getSession('password') !== $password) {
            self::redirect($route, ['param' => $args]);
        }
    }


    static public function create(Request $request, Route $route, $args = [])
    {

//        $request = Request::createFromGlobals();
        $email = 'le-campus-numerique@in-the-alps.fr';
        $password = 'LeCampusNumerique@2019';

        if ($request->getPost('email') === $email && $request->getPost('password') === $password) {
           return true;

        }
    }

    static public function delete(Route $route)
    {

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