<?php

namespace Pix;

use Boa\Authentication\Session;
use Boa\HTTP\Router;

class Startup {
    private Router $Router;
    private Session $Session;

    public function __construct() {
        $this->Settings();
        $this->SessionStart();
        $this->Router();
        $this->Routes();
    }

    private function SessionStart(): void {
        require __DIR__ . '/../Boa/Authentication/Session.php';

        $this->Session = new Session();
        $this->Session->Start();
    }

    private function Router(): void {
        require __DIR__ . '/../Boa/HTTP/Router.php';

        $this->Router = new Router();
    }

    private function Routes(): void {
        require __DIR__ . '/Routes.php';

        $Routes = new Routes($this->Router);
        $Routes->Public();
        $Routes->Album();
    }

    private function Settings(): void {
        if (file_exists(__DIR__ . '/../Settings.php')) {
            require __DIR__ . '/../Settings.php';
        } else {
            echo 'Settings.php not found, aborting...';
            exit;
        }
    }
}