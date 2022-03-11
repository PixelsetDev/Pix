<?php

require __DIR__.'/Boa/Boa.php';
new Boa\App();

$sql = new Boa\Database\SQL();
$sql->query('SELECT * FROM images', 'ALL');
