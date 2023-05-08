<?php

namespace Pixelset;

use Boa\Authentication\Session;
use Boa\HTTP\Router;
use Boa\Database\MySQL;

class Startup {
    private Router $Router;
    private Session $Session;
    private MySQL $Database;

    public function __construct() {
        $this->Settings();
        $this->SessionStart();
        $this->Database();
        $this->Router();
        $this->Routes();
    }

    private function SessionStart(): void {
        require __DIR__ . '/../Boa/Authentication/Session.php';

        $this->Session = new Session();
        $this->Session->Start();
    }

    private function Database(): void {
        require __DIR__ . '/../Boa/Database/MySQL.php';

        $this->Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);
    }

    private function Router(): void {
        require __DIR__ . '/../Boa/HTTP/Router.php';

        $this->Router = new Router();
    }

    private function Routes(): void {
        $this->Router->GET('', '/Views/Homepage.php');
    }

    private function Settings(): void {
        $PixelsetRequest = true;
        require __DIR__ . '/../Settings.php';
    }
}