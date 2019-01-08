<?php
function cache ($func, $path = 'cache') {
    return function (...$arguments) use ($func, $path) {

        $cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/www/' . trim($path, '/') . '/';
        $cache_file = $cache_dir . substr(md5(serialize($arguments)), 0, 6);

        if (is_file($cache_file)) {
            return file_get_contents($cache_file);
        }

        if (!is_dir($cache_dir)) {
            mkdir($cache_dir, 0777, true);
        }

        $cache = $func(...$arguments);

        file_put_contents($cache_file, $cache);

        return $cache;
    };
}