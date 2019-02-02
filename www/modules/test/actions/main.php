<?php

return function ($target) use ($module, $action) {
	chdir('./modules/' . $module);
	$menu = require './data/menu.php';

	$vars = [
		'title'   => 'Тесты',
		'menu'    => view('test/menu', $menu),
	];

	// Выводим код главной страницы
	return view('test/layout', $vars);

};