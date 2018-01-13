<?php
if(! isset($value)) $value = null;
$error_class = $errors->has('email') ? ' has-error' : '';
?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="email" value="{{$value}}" placeholder="Email"class="form-control {{$error_class}}">
</div>
<span class="help-block">{!! $errors->first('email') !!}</span>

<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="first_name" value="{{old('first_name')}}"  placeholder="Ваше ім'я"class="form-control {{$error_class}}">
</div>
<span class="help-block">{!! $errors->first('first_name') !!}</span>

<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Ваше призвище" class="form-control {{$error_class}}">
</div>

<span class="help-block">{!! $errors->first('last_name') !!}</span>

<?php
$error_class = $errors->has('password') ? ' has-error' : ''; ?>

<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password"  placeholder="Пароль"  class="form-control {{$error_class}}">

</div>
<span class="help-block">{!! $errors->first('password') !!}</span>

<?php
$error_class = $errors->has('password_confirm') ? ' has-error' : ''; ?>

<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password_confirm" placeholder="Подтверджение пароля"  class="form-control {{$error_class}}">

</div>
<span class="help-block">{!! $errors->first('password_confirm') !!}</span>

<input type="submit" value="Зареєструватися" class="btn btn-lg btn-primary btn-block">