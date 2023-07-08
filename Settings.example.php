<?php

global $PixRequest;

if (!$PixRequest) {
    echo 'Non-Pixelset request detected, aborting...';
    exit;
}

const PIX_LANGUAGE = 'en';
const PIX_ROOT = '/';
const WEBSITE_NAME = 'My Pix Gallery';
const DATABASE_HOST = '';
const DATABASE_NAME = '';
const DATABASE_PORT = 3306;
const DATABASE_USER = '';
const DATABASE_PASS = '';
const DATABASE_PREFIX = 'pix_';
const PIX_ALLOW_ABOUT = true;
