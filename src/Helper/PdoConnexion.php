<?php

namespace Helper;

/**
 * Class PdoConnexion
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
final class PdoConnexion
{
    /**
     * @var
     */
    private static $pdo;

    /**
     * PdoConnexion constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return \PDO
     */
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

    /**
     * @param \PDOStatement $stmt
     * @throws \Exception
     */
    public static function errorHandler(\PDOStatement $stmt): void
    {
        if ($stmt->errorCode() !== '00000') {
            throw new \Exception($stmt->errorInfo()[1]);
        }
    }
}
