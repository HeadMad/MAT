<?php

return function ($target) {
	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Главная страница',
		'content' => view('index/content/main')
	);

	return view('index/layout', $vars);
};