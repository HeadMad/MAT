<?php

require './lib/bufer.php';

return function ($target) use ($module, $action) {

	// относительный путь
	// chdir('./modules/' . $module);

	// Массив с переменными используемыми в шаблоне
	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Главная страница',
		'content' => bufer('index/content/index')
	);

	// Выводим код главной страницы
	echo bufer('index/layout', $vars);
};