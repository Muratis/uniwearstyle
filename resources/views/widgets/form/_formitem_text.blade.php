<?php
if(! isset($value)) $value = null;
$error_class = $errors->has('email') ? ' has-error' : '';
?>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" name="email" value="{{$value}}" placeholder="Email"class="form-control {{$error_class}}">
</div>
<span class="help-block">{!! $errors->first('email') !!}</span>