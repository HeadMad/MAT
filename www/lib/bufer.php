<?php

/**
 * Простой шаблонизатор
 * @param  string $path   указание шаблона вида module/template
 * @param  array  [$vars] асоциативный массив переменных
 * @return string         *шаблон с подставленными переменными
 */
function bufer ($path, $vars = null)
{
	$path = explode('/', $path, 2);
	$tpl = './modules/' . $path[0] . '/tpl/' . $path[1] . '.tpl';

	if (!is_file($tpl))
		return null;

	if (!empty($vars))
		extract($vars);

	ob_start();
	require $tpl;

	return ob_get_clean();

} // end bufer
