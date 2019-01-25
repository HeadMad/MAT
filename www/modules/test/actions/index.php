<?php

require './lib/bufer.php';

return function ($target) use ($module, $action) {
	$menu = require './modules/test/data/menu.php';

	$vars = [
		'title'   => 'Тесты',
		'menu'    => bufer('test/menu', $menu),
	];

	// Выводим код главной страницы
	echo bufer('test/layout', $vars);

};