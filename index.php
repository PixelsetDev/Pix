<?php

use Boa\Database\SQL;

$sql = new SQL("localhost", "database", "pass", "user");
$sql->query("SELECT * FROM images", "ALL");