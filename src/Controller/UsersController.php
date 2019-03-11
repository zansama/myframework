<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 07/03/2019
 * Time: 10:47
 */

namespace App\Controller;

use Core\AuthComponent;
use Core\Request;
use Core\Router\Route;

class UsersController extends AppController
{
    public function index()
    {
       AuthComponent::checkAuthenticated($this->request);

       if (AuthComponent::checkAuthenticated($this->request) === true) {
           $this->render('users.index');

       }else{

       $this->redirect('login');
       }
    }

    public function login()
    {
        $email = 'le-campus-numerique@in-the-alps.fr';
        $password = '1234';

        if (AuthComponent::checkAuthenticated($this->request, $this->router->getRoute('login'))) {
            AuthComponent::redirect($this->router->getRoute('index'), []);
        }
        if (($this->request->getPost('email') === $email) && ($this->request->getPost('password') === $password)) {
        AuthComponent::create();
            $this->redirect('index');
        }
        $this->render('users.login');
    }


    /**
     * @throws \Exception
     */
    public function logout()
    {
        AuthComponent::delete($this->request, $this->router->getRoute('login'));

    }
}