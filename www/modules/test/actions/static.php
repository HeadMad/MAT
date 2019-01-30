<?php

Load::lib('view');
Load::lib('saveStatic');

return function ($target) use ($module, $action) {
	chdir('./modules/' . $module);
	$menu = require './data/menu.php';

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