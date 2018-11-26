<?php
    function cache ($func, $id = '') {

        return function (...$arguments) use ($func, $id) {
            $cache_file = __DIR__ . '/../cache/' . $id . md5(serialize($arguments));

            // если есть такой кэш
            if (is_file($cache_file)) {
                return file_get_contents($cache_file);
            }

            $cache = $func(...$arguments);

            file_put_contents($cache_file, $cache);

            return $cache;
        };
    }