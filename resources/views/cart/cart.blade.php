@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/cart/cart.css">
    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content')


    <div class="container">
        <h1 class="wrapper">Ваша корзина</h1>
            <table class="table">
                <thead class="table-header">
                <tr>
                    <th colspan="2" class="text-center">Продукт</th>
                    <th class="price_one">Ціна</th>
                    <th class="qty">Кількість</th>
                    <th class="alls">Всього</th>
                </tr>
                </thead>

                <tbody class="shoppingCart">
                @foreach($carts as $cart)
                    <tr>
                        <td>
                            <a href="{{action('TshirtController@getOneTshirt', array($cart->id)) }}">
                                <img src="/{{$cart->options->image}}"></a>
                        </td>
                        <td class="info_product">
                            <div>
                                <a  class="" href="{{action('TshirtController@getOneTshirt', array($cart->id)) }}">{{$cart->name}}</a>
                            </div>

                            <div>
                                <p>Розмір: {{$cart->options->size}}</p>
                                <p>Пол: {{$cart->options->gender}}</p>
                                <p id="price_mobile">Ціна {{$cart->subtotal}}</p>
                            </div>

                            <div>
                                <button class="btn delete" value="{{$cart->rowId}}">Прибрати з корзини</button>
                            </div>
                        </td>
                        <td  class="totalQty price_one">{{$cart->price}} грн</td>
                        <td  class="totalQty qty">{{$cart->qty}} </td>
                        <td  class="totalQty alls">{{$cart->subtotal}} грн</td>

                    </tr>
                @endforeach
                {{csrf_field()}}
                </tbody>
            </table>

            <footer class="cart_footer">
                <div class="float_rigth">
                    <div class="sumshop">
                        <span>За все</span>
                        <span> {{Cart::subtotal()}} грн</span>
                    </div>
                    <div class="button_cart">
                        <p>Вартість доставки обговорюється по телефону</p>
                        <div>
                            <a href="/" class="btn">Продовжити покупки</a>
                            <a href="/cart/checkout" class="btn">Оформити замовлення</a>
                        </div>
                    </div>
                </div>
            </footer>

    </div>


@stop