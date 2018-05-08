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
        tr,td{height: 50px;}
        td{line-height: 50px;text-align: center;}
        .status{color: red}
        .statu{color: green}
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
    @foreach ($log as $key =>$row)
        <tr>
            <td>{{$row->book_name}}</td>
            <td>{{$row->read_time}}</td>
            <td>
                @if($row->end_time=="")
                    <span class="status">未归还</span>
                @else
                    {{$row->end_time}}
                @endif
            </td>
            <td>
               @if($row->status == 0)
                    <span class="status">未还</span>
               @else
                    <span class="statu">已还</span>
               @endif
            </td>
        </tr>
    @endforeach
</table>
</div>
</div>
</center>
</body>
<script language="JavaScript" src="{{ URL::asset('/') }}jq.js"></script>
</html>
