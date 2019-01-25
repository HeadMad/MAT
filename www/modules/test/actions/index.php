<?php

Lib::require('view');

return function ($target) use ($module, $action) {
	$menu = require './modules/test/data/menu.php';

	$vars = [
		'title'   => 'Тесты',
		'menu'    => view('test/menu', $menu),
	];

	// Выводим код главной страницы
	return view('test/layout', $vars);

};