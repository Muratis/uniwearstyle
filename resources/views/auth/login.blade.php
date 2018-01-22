@extends('layouts.layout')
@section('body')
    <div class="container">
        <div class="omb_login">
            <h3 class="omb_authTitle">Войти или <a href="{{URL::to('/register')}}">зарегистрироваться</a></h3>
            @include('auth.social_buttons')
            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-6">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">или</span>
                </div>
            </div>

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
                        <a href="{{URL::to('/reset')}}">Забыли пароль?</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop