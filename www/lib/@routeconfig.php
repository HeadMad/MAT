<?php

/**
 * Основной роутинг
 * 
 * @param  string $uri uri-адрес
 */
function route(string $module, string $action, ?string $target = null): ?string
{
	$action_path = './modules/' . $module . '/actions/';
	$action_file = $action_path  . $action . '.php';

	if (is_file($action_file)) {
		return (require $action_file)($target);

	} elseif (is_dir($action_path)) {
		return (require $action_path . 'index.php')($target);

	} else {
		return (require './modules/index/actions/index.php')($target);
	}

	return '';

} // end route

function config ($param) {
    $config = [
        'startPage' => ['index', 'index', null],
        'dbName' => 'matcc',
        'dbUser' => 'root',
        'dbPassword' => '',
        'dbHost' => 'localhost',
    ];
    return $config[$param] ?? null;
}