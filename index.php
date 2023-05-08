<?php

use Boa\Authentication\Session;
use Boa\HTTP\Router;

class index {
    private Router $Router;
    private Session $Session;

    public function __construct() {
        $this->Settings();
        $this->SessionStart();
        $this->Router();
        $this->Routes();
    }

    private function SessionStart(): void {
        require __DIR__ . '/Boa/Authentication/Session.php';

        $this->Session = new Session();
        $this->Session->Start();
    }

    private function Router(): void {
        require __DIR__ . '/Boa/HTTP/Router.php';

        $this->Router = new Router();
    }

    private function Routes(): void {
        $this->Router->GET('', '/Views/Homepage.php');
    }

    private function Settings(): void {
        $PixelsetRequest = true;
        require __DIR__ . '/Settings.example.php';
    }
}

new index();