<?php
$error_class = $errors->has('email') ? ' has-error' : '';
?>

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

<input type="submit" value="Підтвердити оновлення пароля" class="btn btn-lg  btn-block">