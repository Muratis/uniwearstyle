@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/articles.css">
    {{--<script language="javascript" src="/js/cart/cart.js"></script>--}}

@stop

@section('uniwear')
    {{ strtoupper($university[1]) }}

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