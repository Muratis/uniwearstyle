<?php
$image = explode(',', $cataloge->image);


?>



<div class="item_tshirt ">
    <div @if($cataloge->stock == 0) class="no_stock" @endif>
        @if($cataloge->stock == 0) <span class="span_stock ">Немає в наявності</span> @endif
        <a href="/{{$university[1]}}/{{$cataloge->clothes_type}}/one/{{$cataloge->id }}">
                <img src="/{{$image[0]}}">{{$cataloge->name}}</a>

        <p>{{$cataloge->price}} грн</p>
    </div>

</div>

