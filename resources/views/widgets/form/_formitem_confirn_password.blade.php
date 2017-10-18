<?php
$error_class = $errors->has('password_confirm') ? ' has-error' : ''; ?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password_confirm" placeholder="Подтверждние пароля"  class="form-control {{$error_class}}">

</div>
<span class="help-block">{!! $errors->first('password_confirm') !!}</span>