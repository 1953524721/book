<?php header("content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>书籍还书信息</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/common.css')}}">
    <link rel="stylesheet" href="{{asset('admins/user_info/main.css')}}">
    <style>
        body{background-color: #F2EBE5}
        tr,td{height: 50px;}
        td{line-height: 50px;text-align: center;}
        span{cursor: pointer}
    </style>
</head>
<body>
<center>
    <div><h1>书籍还书信息</h1></div>
<div id="table" class="mt10">
<div class="box span10 oh">
<table width="75%" id="tbStu" border="1" cellpadding="0" cellspacing="0" class="list_table">
    <tr>
        <th>还书人</th>
        <th>还书名称</th>
        <th>操作</th>
    </tr>
    @foreach($data as $key => $value)
        <tr>
            <td>{{$value->user_name}}</td>
            <td>{{$value->books_name}}</td>
            <td>
                <span p="{{$value->examine_id}}" id="huan">点击还书</span>
            </td>
        </tr>
    @endforeach
</table>
</div>
</div>
</center>
</body>
<script language="JavaScript" src="{{URL::asset('/')}}jq.js"></script>
<script type="text/javascript">
    $(document).on("click","#huan",function () {
        var like = confirm("确定");
        var _this= $(this);
        var p    = $(this).attr("p");
        if(like==true)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"exaup",
                data:{p:p},
                dataType:"json",
                success:function (res)
                {
                   if(res==1)
                   {
                       console.log(res);
                        _this.parent().parent().remove();
                   }
                   else
                   {
                       console.log(res);
                   }
                }
            })
        }
        else
        {
            console.log(false);
        }
    })

</script>
</html>