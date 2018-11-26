<?php
	require './lib/ob_cache.php';
	$sell = ob_cache(require './lib/test.php', 'test');


	$sell('some', 'take');
	echo '<br>';
	$sell('hell', 'take');
	echo '<br>';
	$sell('some', 'takge');
	