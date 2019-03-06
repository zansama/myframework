<?php
require __DIR__ . "/../vendor/autoload.php";



use \Core\Request;

var_dump(Request::createFromGlobals());