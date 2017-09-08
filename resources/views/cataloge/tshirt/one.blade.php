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
    </div>

</div>

@stop