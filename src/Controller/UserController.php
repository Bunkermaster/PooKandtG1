<?php

namespace Controller;

use Helper\AbstractController;
use View\UserView;

/**
 * Class UserController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class UserController extends AbstractController
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->view = new UserView();
    }

    public function logout()
    {
        \session_destroy();
        header("Location: ".\KANDT_ROOT_URI);
        exit;
    }

    public function loginOrName()
    {
        if (\PHP_SESSION_ACTIVE === \session_status() && isset($_SESSION['name'])) {
            return $this->view->displayName();
        } else {
            if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['user'])) {
                $data = $_POST['user'];
                $_SESSION['name'] = $data['name'];
                header("Location: ".\KANDT_ROOT_URI);
                exit;
            }

            return $this->view->login();
        }
    }


}