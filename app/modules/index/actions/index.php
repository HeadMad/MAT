<?php
require 'lib/bufer.php';

// Массив с переменными используемыми в шаблоне
$vars = array(
	'title' => 'Главная страница',
	'content' => bufer('index/content/index')
);

// Выводим код главной страницы
echo bufer('index/layout', $vars);