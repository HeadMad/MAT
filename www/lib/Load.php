<?php


class Load
{
    public static $registrated = [];
    public static $required = [];

    /**
     * Регистрируем метод для подключения файла
     *             
     * @param  string $name Имя метода
     * @param  string $dir  Путь до дирректории с подключаемыми файлами
     */
    public static function register(string $name, string $dir): void
    {
        self::$registrated[$name] = rtrim($dir, '/') . '/';
    }

    /**
     * Подключаем файлы с помощью зарегистрированных методов
     * 
     * @param  string $name Имя метода
     * @param  array  $args Список аргументов 
     * 
     * @return        То что возвращает подключаемый файл
     */
    public static function __callStatic($name, $args)
    {
        if (! $dir = self::$registrated[$name] ?? false) {
            return null;
        }

        if (count($args) > 1 && $file = self::concat($dir, $args)) {
            return require $file;
        }

        if (! in_array($file = $dir . $args[0] . '.php', self::$required)) {
            self::$required[] = $file;
            return require $file;
        }

        return true;
    }

    /**
     * Метод собъеденяет несколько php файлов в один
     * 
     * @param  string $path  Путь до папки где хранятся файлы
     * @param  array  $files Список файлов для оюъединения
     * 
     * @return mix    Путь до сохраненного, объединенного файла
     */
    public static function concat($path, $files)
    {
        $concat_file = $path . '@' . implode('', $files) . '.php';

        if (in_array($concat_file,  self::$required)) {
            return null;
        }

        if (is_file($concat_file)) {
            return $concat_file;
        }

        $concat_data = '<?php';
        foreach ($files as $file) {
            if (! $file_data = file_get_contents($path . $file . '.php')) {
                return false;
            }

            $concat_data .= PHP_EOL . PHP_EOL . trim($file_data, "<?ph>\n\r\t ");
        }

        if (! file_put_contents($concat_file, $concat_data)) {
            return false;
        }

        return $concat_file;
    }
}