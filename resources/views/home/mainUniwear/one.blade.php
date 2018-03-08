@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/articles.css">
    {{--<script language="javascript" src="/js/cart/cart.js"></script>--}}

@stop

@section('uniwear')
    {{--{{ strtoupper($university[1]) }}--}}
    @if($university[1] == 'kpi')
        @lang('messages.KPI')

    @elseif($university[1] == 'knu')
        @lang('messages.KNU')

    @elseif($university[1] == 'nmu')
        @lang('messages.NMU')

    @endif
@stop

@section('content')

<div class="container bd-shadow">
    <div class="wrapper titleArt">
        <h1>{{$article->title}}</h1>
    </div>
    <div class="content">
        {!! $article->text !!}
    </div>
</div>

@stop