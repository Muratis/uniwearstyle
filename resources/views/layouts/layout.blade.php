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
                <button type="button" class="btn btn-logout" data-toggle="modal" data-target="#modal-1"><i class="fa fa-sign-in fa-2x"></i></button>
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
                    <a href="/" >Универы</a>
                </li>


                {{--<li>--}}
                    {{--<a href="/">Принты</a>--}}
                {{--</li>--}}

                <li>
                    <a href="/" >Отзывы</a>
                </li>

                <li>
                    <a href="contact-us">О нас</a>
                </li>

                @if(Sentinel::getUser())
                    @if(Sentinel::inRole('admin') or Sentinel::inRole('moderator'))
                        <li>

                            <a href="/admin"><i class="fa fa-wrench "></i> Панель админа</a>
                        </li>
                    @endif
                @endif


            </ul>

                    <ul class="nav  college-mobile  hidden-lg hidden-md ">

                        <li>
                            <a href="/kpi/tshirt"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">КПИ</a>
                        </li>

                        <li>
                            <a href="/nmu/tshirt"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">НМУ</a>
                        </li>

                        <li>
                            <a href="/knu/tshirt"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">КНУ</a>
                        </li>
                    </ul>


        </nav>



    </div>

</header>



<div class="modal" id="modal-1">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">Вход</div>
                <div class="panel-body">


                    <div class="omb_login">
                        <h3 class="omb_authTitle">Войти или <a href="{{URL::to('/register')}}">зарегистрироваться</a></h3>
                        {{--@include('auth.social_buttons')--}}
                        <div class="row omb_row-sm-offset-3 omb_loginOr">
                            <div class="col-xs-12 col-sm-6">
                                <hr class="omb_hrOr">
                                <span class="omb_spanOr">или</span>
                            </div>
                        </div>

                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-6">
                                <form class="omb_loginForm" action="{{url('/login')}}" method="post">
                                    @include('errors.errmsg')
                                    @include('widgets.form._formitem_text', ['name' => 'email', 'placeholder' => 'Email', 'fa_icon_class' => 'fa-user' ])
                                    @include('widgets.form._formitem_password', ['name' => 'password', 'placeholder' => 'Пароль', 'fa_icon_class' => 'fa-lock' ])
                                    @include('widgets.form._formitem_btn_submit', ['title' => 'Войти'])
                                    {{csrf_field()}}
                                </form>


                            </div>
                        </div>
                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-6">
                                <p class="omb_forgotPwd">
                                    <a href="{{URL::to('/login')}}">Забыли пароль?</a>
                                </p>
                            </div>
                        </div>
                    </div>


                    {{--@include('auth/login')--}}
                </div>
            </div>
        </div>
    </div>
</div>




<div class=" wrapper menu_college hidden-sm hidden-xs " >
    <nav role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav ">

            <li>
                <a href="/kpi/tshirt"><img src="/images/college/logo_kpi.jpg" class="menu_college_logo">КПИ</a>
            </li>

            <li>
                <a href="/nmu/tshirt"><img src="/images/college/logo_nmu.jpg" class="menu_college_logo">НМУ</a>
            </li>

            <li>
                <a href="/knu/tshirt"><img src="/images/college/logo_knu.jpg" class="menu_college_logo">КНУ</a>
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
                    <a href="/customer"> Обслуживание клиентов</a>
                </li>

                <li class="nav-item">
                    <a href="/privacy-policy"> Политика конфиденциальности</a>
                </li>

                <li class="nav-item">
                    <a href="/return--policy"> Политика возврата</a>
                </li>

                <li class="nav-item">
                    <a href="/contact-us"> Свяжитесь с нами</a>
                </li>

            </ul>
        </div>

        <div class="footer_social ">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </div>

        <div class="form_for_new">
             <form action="#">
                 <div class="form-group ">
                      <label for="Email">Хотите быть вкурсе всех новинок?</label>
                     <input name="Email" type="text" class="form-control input_email " placeholder="Email">
                     <input type="submit" class="btn_black">
                 </div>
              </form>
        </div>
        </div>

        <div class="copy ">
            <div> &copy;UniwearStyle</div>
            <div>   CREATED BY <a href="http://kazni/" class="">Kazni</a></div>
            {{--<p>&copy;UniwearStyle</p>--}}
            {{--<p> CREATED BY <a href="http://kazni/" class="">Kazni</a></p>--}}
        </div>

    </div>
</div>

</body>
</html>