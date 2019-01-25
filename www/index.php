<?php
// включаем принудительное отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/Lib.php';

Lib::require('route');
Lib::require('config');

// Приводим uri-адрес к нужному виду
$uri = $_SERVER['REQUEST_URI'];
$uri = strstr($uri, '?', true) ?: $uri;
$uri = trim($uri, '/');

try {
    echo route($uri);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
