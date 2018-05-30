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

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    
}
