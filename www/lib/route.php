<?php

/**
 * Основной роутинг
 * 
 * @param  string $uri uri-адрес
 */
function route(string $uri, array $default = ['index', 'main', null]): ?string
{
	if ($uri === '') {
		list($module, $action, $target) = $default;
		
	} else {
		list($module, $action, $target) = explode('/', $uri, 3) + $default;
	}

	$action_path = './modules/' . $module . '/actions/';
	$action_file = $action_path  . $action . '.php';

	if (is_file($action_file)) {
		return (require $action_file)($target);

	} elseif (is_dir($action_path)) {
		return (require $action_path . 'index.php')($target);

	} else {
		return route('index/404');
	}

	return '';

} // end route