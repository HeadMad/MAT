<?php

Load::lib('cache');

return function ($target) use ($module, $action) {
	// относительный путь
	chdir('./modules/' . $module);
	$menu = require './data/menu.php';
	
	$cache_dir = '/cache';
	
	// переменные для шаблона
	$vars = [
		'title'   => 'Тест: кеширование данных',
		'menu'    => cache('view', $cache_dir)('test/menu', $menu),
		'content' => cache('view', $cache_dir)('test/content/cache'),
	];
	
	return view('test/layout', $vars);
};