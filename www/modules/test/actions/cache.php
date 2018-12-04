<?php
	require './lib/bufer.php';
	require './lib/cache.php';

	$menu = require './modules/test/data/menu.php';

	$cache_dir = 'modules/test/cache';

	// переменные для шаблона
	$vars = [
		'title'   => 'Тест: кеширование данных',
		'menu'    => cache('bufer', $cache_dir)('test/menu', $menu),
		'content' => cache('bufer', $cache_dir)('test/content/cache'),
	];

	echo bufer('test/layout', $vars);