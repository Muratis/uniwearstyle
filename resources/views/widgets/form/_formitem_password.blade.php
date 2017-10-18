<?php
$error_class = $errors->has('password') ? ' has-error' : ''; ?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input type="password" name="password" placeholder="Пароль"  class="form-control {{$error_class}}">

</div>
<span class="help-block">{!! $errors->first('password') !!}</span>