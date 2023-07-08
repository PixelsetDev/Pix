<?php

namespace Pix;

use Boa\Database\MySQL;

class Album
{
    public function __construct()
    {
        require_once __DIR__.'/../../Boa/Database/MySQL.php';
    }

    public function GetAll(): array|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*', DATABASE_PREFIX.'albums', '1', 'all:assoc');
    }

    public function GetAlbum(int $id): object|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*', DATABASE_PREFIX.'albums', '`id` = \''.$id.'\'', 'first:object');
    }

    public function GetAllAlbumImages(int $id): array|null
    {
        $Database = new MySQL(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME, DATABASE_PORT);

        return $Database->Select('*', DATABASE_PREFIX.'images', '`album_id` = \''.$id.'\'', 'all:assoc');
    }
}
