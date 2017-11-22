@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/catalog.css">
    <script language="javascript" src="/js/cataloge/sort.js"></script>

@stop

@section('uniwear')
    {{ strtoupper($university[1]) }}
@stop

@section('content')

    <div class="wrapper btnToMainAndCatalog">
        <a href="/{{$university[1]}}/main" class="btn ">Главная</a>
        <a href="/{{$university[1]}}/all" class="btn disabled">Каталог</a>

    </div>

    <div class="container cataloge">

        <div class="filter" >
            <div>
                <a  class="off-product"><i class="fa fa-sort-up"></i>Продукт</a>
                <a  class="on-product"><i class="fa fa-sort-down"></i>Продукт</a>
                <div class="product">
                    <ul class="nav ">
                        <li>
                            <button id="all" class="btn">Все</button>
                        </li>

                        <li>
                            <button  id="tshirts" class="btn">Футболки</button>
                        </li>

                        <li>
                            <button  id="polo" class="btn">Поло</button>
                        </li>

                        <li>
                            <button id="hoodie" class="btn">Худи</button>
                        </li>

                        <li>
                            <button id="sweatshirts" class="btn">Свитшоты</button>
                        </li>

                        <li>
                            <button id="bombers" class="btn">Бомберы</button>
                        </li>
                    </ul>
                </div>
                <hr>
            </div>

            <div>
                <a  class="off-sizes"><i class="fa fa-sort-up"></i>Размеры</a>
                <a  class="on-sizes"><i class="fa fa-sort-down"></i>Размеры</a>

                <div class="sizes_product">
                    <ul class="nav">

                        <li>
                            <button  class="filter_btn" value="1">XS</button>
                        </li>

                        <li>
                            <button  class="filter_btn" value="2">S</button>
                        </li>

                        <li>
                            <button  class="filter_btn" value="3">M</button>
                        </li>

                        <li>
                            <button  class="filter_btn" value="4">L</button>
                        </li>

                        <li>
                            <button class="filter_btn" value="5">XL</button>
                        </li>
                        <li>
                            <button class="filter_btn" value="6">XXL</button>
                        </li>
                    </ul>
                </div>
                <hr>

            </div>

        </div>


        <div class="content row">
                @include('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university))

        </div>
        <div class="wrapper row">
            <div class="pag">
                {{ $content->links() }}
            </div>

        </div>



    </div>


@stop