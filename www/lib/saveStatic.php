<?php
function saveStatic($path, $data) {

        $static_file = $_SERVER['DOCUMENT_ROOT'] . '/public/' . ltrim($path, '/') ;
        $static_dir = dirname($static_file);

        if (!is_dir($static_dir)) {
            mkdir($static_dir, 0777, true);
        }

        return file_put_contents($static_file, $data);
}