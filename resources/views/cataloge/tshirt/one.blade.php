@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/one.css">
    <script language="javascript" src=""></script>

@stop

@section('content')



<div class="container info">
    <div class="images">
        <?php
        $images = $tshirt->image;
        $image = explode(',', $images);

        ?>
        <div class="main-image">
            @if(isset($image[0])) <img src="/{{$image[0]}}"> @endif
        </div>

        <div class="additional_image">
            @foreach($image as $item)
                <img src="/{{$item}}">
            @endforeach

        </div>

    </div>

    <div class="infoTshirt">
        <div>
            <h2>{{$tshirt->name}}</h2>
            <h4>KPI Style</h4>
            <h3>{{$tshirt->price}} грн</h3>
        </div>

        <div>

            <form action="#" method="post" class="form-group size_catalog">

                <label for="size">Выберите размер</label>
                <select class=" form-control">
                    <option value="1">XS</option>
                    <option value="2">S</option>
                    <option value="3">M</option>
                    <option value="4">L</option>
                    <option value="5">XL</option>
                    <option value="6">XXL</option>
                </select>

                <input type="submit" value="Добавить в корзину" class="btn btnSubmit">

            </form>

        </div>

        <div class="desc">
            <p>{{$tshirt->description}}</p>
        </div>

    </div>

</div>

@stop