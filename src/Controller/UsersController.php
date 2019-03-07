<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/03/2019
 * Time: 10:47
 */

namespace App\Controller;
use Core\AuthComponent;

class UsersController extends AppController
{
    public function index(){


        if (AuthComponent::checkAuthenticated()) {

            return $this->render('users.index');

        } else {
            return $this->redirect('login');
        }



    }
    public function login(){
        if (AuthComponent::create() === true) {
            echo  $this->redirect('index');

        } else {

            return $this->render('users.login');

//            // puis on le redirige vers la page d'accueil
//            echo '<meta http-equiv="refresh" content="0;URL=login">';

        }


    }
    public function logout(){
        session_destroy();

        return $this->redirect('login');
    }
}