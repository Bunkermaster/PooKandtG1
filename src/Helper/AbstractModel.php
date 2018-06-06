<?php

namespace Helper;

/**
 * Class AbstractModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
abstract class AbstractModel
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * PageModel constructor.
     */
    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    /**
     * @param \PDOStatement $stmt
     * @throws \Exception
     */
    public function errorHandler(\PDOStatement $stmt): void
    {
        if ($stmt->errorCode() !== '00000') {
            throw new \Exception($stmt->errorInfo()[1]);
        }
    }

    public abstract function add(array $data): ?int;
    public abstract function edit(array $data): void;
    public abstract function find(int $id): ?array;
    public abstract function findAll(): ?array;
    public abstract function delete(int $id): void;

}
