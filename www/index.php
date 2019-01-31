<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/Load.php';

Load::register('lib', __DIR__ . '/lib');

Load::lib('route');
Load::lib('config');


// Приводим uri-адрес к нужному виду
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$route_args = ($uri === '/')
	? ['index', 'main', null]
	: explode('/', trim($uri, '/'), 3) + ['index', 'main', null];

try {
    echo route(...$route_args);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
