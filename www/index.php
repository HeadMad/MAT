<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/Load.php';

Load::register('lib', __DIR__ . '/lib');

Load::lib('route');
Load::lib('config');
Load::lib('view');

$route_args = ($_GET['uri'] !== '') ? explode('/', $_GET['uri'], 3) + ['index', 'main', null] : ['index', 'main', null];

try {
    echo route(...$route_args);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
