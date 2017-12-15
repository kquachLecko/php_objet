<?php

use Symfony\Component\Dotenv\Dotenv;

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';

if (class_exists(Dotenv::class) && file_exists(__DIR__.'/.env')) {
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__.'/.env');
}

echo (new \Application\Application())->dispatch($_SERVER['REQUEST_URI']);
