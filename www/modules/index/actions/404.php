<?php

Load::lib('view');

return function () use ($uri) {
	// Выводим код главной страницы
	return view('index/404', ['uri' => $uri]);
};