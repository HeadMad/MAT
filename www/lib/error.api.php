<?php
    function error ($code, $description = null) {
        $errors = [
            '400' => 'Bad Request',
            '401' => 'Unauthorized',
            '403' => 'Forbidden',
            '404' => 'Not Found',
        ];

        $result = ['ok' => false];
        $result['error_code'] = $code;
        $result['description'] = $description ?? $errors[$code] ?? '';

        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }