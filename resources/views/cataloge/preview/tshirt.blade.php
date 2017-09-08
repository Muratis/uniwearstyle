<?php
$images = $cataloge->image;
$image = explode(',', $images);

?>


<div class="item_tshirt ">
    <div>
        <a href="{{action('TshirtController@getOneTshirt', array($cataloge->tshirt_id)) }}"><img src="/{{$image[0]}}">{{$cataloge->name}}</a>
        <p>{{$cataloge->price}} грн</p>
    </div>
</div>

