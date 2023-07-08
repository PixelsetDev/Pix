<?php

ob_start();

use Pix\Startup;

$PixRequest = true;

require __DIR__.'/Processes/Startup.php';

new Startup();

ob_end_flush();
