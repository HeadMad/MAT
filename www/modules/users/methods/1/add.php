<?php
    /**
     * Добавляет пользователя
     */
    return function ($params = null) {
        

        try {
            $dbcon = new PDO('mysql:host=' . config('dbHost') . ';dbname=' . config('dbName'), config('dbUser'), config('dbPassword'));
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = 'SELECT * FROM users';

            if (!is_null($id)) {
                $query .= ' WHERE (id = ' . $id . ' OR alias = ' . $id . ')';
            }

            

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
                'description' => $e->getMessage()
            ];
        }

    };