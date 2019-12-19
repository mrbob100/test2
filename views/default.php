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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://use.fontawesome.com/df8918ebb7.js"></script>
    <!-- Styles -->

</head>
<body>



<div id="content">
    <div class="container table-block">
        <div class="row table-cell-block">
            <div class="col-sm-12">

                <div>
                    <?php if ($_SESSION['message'])  echo ($_SESSION['message'])?>


                </div>

            </div>

           <h3> <a href="?option=form">Продолжить </a></h3>



        </div>



    </div>
</div>
</div>
</div>


<script src="/js/script.js"></script>
</body>
</html>