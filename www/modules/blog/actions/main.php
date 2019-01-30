<?php

Load::lib('view');

return function ($target) use ($module, $action) {
	// относительный путь
    chdir('./modules/' . $module);

    $config = REQUIRE './config/config.php';

	// Массив с переменными используемыми в шаблоне
	$vars = array(
		'title' => $config['module_name'] . ' - Главная страница',
		'content' => view('index/content/posts')
	);

	// Выводим код главной страницы
	return view('index/layout', $vars);
};