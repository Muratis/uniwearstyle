@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/indexUniwear.css">
    <link rel="stylesheet" href="/css/articles.css">
    <script language="javascript" src="/bootstrap/js/masonry.pkgd.min.js"></script>
    {{--<script language="javascript" src="/js/cart/cart.js"></script>--}}

@stop

@section('uniwear')
    {{ strtoupper($university[1]) }}

@stop




@section('content')

    <div class="wrapper btnToMainAndCatalog">
        <a href="#" class="btn disabled">Главная</a>
        <a href="/{{$university[1]}}/tshirt" class="btn">Каталог</a>

    </div>

<div class="container">

    <div id="carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to="0"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="/images/college/all_1.jpg" alt="" class="wrapper">
            </div>
            <div class="item">
                <img src="/images/college/all_2.jpg" alt="" class="wrapper">
                <div class="carousel-caption">
                    <h3>Second slide</h3>
                    <p>State slide</p>
                </div>
            </div>
            <div class="item">
                <img src="/images/college/all_3.jpg" alt="" class="wrapper">
                <div class="carousel-caption">
                    <h3>tree slide</h3>
                    <p>State slide</p>
                </div>
            </div>
        </div>

        <!--Стрелки переключения слайда-->
        <a href="#carousel" class="left carousel-control" data-slide="prev">
            <span><i class="fa fa-arrow-left fa-2x"></i></span>
        </a>
        <a href="#carousel" class="right carousel-control" data-slide="next">
            <span><i class="fa fa-arrow-right fa-2x"></i></span>
        </a>
    </div>
</div>


<div class="news-bag">
    <div class="container">
        <img src="/images/college/{{$university[1]}}.png">
        <h1>Наши новости</h1>
        <div class="socials">
            <a href="#"><i class="fa fa-vk fa-2x "></i></a>
            <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <span class="bd"></span>
            </div>
        </div>
    </div>

    <div class="container js-masonry" data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item" }'>
        @foreach($articles as $article)

            @include('/home/mainUniwear/articles', array('article' => $article, 'university' => $university))
        @endforeach

        <div class="wrapper">
            {{$articles->links()}}
        </div>
    </div>


@stop