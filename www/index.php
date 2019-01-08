<?php
// включаем принудительное отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/config.php';
require './lib/route.php';

// Получаем URI-адрес
$uri = $_SERVER['REQUEST_URI'];

// Удаляем GET-параметры
$uri = strstr($uri, '?', true) ?: $uri;

// удаляем слеши в начале и в конце
$uri = trim($uri, '/');

try {
    route($params);

} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}
