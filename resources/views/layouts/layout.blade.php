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

    <link rel="stylesheet" href="/css/layouts/layout.css">
    <link href="/css/auth.css" rel="stylesheet">


    @yield('head_extra')
</head>
<body>

<header role="banner" class="navbar navbar-default"  id="head">
    <div>

        <button type="button" class="navbar-toggle collapse-mobile " data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            {{--<span>Меню</span>--}}
        </button>



        <div id="brand" class="wrapper">

                <a class="navbar-brand" href="/"><img src="/images/college/logoHeader.png" id="logoHead">Uniwear @yield('uniwear') Style</a>


        </div>


        <div class="social">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
            @if(Sentinel::getUser())
                <a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-2x"></i></a>
            @else
                <a href="/login" class="btn  btn-login"><i class="fa fa-sign-in fa-2x"></i></a>
            @endif

            @if(Cart::count())
            <a href="/cart"><i class="fa fa-shopping-cart fa-2x"></i><h1 class="countCart">{{Cart::count()}}</h1></a>
                @endif
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <nav class="menu wrapper" role="navigation">

            <ul class="nav nav-justified menu-mobile">

                <li>
                    <a href="/" >Інститути</a>
                </li>

                {{--<li>--}}
                    {{--<a href="/">Свій стиль</a>--}}
                {{--</li>--}}

                <li>
                    <a href="/reviews" >Відгуки</a>
                </li>

                <li>
                    <a href="/contact-us">Про нас</a>
                </li>

                @if(Sentinel::getUser())
                    @if(Sentinel::inRole('admin') or Sentinel::inRole('moderator'))
                        <li>

                            <a href="/admin"><i class="fa fa-wrench "></i>Панель адміна</a>
                        </li>
                    @endif
                @endif


            </ul>

                    <ul class="nav college-mobile  hidden-lg hidden-md ">

                        <li>
                            <a href="/kpi/all"><img src="/images/college/kpi.png" class="menu_college_logo">КПІ</a>
                        </li>

                        <li>
                            <a href="/nmu/all"><img src="/images/college/nmu.png" class="menu_college_logo">НМУ</a>
                        </li>

                        <li>
                            <a href="/knu/all"><img src="/images/college/knu.png" class="menu_college_logo">КНУ</a>
                        </li>

                        <li>
                            <a href="/kneu/all"><img src="/images/college/kneu.png" class="menu_college_logo">КНЕУ</a>
                        </li>

                        <li>
                            <a href="/knteu/all"><img src="/images/college/knteu.png" class="menu_college_logo">КНТЕУ</a>
                        </li>

                        <li>
                            <a href="/knukim/all"><img src="/images/college/knukim.png" class="menu_college_logo">КНУКІМ</a>
                        </li>

                        <li>
                            <a href="/nau/all"><img src="/images/college/nau.png" class="menu_college_logo">НАУ</a>
                        </li>

                        <li>
                            <a href="/nmau/tshirt"><img src="/images/college/nmau.png" class="menu_college_logo">НМАУ</a>
                        </li>
                    </ul>


        </nav>



    </div>

</header>




<div class=" wrapper menu_college hidden-sm hidden-xs " >
    <nav role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav ">

            <li>
                <a href="/kpi/all"><img src="/images/college/kpi.png" class="menu_college_logo">КПІ</a>
            </li>

            <li>
                <a href="/nmu/all"><img src="/images/college/nmu.png" class="menu_college_logo">НМУ</a>
            </li>

            <li>
                <a href="/knu/all"><img src="/images/college/knu.png" class="menu_college_logo">КНУ</a>
            </li>

            <li>
                <a href="/kneu/all"><img src="/images/college/kneu.png" class="menu_college_logo">КНЕУ</a>
            </li>

            <li>
                <a href="/knteu/all"><img src="/images/college/knteu.png" class="menu_college_logo">КНТЕУ</a>
            </li>

            <li>
                <a href="/knukim/all"><img src="/images/college/knukim.png" class="menu_college_logo">КНУКІМ</a>
            </li>

            <li>
                <a href="/nau/all"><img src="/images/college/nau.png" class="menu_college_logo">НАУ</a>
            </li>

            <li>
                <a href="/nmau/tshirt"><img src="/images/college/nmau.png" class="menu_college_logo">НМАУ</a>
            </li>

        </ul>
    </nav>
</div>

@yield('content')


<div id="footer">
    <div class="container">
        <div class="row">
        <div class="servises">
            <ul>

                <li class="nav-item">
                    <a href="/customer">Обслуговування клієнтів</a>
                </li>

                <li class="nav-item">
                    <a href="/privacy-policy"> Політика конфіденційності</a>
                </li>

                <li class="nav-item">
                    <a href="/return--policy">Політика повернення</a>
                </li>

                <li class="nav-item">
                    <a href="/contact-us">Зв'яжіться з нами</a>
                </li>

            </ul>
        </div>

        <div class="footer_social ">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </div>

        <div class="form_for_new">
                 <div class="form-group ">
                      <p>Хочете знати про всі новини?</p>
                     <button type="button" id="add_email" class="btn_black" data-toggle="modal" data-target="#modal-2">Підписка</button>
                 </div>
        </div>

            <div class="modal" id="modal-2">
                <div class="modal-dialog">
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">Подписка на новини</div>
                            <div class="panel-body">
                                <form action="/dispatch/add_email" method="post" class="addEmailforDispatch">
                                    <label for="kpi_dispatch">КПІ</label>
                                    <input type="checkbox" value="kpi" name="universities[]">

                                    <label for="nmu_dispatch">НМУ</label>
                                    <input type="checkbox" value="nmu" name="universities[]">

                                    <label for="knu_dispatch">КНУ</label>
                                    <input type="checkbox" value="knu" name="universities[]">

                                    <label for="kneu_dispatch">КНЕУ</label>
                                    <input type="checkbox" value="kneu" name="universities[]">

                                    <label for="knteu_dispatch">КНТЕУ</label>
                                    <input type="checkbox" value="knteu" name="universities[]">

                                    <label for="knukim_dispatch">КНУКІМ</label>
                                    <input type="checkbox" value="knukim" name="universities[]">

                                    <label for="nau_dispatch">НАУ</label>
                                    <input type="checkbox" value="nau" name="universities[]">

                                    <label for="nmau_dispatch">НМАУ</label>
                                    <input type="checkbox" value="nmau" name="universities[]">

                                    {{csrf_field()}}
                                    <input name="email_dispatch" type="text" class="form-control input_email" placeholder="Email">
                                    <input type="submit"  id="add_email" class="add_dispatchEmail" value="Підписатися">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="copy ">
            <div> &copy;UniwearStyle</div>
            <div>   CREATED BY <a href="http://kazni/" class="">Kazni</a></div>
        </div>

    </div>
</div>

</body>
</html>