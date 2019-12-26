<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 13:39
 */



include_once ROOT. '/models/Articles.php';
//include_once ROOT. '/views/View.php';


include_once ROOT. '/controllers/Controller.php';


class ArticlesController  extends  Controller {

 /*  public $view;
   protected $articles;
   protected $pagination;
   // public $pageTpl = '/views/index.php';
    public function __construct() {
        $this->view = new View();

    } */

    public function actionIndex()
    {
if(isset($_SESSION['view'])&& $_SESSION['view'] !="") {
    $this->sqr=$_SESSION['view'];
}
            $pagination= $this->getArticles($this->sqr);
        $articles=$this->articles;


      require_once(ROOT . '/views/index.php');


      // $this->view->render($this->pageTpl, ['articles'=>$articles,'pagination'=>$pagination]);


       return true;

    }


    public function actionChange() {

        if(isset($_POST['data']) ) {
            $_SESSION['view']=$_POST['data'] ;
            $this->sqr= $_POST['data'] ;
            $answer='';
            ob_start();
            $pagination= $this->getArticles($this->sqr);
            $articles=$this->articles;
            require_once(ROOT . '/views/change.php');

           $response = ob_get_contents();

// отключаем и очищаем буфер
            ob_end_clean();

       // $saab=json_encode($responseText);
          //  $responseText='response'.':' .$response ;
         //  $myArr = array("John", "Mary", "Peter", "Sally");
          //  $answer="Hi, it is me, Vovka"


              echo $response;
              return true;

          // return response()->json(['answer'=> $answer]);
        }

    }







    public function  actionAdd()
    {

        require_once(ROOT . '/views/register.php');

        return true;

    }


    public function  actionInsert()
    {

           $a=isset($_SESSION['login']);

            If(!$a) {
                Articles::addArticlesItem();
            }

            $pagination = $this->getArticles($this->sqr);
            $articles = $this->articles;

            require_once(ROOT . '/views/adminList.php');





           $message = $_SESSION['message'];
           if ($message == 'not_admin') {
               $_SESSION['message'] = 'Не правильные идентификационные данные !';

               $pagination = $this->getArticles($this->sqr);
               $articles = $this->articles;

               require_once(ROOT . '/views/default.php');

           }

           if ($message == 'admin') {
                $this->key="admin";
               $pagination = $this->getArticles($this->sqr);
               $articles = $this->articles;

               require_once(ROOT . '/views/adminList.php');

               $_SESSION['message'] = "";
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