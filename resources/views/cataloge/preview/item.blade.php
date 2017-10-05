<?php
$images = $cataloge->image;
$image = explode(',', $images);
$item_id = $university[2].'_id';
?>


{{--<a href="{{action('TshirtController@getOneTshirt', array($cataloge->tshirt_id)) }}"><img src="/{{$image[0]}}">{{$cataloge->name}}</a>--}}

<div class="item_tshirt ">
    <div>
        <a href="/{{$university[1]}}/{{$university[2]}}/one/{{$cataloge->$item_id}}"><img src="/{{$image[0]}}">{{$cataloge->name}}</a>
        <p>{{$cataloge->price}} грн</p>
    </div>
</div>

