<?php

return function($connect = null) {
	try {
	  $dbh = $connect ?? new PDO('mysql:host=localhost;dbname=matcc', 'root', '');

	} catch (Exception $e) {
	  throw $e;
	}

	try {
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $data = $dbh->prepare('SELECT * FROM blog');

	    if ($data->execute()) {
		    return $data->fetchAll(PDO::FETCH_ASSOC);
	    }

	  	return false;

	} catch(PDOException $e) {
	    throw $e;
	}
};