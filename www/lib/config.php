<?php
function config ($param) {
    $config = [
        'startPage' => ['index', 'index', null],
        'dbName' => 'matcc',
        'dbUser' => 'root',
        'dbPassword' => '',
        'dbHost' => 'localhost',
    ];
    return $config[$param] ?? null;
}