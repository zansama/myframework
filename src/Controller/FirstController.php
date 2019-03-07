<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 13:59
 */

namespace App\Controller;


class FirstController extends AppController{

    public function foo()
    {
       return $this->render('test');
    }

    public function bar($bar)
    {
        return $this->render('bar', compact('bar'));
    }

    public function  redirection($bar){
        $this->redirect("testsBar", ["param" => $bar]);
    }

}