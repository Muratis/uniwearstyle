<!DOCTYPE html>

<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">

    <title>  UniwearStyle </title>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/x-icon" href="/images/logo.jpg">


    <script  src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>



    <script language="javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="/bootstrap/css/fa/font-awesome.css" type="text/css" media="screen" />

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="/css/layouts/layout.css">


    @yield('head_extra')
</head>
<body>

<header role="banner" class="navbar navbar-default"  id="head">
    <div>


        {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}


        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div id="brand" class="wrapper">
            <a class="navbar-brand" href="/">UniwearStyle</a>
        </div>
        {{--<div class="search">--}}
            {{--<a href="#"><i class="fa fa-search fa-2x "></i></a>--}}
        {{--</div>--}}

        <div class="social">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fa fa-user fa-2x"></i></a>
            @if(Cart::count())
            <a href="/cart"><i class="fa fa-shopping-cart fa-2x"></i><h1 class="countCart">{{Cart::count()}}</h1></a>
                @endif
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <nav class="menu wrapper" role="navigation">

            <ul class="nav navbar-nav menu-mobile">

                <li>
                    <a href="/" >Универы</a>
                </li>

                <li>
                    <a href="/">Принты</a>
                </li>

                <li>
                    <a href="/">Отзывы</a>
                </li>

                <li>
                    <a href="/">О нас</a>
                </li>
            </ul>



                    <ul class="nav navbar-nav college-mobile  hidden-lg hidden-md ">

                        <li>
                            <a href="/"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KPI</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">KNU</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KPI</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">KNU</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KPI</a>
                        </li>

                        <li>
                            <a href="/"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
                        </li>

                    </ul>


        </nav>



    </div>

</header>



<div class=" wrapper menu_college hidden-sm hidden-xs " >
    <nav role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav ">

            <li>
                <a href="/kpi/tshirt"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KPI</a>
            </li>

            <li>
                <a href="/nmu/tshirt"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
            </li>

            <li>
                <a href="/knu/tshirt"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">KNU</a>
            </li>

            <li>
                <a href="/kneu/tshirt"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KNEU</a>
            </li>

            <li>
                <a href="/"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
            </li>

            <li>
                <a href="/"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">KNU</a>
            </li>

            <li>
                <a href="/"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">KPI</a>
            </li>

            <li>
                <a href="/"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">NMU</a>
            </li>

        </ul>
    </nav>
</div>

@yield('content')


<div id="footer">
    <div class="container">

        <div class="servises">
            <ul>

                <li class="nav-item">
                    <a href="#"> Обслуживание клиентов</a>
                </li>

                <li class="nav-item">
                    <a href="#"> Политика конфиденциальности</a>
                </li>

                <li class="nav-item">
                    <a href="#"> Политика возврата</a>
                </li>

                <li class="nav-item">
                    <a href="#"> Свяжитесь с нами</a>
                </li>

            </ul>
        </div>

        <div class="footer_social">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </div>

        <div class="form_for_new">
            <form action="#">
                <div class="form-group">
                    <label for="Email">Хотите быть вкурсе всех новинок?</label>
                    <input name="Email" type="text" class="form-control input_email" placeholder="Email">
                    <input type="submit" class="btn_black">
                </div>

            </form>
        </div>

        <div class="copy">
            <p>&copy; UniwearStyle</p>
            <p> CREATED BY <a href="http://kazni/" class="">Kazni</a></p>
        </div>

    </div>
</div>

</body>
</html>