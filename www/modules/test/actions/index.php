<?php
	require './lib/cache.php';
	require './lib/saveStatic.php';
	require './lib/bufer.php';

	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Тестовая страница',
	);
	
	// Добавляем кешированный контент
	$content = cache('bufer', 'modules/test/cache/content');
	$vars['content'] = $content('test/content/index', ['h1' => 'Тест статики и и кеша']);

	// Выводим код главной страницы
	$layout = bufer('test/layout', $vars);
	saveStatic('test/index.html', $layout);
	echo $layout;