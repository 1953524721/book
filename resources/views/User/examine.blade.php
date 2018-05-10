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
        td{line-height: 50px;text-align: center;}
    </style>
</head>
<body>
<center>
    <div><h1>借书历史</h1></div>
    <div id="table" class="mt10">
        <div class="box span10 oh">
            <table width="75%" id="tbStu" border="1" cellpadding="0" cellspacing="0" class="list_table">
                <tr>
                    <th>书名</th>
                    <th>借书时间</th>
                    <th>归还时间</th>
                    <th>状态</th>
                </tr>
            </table>
        </div>
    </div>
</center>
</body>
<script language="JavaScript" src="{{ URL::asset('/') }}jq.js"></script>
</html>