<?php

/**
 * Основной роутинг
 * @param  string $uri uri-адрес
 */
function route ($uri = null)
{
	// если запрос пуст
	if (empty($uri)) {
		$target = null;
		require './modules/index/actions/index.php';
		return;
	}

	list($module, $action, $target) = explode('/', $uri, 3) + ['index', 'index', null];

	$action_file = './modules/' . $module . '/actions/' . $action . '.php';

	if (is_file($action_file)) {
		require $action_file;

	} else {
		require './modules/index/actions/404.php';
	}

	return;

} // end route