@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/catalog.css">
    <script language="javascript" src="/js/cataloge/sort.js"></script>

@stop

@section('uniwear')
    {{--{{ strtoupper($university[1]) }}--}}
    @if($university[1] == 'kpi')
    @lang('messages.KPI')

    @elseif($university[1] == 'knu')
    @lang('messages.KNU')

    @elseif($university[1] == 'nmu')
     @lang('messages.NMU')

    @elseif($university[1] == 'kneu')
        @lang('messages.KNEU')

    @elseif($university[1] == 'knteu')
        @lang('messages.KNTEU')

    @elseif($university[1] == 'knukim')
        @lang('messages.KNUKIM')

    @elseif($university[1] == 'nau')
        @lang('messages.NAU')

    @elseif($university[1] == 'nmau')
        @lang('messages.NMAU')

    @endif
@stop

@section('content')

    <div class="wrapper btnToMainAndCatalog">
        <a href="/{{$university[1]}}/main" class="btn ">Главная</a>
        <a href="/{{$university[1]}}/all" class="btn disabled">Каталог</a>

    </div>

    <button type="button" class="navbar-toggle collapse-filter" data-toggle="collapse" data-target="#filter-collapse-1">
        <span>Фильтры</span>
    </button>


    <div class="container cataloge">

        <div class="collapse  hidden-md hidden-lg" id="filter-collapse-1">
            <div >
                <span>Продукт</span>
                <div class="product">
                    <ul class="nav ">
                        <li>
                            <button  class="btn all">Все</button>
                        </li>

                        <li>
                            <button  class="btn tshirts">Футболки</button>
                        </li>

                        <li>
                            <button   class="btn polo">Поло</button>
                        </li>

                        <li>
                            <button  class="btn hoodie">Худи</button>
                        </li>

                        <li>
                            <button  class="btn sweatshirts">Свитшоты</button>
                        </li>

                        <li>
                            <button  class="btn bombers">Бомберы</button>
                        </li>
                    </ul>
                </div>
                <hr>
            </div>

            <div>
               <span>Размеры</span>


                <div class="sizes_product">
                    <ul class="nav">
                        @foreach($size as $sizes)
                            <li>
                                <button  class="filter_btn" value="{{$sizes->size_i}}">{{$sizes->name}}</button>
                            </li>

                        @endforeach

                    </ul>
                </div>
                <hr>

            </div>

        </div>

        <div class="filter hidden-sm hidden-xs">
            <div>
                <a  class="off-product"><i class="fa fa-sort-up"></i>Продукт</a>
                <a  class="on-product"><i class="fa fa-sort-down"></i>Продукт</a>
                <div class="product">
                    <ul class="nav ">
                        <li>
                            <button  class="btn all">Все</button>
                        </li>

                        <li>
                            <button   class="btn tshirts">Футболки</button>
                        </li>

                        <li>
                            <button   class="btn polo">Поло</button>
                        </li>

                        <li>
                            <button  class="btn hoodie">Худи</button>
                        </li>

                        <li>
                            <button  class="btn sweatshirts">Свитшоты</button>
                        </li>

                        <li>
                            <button  class="btn bombers">Бомберы</button>
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
                        @foreach($size as $sizes)
                            <li>
                                <button  class="filter_btn" value="{{$sizes->size_id}}">{{$sizes->name}}</button>
                            </li>
                        @endforeach
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
                {{$content->links()}}
            </div>

        </div>



    </div>


@stop