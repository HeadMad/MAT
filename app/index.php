<?php
// включаем принудительное отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './lib/route.php';

// Получаем URI-адрес
$uri = $_SERVER['REQUEST_URI'];

// Удаляем GET-параметры
$uri = strstr($uri, '?', true) ?: $uri;

// удаляем слеши в начале и в конце
$uri = trim($uri, '/');

// если запрос пуст
$uri = $uri ?: 'index/index';
route($uri);
