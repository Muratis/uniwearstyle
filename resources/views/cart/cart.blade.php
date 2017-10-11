@extends('layouts/layout')

@section('head_extra')
    <link rel="stylesheet" href="/css/catalog/cart/cart.css">
    <script language="javascript" src="/js/cart/cart.js"></script>

@stop

@section('content')


    <div class="container">
        <h1 class="wrapper">Ваша корзина</h1>
        {{--<form>--}}
            <table class="table">
                <thead class="table-header">
                <tr>
                    <th colspan="2" class="text-center">Продукт</th>
                    <th >Цена</th>
                    <th >Количество</th>
                    <th  >Всего</th>
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
                                <p>Размер: {{$cart->options->size}}</p>
                            </div>

                            <div>
                                <button class="btn delete" value="{{$cart->rowId}}">Убрать из корзины</button>
                                    {{--<input type="submit" class="btn" value="Убрать из корзины">--}}
                            </div>
                        </td>
                        <td  class="totalQty">{{$cart->price}} грн</td>
                        <td  class="totalQty">{{$cart->qty}} </td>
                        <td  class="totalQty">{{$cart->subtotal}} грн</td>




                    </tr>
                @endforeach
                {{csrf_field()}}
                </tbody>
            </table>

            <footer class="cart_footer">
                <h2 id="cl"></h2>
                <div class="float_rigth">
                    <div class="sumshop">
                        <span>За все</span>
                        <span> {{Cart::subtotal()}} грн</span>
                    </div>
                    <div class="button_cart">
                        <p>Стоимость доставки обсуждается по телефону</p>
                        <div>
                            <a href="/" class="btn">Продолжить покупки</a>
                            <input type="submit" value="Оформить заказ" class="btn">
                        </div>
                    </div>
                </div>
            </footer>
        {{--</form>--}}


    </div>



    {{--@foreach($carts as $cart)--}}
    {{--<div>--}}
    {{--<img src="/{{$cart->options->image}}" id="zoom" >--}}
    {{--</div>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<p><strong>{{$cart->name}}</strong></p>--}}


    {{--<p><strong>{{$cart->id}}</strong></p>--}}
    {{--</td>--}}
    {{--<td>грн {{$cart->price}}</td>--}}
    {{--<td>грн {{$cart->options->image}}</td>--}}
    {{--<td>грн {{$cart->subtotal}}</td>--}}
    {{--</tr>--}}
    {{--<input type="hidden" value="{{$cart->rowId}}">--}}
    {{--@endforeach--}}

@stop