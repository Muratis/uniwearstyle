@extends('layouts.layout')

@section('head_extra')


    <link rel="stylesheet" href="/css/catalog/one.css">

    <script type="text/javascript" src="/js/cataloge/loupe/jquery.loupe.js"></script>
    <script language="javascript" src="/js/cataloge/loupe/loupe.js"></script>

    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content')



<div class="container info">
    <div class="images">
        <?php
        $images = $item->image;
        $image = explode(',', $images);

        ?>
        <div class="main-image" >

                @if(isset($image[0])) <img src="/{{$image[0]}}" id="zoom" > @endif

        </div>

        <div class="additional_image">
            @foreach($image as $items)
                <img src="/{{$items}}">
            @endforeach

        </div>

    </div>

    <div class="infoTshirt">
        <div>
            <h2 id="tshirt_name">{{$item->name}}</h2>
            <h4 ><span class="universityName">{{$university}}</span> Style</h4>
            <h3>{{$item->price}} грн</h3>
        </div>

        <div class="size_catalog">
            {{--<form  method="post" class="form-group size_catalog">--}}

                <label for="size">Выберите размер</label>
                <select class="form-control" name="size">
                    <option value="1">XS</option>
                    <option value="2">S</option>
                    <option value="3">M</option>
                    <option value="4">L</option>
                    <option value="5">XL</option>
                    <option value="6">XXL</option>
                </select>

            <input type="hidden" value="{{$item->tshirt_id}}" id="ajax-tshirt-id">
            <input type="hidden" value="{{$item->name}}" id="ajax-tshirt-name">
            <input type="hidden" value="{{$item->price}}" id="ajax-tshirt-price">
            <input type="hidden" value="{{$image[0]}}" id="ajax-tshirt-image">
            {{csrf_field()}}

                {{--<input type="submit" value="Добавить в корзину" class="btn btnSubmit" id="add_cart">--}}
            <button type="button" class="btn btnSubmit" value="{{$item->tshirt_id}}" id="add_cart">Добавить в корзину</button>

            {{--</form>--}}

        </div>

        <div class="desc">
            <h4 class="wrapper">Описание товара</h4>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores ducimus ea error et exercitationem fuga impedit necessitatibus nisi numquam porro quasi, quisquam quod recusandae rem sunt totam voluptate voluptates?</p>--}}
            <p>{{$item->description}}</p>
        </div>
    </div>


</div>

@stop