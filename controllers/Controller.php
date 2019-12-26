<?php
require_once(ROOT . '/vendor/stefangabos/zebra_pagination/Zebra_Pagination.php');




class Controller
{

   /*   public $model;
      public $view;
      protected $pageData = array();


     public function __construct() {
          $this->view = new View();
         // $this->model = new Model();
      }
   */

    public $sqr = "app";
    protected $articles = "";
    protected $pagination = "";
    protected $records_per_page = 3;
    protected $key="";
   public $pageTpl='/views/index.php';

    protected function getArticles($par)
    {



        $this->pagination = new Zebra_Pagination();

        $this->articles = Articles::getArticlesList($par);
        $this->pagination->records(count($this->articles));

        $this->pagination->records_per_page($this->records_per_page);
        $this->articles = array_slice(
            $this->articles,
            (($this->pagination->get_page() - 1) * $this->records_per_page),
            $this->records_per_page
        );
        return $this->pagination;
    }
}