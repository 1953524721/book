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
        <th>状态</th>
    </tr>
    @foreach ($log as $key =>$row)
        <tr>
            <td>
                @if(empty($row->book_name))
                    @else {{$row->book_name}} @endif</td>
            <td>
               @if($row->status == 0)
                    <span class="status" p="{{$row->book_id}}" style="cursor: pointer">申请还书</span>
               @elseif($row->status == 3)
                    <span class="status">归还等待管理员审核</span>
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
<script type="text/javascript">
    $(document).on("click",".status",function () {
        var id  =  $(this).attr("p");
        var _this = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:"turn",
            data:{id:id},
            dataType:"json",
            success:function (res)
            {
                _this.html("归还等待管理员审核");
            }
        })
    })
</script>
</html>
