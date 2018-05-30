<?php

namespace Helper;

/**
 * Class PdoConnexion
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
class PdoConnexion
{
    private static $pdo;

    private function __construct()
    {
    }

    public static function get()
    {
        if (\is_null(self::$pdo)) {
            try {
                self::$pdo = new \PDO('mysql:host=localhost;port=3307;dbname=kandtG1', 'kandtG1', 'kandtG1');
                self::$pdo->exec("SET NAMES UTF8");
            } catch (\PDOException $exception) {
                die($exception->getMessage());
            }
        }

        return self::$pdo;
    }
}