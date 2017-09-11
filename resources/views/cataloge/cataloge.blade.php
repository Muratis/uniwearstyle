@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/catalog.css">
    <script language="javascript" src="/js/cataloge/sort.js"></script>

@stop

@section('content')

    <div class="container cataloge">


        <div class="filter" >
            <div>
                <a  class="off-product"><i class="fa fa-sort-up"></i>Продукт</a>
                <a  class="on-product"><i class="fa fa-sort-down"></i>Продукт</a>
                <div class="product">
                    <ul class="nav ">
                        <li>
                            <a href="#">Все</a>
                        </li>

                        <li>
                            <a href="#">Футболки</a>
                        </li>

                        <li>
                            <a href="#">Поло</a>
                        </li>

                        <li>
                            <a href="#">Худи</a>
                        </li>

                        <li>
                            <a href="#">Свитшоты</a>
                        </li>

                        <li>
                            <a href="#">Бомберы</a>
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
                            <a href="#">L</a>
                        </li>

                        <li>
                            <a href="#">XL</a>
                        </li>
                    </ul>
                </div>
                <hr>

            </div>

        </div>


        <div class="tshirts">

            @foreach($tshirts as $cataloge)

                @include('/cataloge/preview/tshirt', array('cataloge' => $cataloge))

            @endforeach

        </div>

        <div class="row">
            <div class="pag">
                {{  $tshirts->links() }}

            </div>

        </div>

    </div>


@stop