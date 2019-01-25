<?php

/**
 * Основной роутинг
 * 
 * @param  string $uri uri-адрес
 */
function route(string $uri, array $default = ['index', 'index', null]): ?string
{
	if ($uri === '') {
		list($module, $action, $target) = $default;
		
	} else {
		list($module, $action, $target) = explode('/', $uri, 3) + $default;
	}

	$actionFile = './modules/' . $module . '/actions/' . $action . '.php';

	if (is_file($actionFile)) {
		return (require $actionFile)($target);

	} else {
		return require './modules/index/actions/404.php';
	}

	return '';

} // end route