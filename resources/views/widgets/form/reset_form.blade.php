<?php
$error_class = $errors->has('email') ? ' has-error' : '';
?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="email"  placeholder="Email"class="form-control {{$error_class}}">
</div>
<span class="help-block">{!! $errors->first('email') !!}</span>

<input type="submit" value="Скинути пароль" class="btn btn-lg  btn-block btnBlackForm">