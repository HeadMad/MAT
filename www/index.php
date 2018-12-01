<?php
// включаем принудительное отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/config.php';

// определяем тип роутера
$route = (strpos($_SERVER['HTTP_HOST'], 'api.') !== 0) ? 'www' : 'api';

require './lib/error.' . $route . '.php';
require './lib/route.' . $route . '.php';

// Получаем URI-адрес
$uri = $_SERVER['REQUEST_URI'];

// Удаляем GET-параметры
$uri = strstr($uri, '?', true) ?: $uri;

// удаляем слеши в начале и в конце
$uri = trim($uri, '/');

route($uri);
