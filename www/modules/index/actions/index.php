<?php

return function () {
	// Выводим страницу ошибки 404
	return view('index/404', ['uri' => $_GET['uri']]);
};