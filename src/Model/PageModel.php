<?php

namespace Model;

use Helper\PdoConnexion;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
class PageModel
{

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * PageModel constructor.
     */
    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public function findAll(): ?array
    {
        $sql = "SELECT 
  `id`, 
  `slug` 
FROM 
  `page`
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }
        return $data;
    }
}
