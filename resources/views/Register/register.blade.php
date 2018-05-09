<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>



    <link href="{{asset('index/login/css/bootstrap.min.css')}}" rel="stylesheet" />

    {{--<!-- MetisMenu CSS -->--}}
    {{--<link href="../bower_components/metisMenu/dist/metisMenu.min.css{{asset('index/login/css/bootstrap.min.css')}}" rel="stylesheet">--}}

    {{--<!-- Custom CSS -->--}}
    {{--<link href="assets/css//sb-admin-2.css" rel="stylesheet">--}}

    {{--<!-- Custom Fonts -->--}}
	{{--<link rel="stylesheet" href="assets/css/font-awesome.min.css" />--}}


</head>

<body>
{{--<center>--}}
    {{--<h1>欢迎来到注册页面</h1>--}}
{{--</center>--}}

    <div class="container" style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">注册</h3>
                    </div>
                    <div class="panel-body">
                        {{--<form  method="post" action="Register">--}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="请输入用户名" id="user_name" value=""  type="text" onblur="getUser()" >
                                    <span id="name_info"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="请输入密码" id="user_pwd" type="password" value="" onblur="getPwd()">
                                    <span id="pwd_info"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="请输入手机号" id="phone_code" type="text" value=""  onblur="getPhone()" >
                                    <span id="phone_info"></span>
                                </div>
								<div class="form-group" style="height: 30px;">
                                   <!--  <input class="form-control" placeholder="确认密码" name="password" type="password" value=""> -->
                                   <input type="text" id="code_num" class="form-control" style="width: 150px; display: inline; float: left;" onblur="getCode()"
                                   placeholder="请输入验证码"
                                   >

                                   <input type="button" name="" class="form-control" style="width: 120px; float: left; 
                                   background-color:pink; display: inline; margin-left: 50px;" value="获取验证码" onclick="sendCode(this)" id="sendCode">

                                </div>
                                <span id="info" style="margin-top: 50px;"></span>
                                <input type="hidden" name="_token" value="<?= csrf_token(); ?>" id="_token">
                                <span id="code_info"></span>
                                <!-- Change this to a button or input when using this as a form -->
                                {{--<a href="login.html" class="">注册</a>--}}
                                <input type="button" class="btn btn-lg btn-success btn-block" value="注册" id="Register">

                            </fieldset>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


<script language="JavaScript" src="{{ URL::asset('/') }}jq.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $("#sendCode").click(function () {
        var pNum  = $("#phone_code").val();
        var _token  = $("#_token").val();
        var reg = /^1[3|4|5|7|8][0-9]\d{4,8}$/;
        if(pNum==''){
            $("#info").html("<font  color='red' size='2'>手机号不能为空</font>");
            a=0
        }else{
            if(!reg.test(pNum)){
                $("#info").html("<font  color='red' size='2'>请输入正确的手机号</font>");
                a=0
            }else{
                $.ajax({
                    type: "POST",
                    url: "Register",
                    data: {pNum:pNum},
                    dataType:"json",
                    success: function(msg){
                        if(msg.e=="yes"){
                            $("#info").html("<font  color='red' size='3'>"+msg.m+"</font>");
                            a=1
                        }else{
                            $("#info").html("<font  color='red' size='3'>"+msg.m+"</font>");
                            a=0
                        }

                    }
                });
            }
        }
    })
</script>
<script type="text/javascript">
    a = '';
    var clock = '';
    var nums = 30;
    var btn;
    function sendCode(thisBtn) {
        btn = thisBtn;
        btn.disabled = true; //将按钮置为不可点击
        btn.value = '重新获取（'+nums+'）';
        clock = setInterval(doLoop, 1000); //一秒执行一次
    }

    function doLoop() {
        nums--;
        if (nums > 0) {
            btn.value = '重新获取（'+nums+'）';
        } else {
            clearInterval(clock); //清除js定时器
            btn.disabled = false;
            btn.value = '点击发送验证码';
            nums = 30; //重置时间
        }
    }
    $(document).ready(function(){
        $("#login_QQ").click(function(){
            alert("暂停使用！");
        });
        $("#login_WB").click(function(){
            alert("暂停使用！");
        });
    });


   function getUser(){
       var  user_name   = $("#user_name").val();
       var  reg = /^\w{6,10}$/
       if(user_name==''){
           $("#name_info").html("<font  color='red' size='2'>用户名不能为空</font>");
               a=0
       }else{
           if(!reg.test(user_name)){
               $("#name_info").html("<font  color='red' size='2'>用户名6-10位</font>");
               a=0
           }else{
               $.ajax({
                   type: "POST",
                   url: "OnlyUser",
                   data: {user_name:user_name},
                   dataType:"json",
                   success: function(msg){
                      if(msg.e==0){
                          a=1
                          $("#name_info").html("");
                      }else{
                          a=0
                          $("#name_info").html("<font  color='red' size='2'>"+msg.m+"</font>");
                      }

                   }

               });
               $("#name_info").html("");

           }
       }
   }
    function getPwd(){
        var  user_pwd   = $("#user_pwd").val();
        var  reg = /^\w{6,10}$/
        if(user_pwd==''){
            a=0
            $("#pwd_info").html("<font  color='red' size='2'>密码不能为空</font>");
        }else{
            if(!reg.test(user_pwd)){
                a=0
                $("#pwd_info").html("<font  color='red' size='2'>密码6-10位</font>");
            }else{
                a=1
                $("#pwd_info").html("");
            }
        }

    }
    function getPhone() {
        var pNum  = $("#phone_code").val();
        var reg = /^1[3|4|5|7|8][0-9]\d{4,8}$/;
        if(pNum==''){
            $("#phone_info").html("<font  color='red' size='2'>手机号不能为空</font>");
            a=0
        }else{
            if(!reg.test(pNum)){
                $("#phone_info").html("<font  color='red' size='2'>请输入正确的手机号</font>");
                a=0
            }else{
                a=1
                $("#phone_info").html("");
            }
        }
    }
    $("#Register").click(function () {
        getPwd();
        getUser();
        getPhone();

        $("#sendCode").trigger("click");



            var  user_name   = $("#user_name").val();
        var  user_pwd    = $("#user_pwd").val();
        var  code_num    = $("#code_num").val();
        var       pNum   = $("#phone_code").val();

        if(a==1){
            $.ajax({
                type: "POST",
                url: "RegisterDo",
                data: {user_name:user_name,user_pwd:user_pwd,code_num:code_num,pNum:pNum},
                dataType:"json",
                success: function(msg){
                    if(msg.e==1){
                        location.href ="{{url('Login/index')}}";
                    }else{
                        alert(msg.m)
                    }

                }
            });
        }

    })
</script>
</html>
