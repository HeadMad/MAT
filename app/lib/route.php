<?php

/**
 * Основной роутинг
 * @param  string $path uri адрес
 */
function route ($uri)
{
	list($module, $action, $target) = explode('/', $uri, 3) + array('index', 'index', null);

	$action_file = 'modules/' . $module . '/actions/' . $action . '.php';

	if (!is_file($action_file))
		require 'modules/index/actions/404.php';

	else
		require $action_file;

	exit;

} // end route