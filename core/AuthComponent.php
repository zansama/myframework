<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/03/2019
 * Time: 11:57
 */

namespace Core;
use Core\Request;

class AuthComponent {


    static public function checkAuthenticated()
    {

        $email = 'le-campus-numerique@in-the-alps.fr';
        $password = 'LeCampusNumerique@2019';


    if ($_SESSION['email'] === $email && $_SESSION['password'] === $password){
        return true;
    }else{
        return false;
    }
    }

    static public function create()
    {

        if (isset($_POST['email']) && isset($_POST['password']) ) {
        $email = 'le-campus-numerique@in-the-alps.fr';
        $password = 'LeCampusNumerique@2019';

            if ($email === $_POST['email'] && $password === $_POST['password']) {

                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                return true;
            }
        }else{
            return false;
        }

    }

    static public function delete(Route $route)
    {


    }

}