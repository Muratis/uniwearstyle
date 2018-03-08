@extends('layouts.layout')

@section('head_extra')


    <link rel="stylesheet" href="/css/catalog/one.css">

    <script type="text/javascript" src="/js/cataloge/loupe/jquery.loupe.js"></script>
    <script language="javascript" src="/js/cataloge/loupe/loupe.js"></script>

    <script language="javascript" src="/js/cart/cart.js"></script>

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



<div class="container info">

    <div class="images">
        <?php
        $images = $item->image;
        $image = explode(',', $images);


        ?>



        <div class="main-image" >

                 <img src="/{{$image[0]}}" id="zoom" name="main_img">

        </div>

        <div class="additional_image">
            @foreach($image as $items)
                <a href="javascript:l_image ('/{{$items}}')"><img src="/{{$items}}"></a>
            @endforeach

        </div>

    </div>
<hr class="hidden-lg hidden-md">
    <div class="infoTshirt">
        <div>
            <h2 id="tshirt_name">{{$item->name}}</h2>
            <h4 ><span class="universityName">{{$university[1]}}</span> Style</h4>
            <h3 ><span id="price">{{$item->price}}</span> грн</h3>
            <p>Пол: <span id="gender">{{$item->gender}}</span></p>
        </div>

        @if($item->stock == 0)
            <h2 class="span_stock wrapper">Немає в наявності</h2>
        @else
            <div class="size_catalog">
                <label for="size">Выберите размер</label>
                <select class="form-control" name="size">
                    @foreach($item->cataloge_sizes as $sizes)
                        <option value="{{$sizes->name}}">{{$sizes->name}}</option>
                    @endforeach
                </select>

                <input type="hidden" value="{{$item->id}}" id="ajax-id">
                <input type="hidden" value="{{$image[0]}}" id="ajax-image">
                {{csrf_field()}}

                <button type="button" class="btn btnSubmit"  id="add_cart">Добавить в корзину</button>
                <div class="alert alert-success successShop">Товар успешно добавлен в корзину</div>

            </div>
        @endif

        <div class="desc">
            <h4 class="wrapper">Описание товара</h4>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores ducimus ea error et exercitationem fuga impedit necessitatibus nisi numquam porro quasi, quisquam quod recusandae rem sunt totam voluptate voluptates?</p>--}}
            <p>{{$item->description}}</p>
        </div>
        <hr class="hidden-lg hidden-md">
    </div>


</div>

@stop