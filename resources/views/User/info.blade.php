<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息页</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/common.css')}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/main.css')}}">
    <style>
        body{background-color: #F2EBE5}
        tr,td{height: 50px;}
        .color{color: red}
        .a_21{float: right;width: 50px;height: 50px;background-color: red}
    </style>
</head>
<body>
<center>
<div class="a">
    <div class="a1"><h1>个人信息</h1></div>
    <div class="a2">
		<table>
			<tr>
				<td></td>
			</tr>
			
			
		</table>
<!--
        <div class="a_21"><span style="cursor: pointer;color: red" class="pwd">修改密码</span></div>
        <div class="a_21"><span style="cursor: pointer" class="jie">借书历史</span></div>
        <div class="a_21"><span style="cursor: pointer"></span></div>
-->
    </div>
</div>
<div id="table" class="mt10">
<div class="box span10 oh">
    <table width="75%" id="tbStu" border="1" cellpadding="0" cellspacing="0" class="list_table">
        <tr>
            <th width="300">工作</th>
            <td>
                @if(empty($data->info_work))<span class="color">未填写</span>@else{{$data->info_work}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">生日</th>
            <td>
                @if(empty($data->info_birthday))<span class="color">未填写</span>@else{{$data->info_birthday}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">学校</th>
            <td>
                @if(empty($data->info_school))<span class="color">未填写</span>@else{{$data->info_school}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">邮箱</th>
            <td>
                @if(empty($data->info_email))<span class="color">未填写</span>@else{{$data->info_email}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">手机号</th>
            <td>
                @if(empty($data->info_iphone))<span class="color">未填写</span>@else{{$data->info_iphone}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">个性签名</th>
            <td>
                @if(empty($data->info_autograph))<span class="color">未填写</span>@else{{$data->info_autograph}}@endif
            </td>
        </tr>
        <tr>
            <th width="300">个性说明</th>
            <td>
                @if(empty($data->info_autograph))<span class="color">未填写</span>@else{{$data->info_explain}}@endif
            </td>
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
    $("#gai").on("click",function () { location.href=("update");}); $(".jie").on("click",function () {location.href=("reading");})
    $(".pwd").on("click",function () {
        location.href=("pwd");
    })
</script>
</html>
