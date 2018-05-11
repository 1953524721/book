<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="{{asset('index/login/css/bootstrap.min.css')}}" rel="stylesheet" />
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default" style="margin-top: 150px;">
<div class="panel-heading">
<h3 class="panel-title">密码修改</h3>
</div>
<div class="panel-body">
<form  method="post"  action="pwdUp">
    <fieldset>
        <div class="form-group">
            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
            <input class="form-control" placeholder="旧密码" name="old_pwd" type="password" value="">
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="新密码" name="new_pwd1" type="password" value="">
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="新密码" name="new_pwd2" type="password" value="">
        </div>
        <input type="submit" value="登录" class="btn btn-lg btn-success btn-block">
    </fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
<script language="JavaScript" src="{{URL::asset('/')}}jq.js"></script>
</html>

