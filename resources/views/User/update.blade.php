<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息页</title>
    <link rel="stylesheet" href="{{asset('admins/user_info/common.css')}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/main.css')}}">
    <style>
        tr{height: 50px;}
        .a{width: 75%;height: 100px;background-color: red;}
        .input-text{height: 40px; width: 75%;}
        .input-text, #eamil,inpu{
            border: 1px solid #bac7d2;
            background: #f7fcfe;/* #f7fcfe #f3fafd*/
            border-radius: 2px;
            box-shadow: 2px 2px 2px #e7f1f7 inset;
        }
        .lh30 {line-height: 40px; }
    </style>
</head>
<body>
<center>
<div class="a"><h1>个人信息修改</h1></div>
<div id="table" class="mt10">
<div class="box span10 oh">
<form action="up" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
<table width="75%" border="1" cellpadding="0" cellspacing="0" class="list_table">
<tr>
    <th width="300">工作</th>
    <td><input type="text" class="input-text lh30" name="work" value="{{$data->info_work}}"
        placeholder="工作"></td>
</tr>
<tr>
    <th width="300">生日</th>
    <td><input type="date" name="birthday" value="{{$data->info_birthday}}"></td>
</tr>
<tr>
    <th width="300">学校</th>
    <td><input type="text" class="input-text lh30" name="school" placeholder="学校" value="{{ $data->info_school}}" maxlength="20" minlength="2"></td>
</tr>
<tr>
    <th width="300">邮箱</th>
    <td><input type="eamil" id="eamil" class="input-text lh30" placeholder="邮箱" name="eamil" value="{{ $data->info_email}}">
        <span class="eamil"></span>
    </td>
</tr>
<tr>
    <th width="300">手机号</th>
    <td><input type="tel"  class="input-text lh30" name="iphone" placeholder="邮箱" id="phone" value="{{ $data->info_iphone}}">
        <sapn class="phone"></sapn></td>
</tr>
<tr>
    <th width="300">个性签名</th>
    <td><input type="text"  class="input-text lh30" name="autograph" placeholder="个性签名" maxlength="200" minlength="4" value="{{ $data->info_autograph}}"></td>
</tr>
<tr>
    <th width="300">个人说明</th>
    <td><input type="text"  class="input-text lh30" name="explain" placeholder="个人说明" maxlength="200" minlength="4" value="{{ $data->info_explain}}"></td>
</tr>
<tr>
    <td class="td_right"></td>
    <td class="">
        <input type="submit" name="" class="btn btn82 btn_save2" value="保存">
        <input type="reset" name="" class="btn btn82 btn_res" value="重置">
    </td>
</tr>
</table>
</form>
</div>
</div>
</center>
</body>
<script language="JavaScript" src="{{ URL::asset('/') }}jq.js"></script>
<script type="text/javascript" src="{{URL::asset('/')}}js/update.js"></script>
</html>

