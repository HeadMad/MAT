<?php

Lib::require('view');

return function ($target) use ($uri) {
	// Массив с переменными используемыми в шаблоне
	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Что-то пошло не так',
		'content' => view('index/content/index', ['text' => "Очень странный адрес $uri"])
	);

	// Выводим код главной страницы
	return view('index/layout', $vars);
};