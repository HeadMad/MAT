<?php

Lib::require('view');

return function ($target) {
	// Выводим код главной страницы
	return view('index/404', $vars);
};