<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 8:47
 */
class Controller {

    public $model;
    public $view;
    protected $pageData = array();

    public function __construct() {
        $this->view = new View();
        $this->model = new Model();
    }

}