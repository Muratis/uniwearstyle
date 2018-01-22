@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="omb_login">
            <h3 class="omb_authTitle">Обновление пароля</h3>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">
                    {!! Form::open(['class' => 'omb_loginForm']) !!}
                    {{csrf_field()}}
                    @include('errors.errmsg')
                    @include('widgets.form.resetComplete_form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop