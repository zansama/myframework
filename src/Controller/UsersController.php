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

        AuthComponent::checkAuthenticated($this->request, $this->router->getRoute('login'));

        $this->render('users.index');
    }

    public function login(){
        if (AuthComponent::create($this->request, $this->router->getRoute('index') ) === true) {

            $this->render('index');
//            // puis on le redirige vers la page d'accueil
//            echo '<meta http-equiv="refresh" content="0;URL=login">';
        }else{
        $this->render('users.login');

        }}



    public function logout(){
        session_destroy();

        return $this->redirect('login');
    }
}