<?php

return function($posts, $connect = null) {
	try {
	  $dbh = $connect ?? new PDO('mysql:host=localhost;dbname=matcc', 'root', '');

	} catch (Exception $e) {
	  throw $e;
	}

	try {
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	    $data = $dbh->prepare('INSERT INTO blog (title, descr, content) VALUES (:title, :descr, :content)');

	    foreach ($posts as $post) {
	    	$prepare_array = [];

	    	foreach ($post as $key => $value) { $prepare_array[':' . $key] = $value; }

		    $data->execute($prepare_array);
	    }
	    
	    $dbh->commit();

	} catch(PDOException $e) {
		$dbh->rollBack();
	    throw $e;
	}
};