<?php

namespace Controller;

use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController
{
    /**
     * @var PageModel
     */
    private $model;

    /**
     * @var PageView
     */
    private $view;

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
//        $data = $this->model->findBySlug($slug);
        echo "Il fait show";
    }

    /**
     *
     */
    public function add()
    {

    }

    /**
     *
     */
    public function delete()
    {

    }

    /**
     *
     */
    public function edit()
    {

    }

}
