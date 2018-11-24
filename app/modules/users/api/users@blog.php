<?php
    /**
     * Возвращает записи в блоге конкретного пользователя
     * или отдельную запись этого пользователя
     */
    return function ($id, $blog_id = null, $params = null) {
        
        $default_params = array (
            'page' => 1,
            'limit' => 10,
        );

        try {
            $dbcon = new PDO('mysql:host=localhost;dbname=dbName', $dbUsername, $dbPassword);
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = 'SELECT * FROM blog WHERE author = ' . $id;

            if ($blog_id !== null) {
                $query .= ' AND (id = ' . $blog_id . ' OR alias = ' . $blog_id;
            }

            //получаем данные
            $data = $dbcon->query($query);

            return $data;

        } catch(PDOException $e) {
            echo 'Ошибка: ' . $e->getMessage();
        }
    };