<?php

Lib::require('view');

return function ($target) use ($module, $action) {
	// относительный путь
	chdir('./modules/' . $module);

	// Массив с переменными используемыми в шаблоне
	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Главная страница',
		'content' => view('index/content/main')
	);

	// Выводим код главной страницы
	return view('index/layout', $vars);
};