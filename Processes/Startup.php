<?php

namespace Pix;

use Boa\Authentication\Session;
use Boa\HTTP\Router;

class Startup {
    private Router $Router;
    private Session $Session;

    public function __construct() {
        $this->CheckInstallation();
        $this->Settings();
        $this->ProductInfo();
        $this->SessionStart();
        $this->Router();
        $this->Routes();
    }

    private function CheckInstallation(): void {
        $ErrorMsg = '';
        if (phpversion() < 8){
            $ErrorMsg = 'Pix requires PHP 8 or higher to function, please update your PHP installation.<br>';
        }
        if (!extension_loaded('imagick')){
            $ErrorMsg .= 'Imagick is not installed, Pix requires Imagick to function. More information: https://www.php.net/manual/en/imagick.setup.php<br>';
        }
        if ($ErrorMsg != '') {
            ob_end_clean();
            require_once __DIR__ . '/ErrorHandler.php';
            $ErrorHandler = new ErrorHandler();
            $ErrorHandler->Fatal($ErrorMsg);
        }
    }

    private function Settings(): void {
        if (file_exists(__DIR__ . '/../Settings.php')) {
            require_once __DIR__ . '/../Settings.php';
        } else {
            echo 'Settings.php not found, aborting...';
            exit;
        }
    }

    private function ProductInfo(): void {
        if (file_exists(__DIR__ . '/ProductInfo.php')) {
            require_once __DIR__ . '/ProductInfo.php';
        } else {
            echo 'ProductInfo.php not found, aborting...';
            exit;
        }
    }

    private function SessionStart(): void {
        require_once __DIR__ . '/../Boa/Authentication/Session.php';

        $this->Session = new Session();
        $this->Session->Start();
    }

    private function Router(): void {
        require_once __DIR__ . '/../Boa/HTTP/Router.php';

        $this->Router = new Router();
    }

    private function Routes(): void {
        require_once __DIR__ . '/Routes.php';

        $Routes = new Routes($this->Router);
        $Routes->Public();
        $Routes->Album();
    }
}