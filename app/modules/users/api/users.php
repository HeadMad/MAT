<?php
    /**
     * Возвращает список пользователей
     * или данные конкретного пользователя
     */
    return function ($id = null, $params = null) {
        
        $default_params = array (
            'page' => 1,
            'limit' => 10,
        );

        $default_params['id'] = $id;

        return $default_params;

        // try {
        //     $dbcon = new PDO('mysql:host=localhost;dbname=dbName', $dbUsername, $dbPassword);
        //     $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //     //получаем данные
        //     $data = $dbcon->query('SELECT * FROM blog WHERE id = ' . $id . ' OR alias = ' . $id);

        //     return $data;

        // } catch(PDOException $e) {
        //     echo 'Ошибка: ' . $e->getMessage();
        // }
    };