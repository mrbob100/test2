<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/test2/vendorstefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://localhost/test2/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/df8918ebb7.js"></script>
    <!-- Styles -->
    <title><?php echo 'test2'; ?></title>
</head>
<body>



    <div id="content">
        <div class="container table-block">
            <div class="row table-cell-block">
                <div class="col-sm-12">

                    <div>
                        <?php if ($_SESSION['message'])  echo ($_SESSION['message'])?>


                    </div>
                        <a href="?option=form">Ввод статьи </a>
                        </div>

                <div> </div>

                    <select id="mySelect" onchange="fun1()">

                        <option value="app">Сортировка по id</option>
                        <option value="oran">Сортировка по user_id</option>
                        <option value="pine">Сортировка по name</option>

                    </select>
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

                                    <td> <?php echo $item['id'];?></td>
                                    <td><?php echo $item['user_id'];?></td>
                                    <td><?php echo $item['name'];?></td>
                                    <td> <?php echo $item['text'];?></td>
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
                </div>
            </div>
        </div>
    </div>




<script>
    function fun1() {
        let sel=document.querySelector('#mySelect').selectedIndex;
        let options=document.querySelector('#mySelect').options;
     //  alert('Выбрана опция '+options[sel].text+' '+options[sel].value);
        let xhr = new XMLHttpRequest();
          let data= 'data='+options[sel].value;
        alert('Выбрана опция  '+ data);

        xhr.open('POST', '?option=test2' , false);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.send(data);


        if (xhr.status != 200) {

            alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
        } else {
            // вывести результат
         // out.innerHTML=xhr.responseText ; // responseText -- текст ответа.
           // alert( xhr.statusText );
            console.log('ответ--',xhr.responseText);

        }
    }


</script>
</body>
</html>