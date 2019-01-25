<?php

require './lib/bufer.php';

return function ($target) use ($module, $action) {
	require './lib/saveStatic.php';
	
	$menu = require './modules/test/data/menu.php';

	$vars = [
		'title'   => 'Тест: сохранение статической страницы',
		'menu'    => bufer('test/menu', $menu),
		'content' => bufer('test/content/static'),
	];
	
	// Выводим код главной страницы
	$layout = bufer('test/layout', $vars);
	saveStatic('test/static', $layout);
	echo $layout;
};