<?php

namespace Controller;

use Helper\AbstractController;
use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController extends AbstractController
{

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    /**
     * @throws \Exception
     */
    public function index(): void
    {
        $data = $this->model->findAll();
        $this->view->index($data);
    }

    /**
     *
     */
    public function show()
    {
        $id = $_GET['id'] ?? $_POST['id'] ?? 0;
        $data = $this->model->find($id);
        $this->view->show($data);
    }

    /**
     * processes the POSTed form to add a new page
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['page'])) {
            $data = $_POST['page'];
            $this->model->add($data);
            header("Location: ".\KANDT_ROOT_URI);
            exit;
        } else {
            throw new \Exception("Da fuck you doin' here brah");
        }
    }

    /**
     *
     */
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['page'])) {
            $data = $_POST['page'];
            $this->model->delete($data['id']);
            header("Location: ".\KANDT_ROOT_URI);
            exit;
        }
        $id = $_GET['id'] ?? $_POST['id'] ?? 0;
        $data = $this->model->find($id);
        $this->view->delete($data);
    }

    /**
     * Updates page content
     */
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['page'])) {
            $data = $_POST['page'];
            $this->model->edit($data);
            header("Location: ".\KANDT_ROOT_URI);
            exit;
        }
        $id = $_GET['id'] ?? $_POST['id'] ?? 0;
        $data = $this->model->find($id);
        $this->view->edit($data);
    }

}
