<?php

return function ($target) use ($module, $action) {


	Load::register('blog', dirname(__DIR__));
    $config = Load::blog('config/config');
    $getPosts = Load::blog('methods/getPosts');

	$vars = array(
		'title' => $config['module_name'] . ' - Главная страница',
		'menu' => view('blog/content/menu'),
	);

    if ($posts = $getPosts()) {
	    $vars['content'] = view('blog/content/posts', ['posts' => $posts]);
    }

	// Выводим код главной страницы
	return view('blog/layout', $vars);
};