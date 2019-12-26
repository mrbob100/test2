<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 06.12.19
 * Time: 8:31
 */
require_once(ROOT . '/controllers/Controller.php');

class Articles
{



    /** Returns single news items with specified id
     * @rapam integer &id
     */

    public static function getArticlesItemByID($id)
    {
        $id = intval($id);

       if ($id) {

            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM articles WHERE id=' . $id);

            /*$result->setFetchMode(PDO::FETCH_NUM);*/
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }



    /**
     * Returns an array of news items
     */
    public static function getArticlesList($kind) {                       // программа вывода списка статей



        $db = Db::getConnection(); // соединение с БД
        $ArticleList = array();



// include the pagination class

       // $db->query("SET CHARACTER SET utf8");



        if($kind=='app') {
            $result = $db->query('SELECT articles.id, user_id, name, text, status, email FROM articles, users WHERE user_id=users.id  ORDER BY id ASC ');
                         }
        if($kind=='oran'){
            $result = $db->query('SELECT articles.id, user_id, name, text, status, email FROM articles, users WHERE user_id=users.id  ORDER BY articles.user_id  ASC ');
        }
        if($kind=='pine') {
           $result = $db->query('SELECT articles.id, user_id, name, text, status, users.email FROM articles, users WHERE user_id=users.id  ORDER BY articles.name ASC ');

          // $result = $db->query( 'SELECT * FROM articles,  AS a LEFT JOIN users AS m  ON a.user_id=m.id ORDERED BY `a.name`');
        }


        $i = 0;
        while($row = $result->fetch()) {
            if($row['name']=='admin') continue;
            $ArticleList[$i]['id'] = $row['id'];
            $ArticleList[$i]['user_id'] = $row['email'];
            $ArticleList[$i]['name'] = $row['name'];
            $ArticleList[$i]['text'] = $row['text'];
            $ArticleList[$i]['status'] = $row['status'];
            $i++;
        }


        return $ArticleList;

    }




    public static function addArticlesItem()     // программа добавления  статеьи к списку
    {

        $db = Db::getConnection();               // соединение с БД



        if ($_POST['text'] !="") {                                         // регистрация пользователя
            $login = htmlentities(trim($_POST['login']));
            $email = htmlentities(trim($_POST['email']));
            $password=trim($_POST['password']);
            $pwd = password_hash($password,PASSWORD_DEFAULT);

            $text = htmlentities($_POST['text']);


            if(!empty($login)&& !empty($password)&&!empty($email)) {

                                 $id=0;
                                                                            // проверка есть ли пользователь в БД
                            try {
                                 $result = $db->prepare("SELECT id, login, email, password FROM users WHERE email=:email");
                                    $result->execute([':email'=>$email]);
                                    $user=$result->fetch(PDO::FETCH_OBJ);
                                    if($user) {

                                        if($login==$user->login && $email==$user->email && password_verify($password, $user->password)){

                                            $id=$user->id;

                                           if($user->login=="admin") {
                                               $_SESSION['message']='admin';
                                               $_SESSION['login']='admin';
                                                return;
                                            }

                                        }



                                    }

                                if($login=="admin") {
                                    $_SESSION['message']='not_admin';
                                    return;

                                }

                            }

                            catch (PDOException $e) {
                                echo 'Error : ' . $e->getMessage();
                                exit();
                            }



            if($id==0) {
                        try {


                            $role_id = 1;                                  // вставка пользователя в БД

                            $data = $db->prepare('INSERT INTO users ( login ,email ,password ,role_id) VALUES ( :login, :email, :password, :role_id)');
                            $data->bindParam(':login', $login);
                            $data->bindParam(':email', $email);
                            $data->bindParam(':password', $pwd);
                            $data->bindParam(':role_id', $role_id);


                            if ( $data->execute()) {
                                echo "New recordcreatedsuccessfully";
                            } else {
                                echo "Unable to createrecord";
                                header('location: index.php');
                                return;
                            }


                            $id = $db->lastInsertId();
                        } catch (PDOException $e) {
                            echo 'Error : ' . $e->getMessage();
                            exit();
                        }


                     }



                    try {                                               // вставка статей в таблику articles БД
                        $status = 0;
                        $user_id = $id;
                        $name = $login;



                        $sql='INSERT INTO articles (user_id, name, text, status) VALUES (:user_id, :name, :text, :status)';
                        $params=[':user_id'=> $user_id,':name'=>$login,':text'=>$text,':status'=>$status];

                        $stmt=$db->prepare($sql);
                        $stmt->execute($params);


                        $_SESSION['message'] = "Address saved";
                        header('location: index.php');

                    }catch (PDOException $e) {
                        echo 'Error : ' . $e->getMessage();
                        exit();
                    }

            }

            }else {

            echo 'Пожалуйста, заполните все поля';
            $_SESSION['message']='Пожалуйста, заполните все поля';

        }

        }





    public static function editArticlesItem($id)
    {

        $db = Db::getConnection();
        $status=0;

        if (isset($_POST['text'])) {
            $text= $_POST['text'];
            If(isset($_POST['status'])) {
                $status=1;
            }



        }
            $record = $db->query("UPDATE articles  SET text='$text',status='$status' WHERE id='$id'");
        echo " Запись откорректирована успешно !";

        return  header('location: index.php');

        
    }

}