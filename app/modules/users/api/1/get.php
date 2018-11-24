<?php
    /**
     * Возвращает список пользователей
     * или данные конкретного пользователя
     */
    return function ($params = null) {

        try {
            $dbcon = new PDO('mysql:host=' . config('dbHost') . ';dbname=' . config('dbName'), config('dbUser'), config('dbPassword'));
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Формируем строку запроса
            $query = 'SELECT * FROM users';

            if (!isset($params['id'])) {
                $query .= ' WHERE id = ' . $params['id'];
            }

            /** 
             * обработка параметров
             */

            //получаем данные
            $data = $dbcon->query($query);

            return [
                'ok' => true,
                'response' => $data,
            ];

        } catch(PDOException $e) {

            return [
                'ok' => false,
                'error_code' => 400,
                'description' => $e->getMessage();
            ];
        }

    };