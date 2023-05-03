<?php

use Boa\HTTP\Router;

require __DIR__ . '/Boa/HTTP/Router.php';

$Router = new Router();

$Router->GET('', '/Views/Homepage.php');