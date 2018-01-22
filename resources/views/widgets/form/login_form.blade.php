<?php
$error_class = $errors->has('email') ? ' has-error' : '';
?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="email"  placeholder="Email"class="form-control {{$error_class}}">
</div>
<span class="help-block">{!! $errors->first('email') !!}</span>


<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password"  placeholder="Пароль"  class="form-control {{$error_class}}">

</div>
<span class="help-block">{!! $errors->first('password') !!}</span>

<input type="submit" value="Увійти" class="btn btn-lg  btn-block">