<?php

namespace Pix;

use Boa\Database\MySQL;

class Album {
    function __construct() {
        require_once __DIR__ . '/../../Boa/Database/MySQL.php';
    }
    function GetAll(): array|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*',DATABASE_PREFIX.'albums','1','all:assoc');
    }

    function GetAlbum(int $id): object|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*',DATABASE_PREFIX.'albums','`id` = \''.$id.'\'','first:object');
    }

    function GetAllAlbumImages(int $id): array|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*',DATABASE_PREFIX.'images','`album_id` = \''.$id.'\'','all:assoc');
    }
}