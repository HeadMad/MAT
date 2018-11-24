<?php

/**
 * Основной роутинг
 * @param  string $uri uri-адрес
 */
function route ($uri)
{

	if (empty($uri)) {
		exit('Запрашиваемый ресурс не найден');
	}

	// получаем метод
	$method = $_REQUEST['method'] ?? $_SERVER['REQUEST_METHOD'];
	$method = strtolower($method);

	// разделяем массив на данные 
	// [0] - collection
	// [1] - cid
	// [2] - relation
	// [3] - rid
	$arr = explode('/', $uri, 4);


	// Если есть зависимость
	if (isset($arr[3])) {
		$api_file = './modules/' . $arr[2] . '/rest/' . $method . '.php';
		$where = [$arr[0] => $arr[1]];
		$id = $arr[3] ?? null;

	} else {
		$api_file = './modules/' . $arr[0] . '/rest/' . $method . '.php';
		$where = null;
		$id = $arr[1] ?? null;
	}

	// если есть такой файл api
	if (!is_file($api_file)) {
		exit('Такого метода не существует');
	}

	// возвращаемые данные
	$data = (require $api_file)($id, $where);

	// возвращаем пользователю результат в json формате
	header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
	header('Content-type: application/json');

	// если передан параметр callback
	if (isset($_REQUEST['callback'])) {
		echo $_REQUEST['callback'] . '(' . json_encode($data) . ');';
	
	} else {
		echo json_encode($data);
	}

	exit;

} // end route