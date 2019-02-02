<?php

/**
 * Простой шаблонизатор
 * 
 * @param  string $tpl   указание шаблона вида module/template
 * @param  array  [$vars] асоциативный массив переменных
 * 
 * @return string         *шаблон с подставленными переменными
 */
function view (string $tpl, ?array $vars = null): ?string
{
	$tpl = dirname(__DIR__) . '/modules/' . strstr($tpl, '/', true) . '/tpl' . strstr($tpl, '/') . '.tpl';

	if (!is_file($tpl))
		return null;

	if (!empty($vars)) {
		extract($vars);
	}

	ob_start();
	require $tpl;
	return ob_get_clean();

} // end view