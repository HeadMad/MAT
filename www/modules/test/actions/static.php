<?php

Lib::require('view');

return function ($target) use ($module, $action) {
	require './lib/saveStatic.php';
	
	$menu = require './modules/test/data/menu.php';

	$vars = [
		'title'   => 'Тест: сохранение статической страницы',
		'menu'    => view('test/menu', $menu),
		'content' => view('test/content/static'),
	];
	
	// Выводим код главной страницы
	$layout = view('test/layout', $vars);
	saveStatic('test/static', $layout);
	return $layout;
};