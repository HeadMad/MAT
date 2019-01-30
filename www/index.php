<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/Load.php';

Load::register('lib', __DIR__ . '/lib');

Load::lib('route', 'config');


// Приводим uri-адрес к нужному виду
$uri = $_SERVER['REQUEST_URI'];
$uri = strstr($uri, '?', true) ?: $uri;
$uri = trim($uri, '/');
$route_args = ($uri === '') ? ['index', 'main', null] : explode('/', $uri, 3) + ['index', 'main', null];

try {
    echo route(...$route_args);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
