<?php

return function($post, ?PDO $connect = null) {


	try {
	  $dbh = $connect ?? new PDO('mysql:host=localhost;dbname=matcc', 'root', '');
	} catch (Exception $e) {
	  throw $e;
	}

	try {
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	    $data = $dbh->prepare('INSERT INTO blog (title, descr, content) VALUES (:title, :descr, :content)');

    	$prepare_array = [];

    	foreach ($post as $key => $value) { $prepare_array[':' . $key] = $value; }

	    return $data->execute($prepare_array);

	} catch(PDOException $e) {
	    throw $e;
	}
};