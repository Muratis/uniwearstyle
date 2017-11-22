<?php
$image = explode(',', $cataloge->image);


?>



<div class="item_tshirt ">
    <div @if($cataloge->stock == 0) class="no_stock" @endif>

        <a href="/{{$university[1]}}/{{$cataloge->type}}/one/{{$cataloge->id }}">
                <img src="/{{$image[0]}}">{{$cataloge->name}}
            @if($cataloge->stock == 0) <span class="span_stock ">Нет в наличии</span> @endif</a>

        <p>{{$cataloge->price}} грн</p>
    </div>

</div>

