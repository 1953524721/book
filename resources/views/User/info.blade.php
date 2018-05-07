<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息页</title>
    <style>
        tr{height: 50px;}
        .btn btn82 btn_save2{}
    </style>
    <link rel="stylesheet" href="{{asset('admins/user_info/common.css')}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/main.css')}}">
</head>
<body>
<center>
<h1>个人信息</h1>
<div id="table" class="mt10">
<div class="box span10 oh">
    <table width="75%" border="1" cellpadding="0" cellspacing="0" class="list_table">
        <tr>
            <th width="300">工作</th>
            <td><?php echo $data->info_work?></td>
        </tr>
        <tr>
            <th width="300">生日</th>
            <td><?php echo $data->info_birthday?></td>
        </tr>
        <tr>
            <th width="300">学校</th>
            <td><?php echo $data->info_school?></td>
        </tr>
        <tr>
            <th width="300">邮箱</th>
            <td><?php echo $data->info_email?></td>
        </tr>
        <tr>
            <th width="300">手机号</th>
            <td><?php echo $data->info_iphone?></td>
        </tr>
        <tr>
            <th width="300">个性签名</th>
            <td><?php echo $data->info_autograph?></td>
        </tr>
        <tr>
            <th width="300">个性说明</th>
            <td><?php echo $data->info_explain?></td>
        </tr>
        <tr>
            <td class="td_right"></td>
            <td class="">
                <input type="button" class="btn btn82 btn_save2" value="修改" id="gai">
            </td>
        </tr>
    </table>
</div>
</div>
</center>
</body>
</html>
