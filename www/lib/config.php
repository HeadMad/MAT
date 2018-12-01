<?php
    function config ($param) {
        $config = [
            'dbName' => 'matcc',
            'dbUser' => 'root',
            'dbPassword' => '',
            'dbHost' => 'localhost',
        ];
        return $config[$param] ?? null;
    }