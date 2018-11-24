<?php

/**
 * Основной роутинг
 * @param  string $uri uri-адрес формата module.metod
 */
function route ($uri)
{
	header('Content-type: application/json;');
	header('HTTP/1.1 200 OK');

	if ($uri === '') {
		echo error(400, 'Не указан путь обращения к API');
		exit;
	}
	// Версия API. По умолчанию 1
	$version = $_REQUEST['v'] ?? 1;
	
	$arr = explode('.', $uri, 2);

	// Существует ли модуль
	if (!is_dir('./modules/' . $arr[0])) {
		echo error(400, 'Модуля ' . $arr[0] . ' - не существует');
		exit;
	}

	// Указан ли метод
	if (!isset($arr[1])) {
		echo error(400, 'Не указан метод');
		exit;
	}

	$api_file = './modules/' . $arr[0] . '/api/' . $version . '/' . $arr[1] . '.php';

	// Существует ли метод
	if (!is_file($api_file)) {
		echo error(400, 'Метода ' . $uri . ' - не существует');
		exit;
	}

	// Получение данных
	$data = (require $api_file)($_REQUEST);

	echo json_encode([
		'ok' => true,
		'response' => $data,
	], JSON_UNESCAPED_UNICODE);

	exit;

} // end route