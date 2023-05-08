<?php

namespace Pix;

use Boa\HTTP\Router;
use Pix\Album;
use Pix\URLParser;

class Routes
{
    private Router $Router;

    public function __construct(Router $Router)
    {
        $this->Router = $Router;
    }

    function Public() {
        $this->Router->GET('', '/Screens/Homepage.php');
        if (PIX_ALLOW_ABOUT) {
            $this->Router->GET('/version', '/Screens/Version.php');
        }
    }

    function Album() {
        require __DIR__ . '/../Processes/Database/Album.php';
        require __DIR__ . '/../Processes/URLParser.php';

        $Album = new Album();
        $Albums = $Album->GetAll();

        $Parser = new URLParser();

        foreach ($Albums as $PixAlbum) {
            $URLName = $Parser->TextToURL($PixAlbum['name']);
            $URL = $PixAlbum['id'].'-'.$URLName;
            $this->Router->GET('/album/'.$URL, '/Screens/Album.php');
        }
    }
}