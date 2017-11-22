
@foreach($content as $cataloge)
    @include('/cataloge/preview/item', array('cataloge' => $cataloge, 'university' => $university))
@endforeach
