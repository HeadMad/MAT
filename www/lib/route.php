<?php

/**
 * Основной роутинг
 * @param  string $uri uri-адрес
 */
function route ($uri)
{
	if ($uri === '') {
		list($module, $action, $target) = ['index', 'index', null];
		
	} else {
		list($module, $action, $target) = explode('/', $uri, 3) + ['index', 'index', null];
	}

	$action_file = './modules/' . $module . '/actions/' . $action . '.php';

	if (is_file($action_file)) {
			require $action_file;

	} else {
		require './modules/index/actions/404.php';
	}

	return;

} // end route