<?php

namespace Model;

use Helper\AbstractModel;
use Helper\PdoConnexion;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
class PageModel extends AbstractModel
{

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
        $this->errorHandler($stmt);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }

    /**
     * @param array $data
     * @return int|null
     * @throws \Exception
     */
    public function add(array $data): ?int
    {
        $sql = "INSERT INTO 
  `page`
SET
  `slug` = :slug,
  `title` = :title,
  `h1` = :h1,
  `p` = :p,
  `span-class` = :spanclass,
  `span-text` = :spantext,
  `img-alt` = :imgalt,
  `img-src` = :imgsrc,
  `nav-title` = :navtitle
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':slug', $data['slug'] ?? '');
        $stmt->bindValue(':title', $data['title'] ?? '');
        $stmt->bindValue(':h1', $data['h1'] ?? '');
        $stmt->bindValue(':p', $data['p'] ?? '');
        $stmt->bindValue(':spanclass', $data['span-class'] ?? '');
        $stmt->bindValue(':spantext', $data['span-text'] ?? '');
        $stmt->bindValue(':imgalt', $data['img-alt'] ?? '');
        $stmt->bindValue(':imgsrc', $data['img-src'] ?? '');
        $stmt->bindValue(':navtitle', $data['nav-title'] ?? '');
        $stmt->execute();
        $this->errorHandler($stmt);
        return $this->pdo->lastInsertId();
    }

    /**
     * @param array $data
     * @throws \Exception
     */
    public function edit(array $data): void
    {
        $sql = "UPDATE
  `page`
SET
  `slug` = :slug,
  `title` = :title,
  `h1` = :h1,
  `p` = :p,
  `span-class` = :spanclass,
  `span-text` = :spantext,
  `img-alt` = :imgalt,
  `img-src` = :imgsrc,
  `nav-title` = :navtitle
WHERE
`id` = :id
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $data['id'] ?? '');
        $stmt->bindValue(':slug', $data['slug'] ?? '');
        $stmt->bindValue(':title', $data['title'] ?? '');
        $stmt->bindValue(':h1', $data['h1'] ?? '');
        $stmt->bindValue(':p', $data['p'] ?? '');
        $stmt->bindValue(':spanclass', $data['span-class'] ?? '');
        $stmt->bindValue(':spantext', $data['span-text'] ?? '');
        $stmt->bindValue(':imgalt', $data['img-alt'] ?? '');
        $stmt->bindValue(':imgsrc', $data['img-src'] ?? '');
        $stmt->bindValue(':navtitle', $data['nav-title'] ?? '');
        $stmt->execute();
        $this->errorHandler($stmt);
    }

    /**
     * @param int $id
     * @return array|null
     * @throws \Exception
     */
    public function find(int $id): ?array
    {
        $sql = "SELECT 
  `id`, 
  `slug`, 
  `title`, 
  `h1`, 
  `p`, 
  `span-class`, 
  `span-text`, 
  `img-alt`, 
  `img-src`,
  `nav-title` 
FROM 
  `page` 
WHERE 
  `id` = :id
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $this->errorHandler($stmt);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ([] === $data) {
            return null;
        }

        return $data;
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        $sql = "DELETE FROM 
  `page` 
WHERE
  `id` = :id
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $data['id'] ?? '');
        $stmt->execute();
        $this->errorHandler($stmt);
    }
}
