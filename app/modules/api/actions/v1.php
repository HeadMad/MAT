<?php

    if (empty($target)) {
        exit('Не переданы ни какие параметры');
    }


    $arr = explode('/', $target);
    $count = count($arr);

    if ($count <= 2) {
        $api_file = './modules/' . $arr[0] . '/api/' . $arr[0] . '.php';

        if (!is_file($api_file)) {
            exit ('Недопустимый api-метод');
        }
        
        $data = (require $api_file)($arr[1] ?? null, $_REQUEST);
        
    } else {
        $api_file = './modules/' . $arr[0] . '/api/' . $arr[0] . '@' . $arr[2] . '.php';
        
        if (!is_file($api_file)) {
            exit ('Недопустимый api-метод');
        }

        $data = (require $api_file)($arr[1], $arr[3] ?? null, $_REQUEST);
    }

    print_r($data); 


