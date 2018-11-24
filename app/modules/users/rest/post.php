<?php
    /**
     * Возвращает список пользователей
     * или данные конкретного пользователя
     */
    return function ($id = null) {
        
        $default_params = array (
            'page' => 1,
            'limit' => 10,
        );

        $default_params['id'] = $id;

        $result = [];
        $result['ok'] = true;
        $result['response'] = $default_params;

        return $result;

        try {
            $dbcon = new PDO('mysql:host=localhost;dbname=' . config('dbName'), config('dbUser'), config('dbPassword'));
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //получаем данные
            $data = $dbcon->query('SELECT * FROM blog WHERE id = ' . $id . ' OR alias = ' . $id);

            return $data;

        } catch(PDOException $e) {
            echo 'Ошибка: ' . $e->getMessage();
        }
    };