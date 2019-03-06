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

        echo 'Hello world !';

    }



    public function bar($bar)

    {

        echo $bar;

    }

}