<?php
    function ob_cache ($func, $id = '') {

        return function (...$arguments) use ($func, $id) {
            $cache_file = __DIR__ . '/../cache/ob-' . $id . md5(serialize($arguments));

            // если есть такой кэш
            if (is_file($cache_file)) {
                echo file_get_contents($cache_file);
                return;
            }

            ob_start();
            $func(...$arguments);
            $cache = ob_get_flush();

            file_put_contents($cache_file, $cache);
        };
    }