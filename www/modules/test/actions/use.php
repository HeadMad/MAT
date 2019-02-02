<?php

return function() {


	$hello = 'hi';

	$func = function ($name) use (&$hello) {
		$hello = $hello . ' ' . $name;
	};

	$func('Peter');

	echo $hello;
};