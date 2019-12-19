<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $pageData['title']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/test2/vendorstefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://localhost/test2/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/df8918ebb7.js"></script>
    <!-- Styles -->

</head>
<body>

<header></header>

<div id="content">
    <div class="container table-block">
        <div class="row table-cell-block">
            <div>
                <?php if ($_SESSION['message'])  echo ($_SESSION['message'])?>


            </div>

            <div class="col-sm-12">

                <h3>Лист администратора </h3>
            </div>
            <h1 class="text-center login-title">Список статей</h1>
            <table class="wrap">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Login</th>
                    <th>Автор</th>
                    <th>Текст</th>
                    <th>Статус</th>

                </tr>
                </thead>


                <tbody>


                <?php foreach( $articles as $item): ?>
                    <?php if ($item['name'] == "admin") continue; ?>

                    <tr>

                        <td><?php echo $item['id'];?></td>
                        <td><?php echo $item['user_id'];?></td>
                        <td><a href="?option=admin/<?php  echo $item['id']?>"><?php echo $item['name'];?></a></td>
                        <td> <a></a><?php echo $item['text'];?></td>
                        <td><?php echo $item['status'];?></td>

                    </tr>


                <?php  endforeach ?>

                </tbody>


            </table>



        </div>



        <?php

        // render the pagination links
        $pagination->render();
        ?>

        <a href="?option=form">выход </a>
    </div>
</div>
</div>

<footer>

</footer>
<script src="/js/script.js"></script>

</body>
</html>