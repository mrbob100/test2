<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 13:39
 */



include_once ROOT. '/models/Articles.php';
include_once ROOT. '/views/View.php';
//include_once ROOT. '/config/routes.php';

//include_once ROOT. '/components/Router.php';

class ArticlesController  {

   private $view;
    private $pageTpl = '/views/index.php';
    public function __construct() {
        $this->view = new View();

    }

    public function actionIndex()
    {

      //$articles = [];


       $records_per_page = 3;
        require (ROOT.'/vendor/stefangabos/zebra_pagination/Zebra_Pagination.php');
        $pagination = new Zebra_Pagination();

        $articles= Articles::getArticlesList();
        $pagination->records(count($articles));

        $pagination->records_per_page($records_per_page);
        $articles= array_slice(
            $articles,
            (($pagination->get_page() - 1) * $records_per_page),
            $records_per_page
        );


       require_once(ROOT . '/views/index.php');


      //  $this->view->render($this->pageTpl, $art);

       return true;

    }







    public function  actionAdd()
    {

        require_once(ROOT . '/views/register.php');

        return true;

    }
    public function  actionInsert(){
        Articles::addArticlesItem();
        $message=$_SESSION['message'];
        if($message=='admin') {
           // $articles= Articles::getArticlesList();
            $records_per_page = 3;
            require (ROOT.'/vendor/stefangabos/zebra_pagination/Zebra_Pagination.php');
            $pagination = new Zebra_Pagination();

            $articles= Articles::getArticlesList();
            $pagination->records(count($articles));

            $pagination->records_per_page($records_per_page);
            $articles= array_slice(
                $articles,
                (($pagination->get_page() - 1) * $records_per_page),
                $records_per_page
            );

            require_once(ROOT . '/views/adminList.php');


        }
        return true;

    }

    public function actionAdmin($id){
       $item= Articles::getArticlesItemByID($id);
        require_once(ROOT . '/views/single.php');
        return;

    }

    public function actionEdit($id)
    {

        Articles::editArticlesItem($id);
        return;

    }



}