@extends('layouts/layoutCart')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/cart/checkout.css">
    <link rel="stylesheet" href="/css/error/form_error/check_out_form.css">
    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content-left')
    <form action="/cart/add" method="post">
        <h4>Оформление заказа</h4>
        @include('/cart/forms/check-out_form')
    </form>
@stop

@section('content-right')

    @foreach($carts as $cart)
        <div class="row shopItem">
            <img src="/{{$cart->options->image}}">
            <div>
                <p>{{$cart->name}}</p>
                <p>Размер: {{$cart->options->size}}</p>
                <p>Пол: {{$cart->options->gender}}</p>
            </div>
            <span id="price">{{$cart->price}} грн</span>
        </div>
<hr>
    @endforeach


    <div class="total">
        <span>За все</span>
        <span>{{Cart::subtotal()}} грн</span>
    </div>

@stop