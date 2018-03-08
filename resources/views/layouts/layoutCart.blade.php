<!DOCTYPE html>

<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">

    <title>  UniwearStyle </title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.jpg">


    <script  src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>



    <script language="javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="/bootstrap/css/fa/font-awesome.css" type="text/css" media="screen" />

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="/css/layouts/layoutCart.css">


    @yield('head_extra')
</head>
<body>

<div class="container ">

    <div id="left">


        <header role="banner">
            <div class="">
                <a href="/" class=" brand">Uniwear Style</a>
            </div>
        </header>

        @yield('content-left')


    </div>

    <div id="right">
        @yield('content-right')
    </div>

    <div id="footer">
        <hr>
        <div class="servises">
            <ul >

                <li class="nav-item">
                    <a href="#"> Обслуживание клиентов</a>
                </li>

                <li class="nav-item">
                    <a href="#"> Политика конфиденциальности</a>
                </li>

                <li class="nav-item">
                    <a href="#"> Политика возврата</a>
                </li>

            </ul>
        </div>
    </div>
</div>




</body>
</html>