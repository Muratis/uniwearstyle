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
        <a href="/{{$university[1]}}/tshirt" class="btn disabled">Каталог</a>

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
                            <a href="#" class="srt" >XS</a>
                            <input type="hidden" id="sr" value="1">
                        </li>

                        <li>
                            <a href="#"  >S</a>
                            <input type="hidden"  value="2">
                        </li>

                        <li>
                            <a href="#">M</a>
                        </li>

                        <li>
                            <a href="#" >L</a>
                        </li>

                        <li>
                            <a href="#">XL</a>
                        </li>
                    </ul>
                </div>
                <hr>

            </div>

        </div>


        <div class="content">
            @foreach($content as $cataloge)
                    @include('/cataloge/preview/item', array('cataloge' => $cataloge, 'university' => $university))
            @endforeach

                {{--<div class="wrapper">--}}
                    {{--<div class="pag">--}}
                        {{--{{  $content->links() }}--}}
                    {{--</div>--}}

                {{--</div>--}}
        </div>



    </div>


@stop