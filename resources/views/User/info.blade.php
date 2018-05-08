<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息页</title>
    <link rel="stylesheet" href="{{asset('admins/user_info/common.css')}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/main.css')}}">
    <style>
        body{background-color: #F2EBE5}
        tr{height: 50px;}
        .a{width: 75%;height: 100px;background-color: #8D6661;}
        .a1{width: 75%;height: 50%;background-color: blue;}
        .a2{width: 75%;height: 50%;background-color: yellow;}
        .a_21{width: 33.3%;height: 100%;background-color:pink;float: left;line-height: 50px}
    </style>
</head>
<body>
<center>
<div class="a">
    <div class="a1"><h1>个人信息</h1></div>
    <div class="a2">
        <div class="a_21"><span></span></div>
        <div class="a_21"><span style="cursor: pointer" class="jie">借书历史</span></div>
        <div class="a_21"></div>
    </div>
</div>
<div id="table" class="mt10">
<div class="box span10 oh">
    <table width="75%" id="tbStu" border="1" cellpadding="0" cellspacing="0" class="list_table">
        <tr>
            <th width="300">工作</th>
            <td><?= $data->info_work?></td>
        </tr>
        <tr>
            <th width="300">生日</th>
            <td><?= $data->info_birthday?></td>
        </tr>
        <tr>
            <th width="300">学校</th>
            <td><?= $data->info_school?></td>
        </tr>
        <tr>
            <th width="300">邮箱</th>
            <td><?= $data->info_email?></td>
        </tr>
        <tr>
            <th width="300">手机号</th>
            <td><?= $data->info_iphone?></td>
        </tr>
        <tr>
            <th width="300">个性签名</th>
            <td><?= $data->info_autograph?></td>
        </tr>
        <tr>
            <th width="300">个性说明</th>
            <td><?= $data->info_explain?></td>
        </tr>
        <tr>
            <td class="td_right"></td>
            <td class="">
                <input type="button" class="btn btn82 btn_save2" p="" value="修改" id="gai">
            </td>
        </tr>
    </table>
</div>
</div>
</center>
</body>
<script language="JavaScript" src="{{ URL::asset('/') }}jq.js"></script>
<script type="text/javascript">
    $("#gai").on("click",function () {
        location.href=("update");
    })
    $(".jie").on("click",function () {
        location.href=("reading");
    })
</script>
</html>
