<?php

use Symfony\Component\Dotenv\Dotenv;

// Charge l'autoload de Composer et les dependances du projet
require dirname(__DIR__) . '/vendor/autoload.php';

// Charge les variables d'environnement avant l'execution des tests
if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');
}

// Ajuste les permissions par defaut en mode debug.....
if ($_SERVER['APP_DEBUG']) {
    umask(0000);
}
