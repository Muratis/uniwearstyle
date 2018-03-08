@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="omb_login">
            <h3 class="omb_authTitle">Увійти або <a href="{{URL::to('/register')}}">
                    зареєструватися</a></h3>
            {{--@include('auth.social_buttons')--}}
            {{--<div class="row omb_row-sm-offset-3 omb_loginOr">--}}
            {{--<div class="col-xs-12 col-sm-6">--}}
            {{--<hr class="omb_hrOr">--}}
            {{--<span class="omb_spanOr">або</span>--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    <form action="{{url('/login')}}" method="post" class="omb_loginForm">
                        {{csrf_field()}}
                        @include('errors.errmsg')
                        @include('widgets.form.login_form')
                    </form>


                </div>
            </div>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    <p class="omb_forgotPwd">
                        <a href="{{URL::to('/reset')}}">
                            Забули пароль?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop