@extends('layouts.layout')
@section('head_extra')

    <script language="javascript" src="/js/dispatch.js"></script>
@stop

@section('content')
    <div class="container">
        <div class="omb_login">
            <h3 class="omb_authTitle">Зареєструватися або <a href="/" data-toggle="modal" data-target="#modal-1">ввійти</a></h3>
            @include('auth.social_buttons')
            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-6">


                    <hr class="omb_hrOr">
                    {{--<span class="omb_spanOr">або</span>--}}
                </div>
            </div>

            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    <form action="{{url('/register')}}" method="post" class="omb_loginForm">
                        <div class="input-group">
                            <label for="change_dispatch">Ви хочете получати уведомлення від Uniwear Style?</label>
                            <input type="checkbox" id="change_dispatch" name="change_dispatch">
                        </div>

                        <div class="input-group chande_university">
                            <p>Виберіть від яких університетов ви хочете получати увідомлення:</p>
                            <label for="kpi_dispatch">КПІ</label>
                            <input type="checkbox" value="kpi" name="universities[]">

                            <label for="nmu_dispatch">НМУ</label>
                            <input type="checkbox" value="nmu" name="universities[]">

                            <label for="nmu_dispatch">КНУ</label>
                            <input type="checkbox" value="knu" name="universities[]">
                        </div>
                        {{csrf_field()}}
                    @include('errors.errmsg')
                    @include('widgets.form.register_form', ['value' => $email])
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