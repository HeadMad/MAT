<?php

/**
 * Роутер
 * 
 * @param  string      $module Имя модуля
 * @param  string      $action Экшен модуля
 * @param  string|null $target Уточняющие данные
 * 
 * @return string              Результат работы соответствующих экшенов
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
}