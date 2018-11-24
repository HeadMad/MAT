<?php
    /**
     * Возвращает список пользователей
     * или данные конкретного пользователя
     */
    return function ($id = null, $where = null) {
        
        $default_params = array (
            'page' => 1,
            'limit' => 10,
        );

        $default_params['id'] = $id;

        

        try {
            $dbcon = new PDO('mysql:host=' . config('dbHost') . ';dbname=' . config('dbName'), config('dbUser'), config('dbPassword'));
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Формируем строку запроса
            $query = 'SELECT * FROM users';

            if (!is_null($id)) {
                $query .= ' WHERE (id = ' . $id . ' OR alias = ' . $id . ')';
            }

            if (!is_null($where)) {
                $where_array = [];
                foreach ($where as $key => $val) {
                    $where_array[] = $key . ' = ' . $val;
                }
                $query .= $id ? ' AND ' : ' WHERE ';
                $query .= implode(' AND ', $where_array);
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
                'description' => $e->getMessage();
            ];
        }

    };