@extends('layouts/layoutCart')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/cart/checkout.css">
    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content-left')
<form action="/cart/add" method="post">
    <h4>Оформление заказа</h4>

        <div class="form-row" id="form">
            <div class="col-xs-6"><input type="text" name="first_name" class="form-control" placeholder="Введите имя"></div>
            <div class="col-xs-6"><input type="text" name="last_name" class="form-control" placeholder="Введите фамилию"></div>

            <div>
                <label for="shipping">Выберите способ доставки</label>
                <select class="form-control" name="shipping" id="method">
                    <option value="new-post" name="new-post" id="new-post">Отправка "Нова пошта"</option>
                    <option value="address" name="address" id="address">Доставка на адресс</option>
                </select>
            </div>
                <div id="content">
                    <div class="col-xs-5"><input type="text" name="city" class="form-control" placeholder="Город"></div>
                    <div class="col-xs-5"><input type="text" name="address_ship" class="form-control" placeholder="Номер Отделения"></div>
                    <div class=""><input type="text" name="phone" class="form-control" placeholder="Введите номер телефона"></div>
                </div>

        </div>

    {{csrf_field()}}
    <input type="hidden" name="id" value="{{rand()}}">
        <input type="submit" class="btn btn-success">


</form>

@stop

@section('content-right')

    {{--{{var_dump($carts)}}--}}
    @foreach($carts as $cart)
        <div class="row shopItem">
            <img src="/{{$cart->options->image}}">
            <div>
                <p>{{$cart->name}}</p>
                <p>Размер: {{$cart->options->size}}</p>
            </div>
            <span id="price">{{$cart->price}} грн</span>
        </div>

    @endforeach


    <div class="total">
        <span>За все</span>
        <span>{{Cart::subtotal()}} грн</span>
    </div>

@stop