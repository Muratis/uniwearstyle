@extends('layouts/layoutCart')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/cart/checkout.css">
    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content-left')
<form action="/cart/add" method="post">
    <h4>Оформление заказа</h4>

        <div class="form-row" id="form">
            <div class="col-xs-6"><input type="text" class="form-control" placeholder="Введите имя"></div>
            <div class="col-xs-6"><input type="text" class="form-control" placeholder="Введите фамилию"></div>

            <div>
                <label for="shipping">Выберите способ доставки</label>
                <select class="form-control" name="shipping">
                    <option value="new">Отправка "Нова пошта"</option>
                    <option value="ad">Доставка на адресс</option>
                </select>
            </div>

                <div class="col-xs-5"><input type="text" class="form-control" placeholder="Город"></div>
                <div class="col-xs-5"><input type="text" class="form-control" placeholder="Адресс"></div>
                <div class="col-xs-2"><input type="text" class="form-control" placeholder="Номер дома/подьезда"></div>

                 <div class=""><input type="text" class="form-control" placeholder="Введите номер телефона"></div>
        </div>

    {{csrf_field()}}
        <input type="submit" class="btn btn-success">


</form>

@stop

@section('content-right')

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