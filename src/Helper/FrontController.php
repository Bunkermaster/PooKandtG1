<?php

namespace Helper;

use Controller\PageController;
use Controller\UserController;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class FrontController
{
    /**
     * FrontController constructor.
     */
    public function __construct()
    {
        \session_start();
        $action = $_POST[\KANDT_ACTION_PARAM] ?? $_GET[\KANDT_ACTION_PARAM] ?? '';
        $userController = new UserController();
        switch ($action) {
            case "page.show":
                // display page details
                $controller = new PageController();
                $output = $controller->show();
                break;

            case "page.add":
                $controller = new PageController();
                $output = $controller->add();
                break;

            case "page.delete":
                $controller = new PageController();
                $output = $controller->delete();
                break;

            case "page.edit":
                $controller = new PageController();
                $output = $controller->edit();
                break;

            case "user.logout":
                $output = $userController->logout();
                break;

            case "user.login":
                $output = $userController->loginOrName();
                break;

            case "page.index":
            default:
                // display page list
                $controller = new PageController();
                $output = $controller->index();
                break;
        }
        echo $userController->loginOrName();
        echo $output;
    }
}
