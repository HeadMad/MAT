<?php

Load::lib('view');

return function ($target) use ($module, $action) {
	$vars = array(
		'lang' => $_REQUEST['lang'] ?? 'ru',
		'title' => 'Главная страница',
		'content' => view('index/content/main')
	);

	return view('index/layout', $vars);
};