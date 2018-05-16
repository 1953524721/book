<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>侧边栏</title>
    <style>
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-image: url({{asset('admins/images/left.gif')}});

}

    </style>
    <link href="{{asset('admins/css/css.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
    <tr>
        <TD>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="207" height="55" background="{{asset('admins/images/nav01.gif')}}">

                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="25%" rowspan="2"><img src="{{asset('admins/images/ico02.gif')}}" width="35" height="35" /></td>
                                <td width="75%" height="22" class="left-font01">您好，<span class="left-font02"><?= $admin_name?></span></td>
                            </tr>
                            <tr>
                                <td height="22" class="left-font01">
                                    [&nbsp;<a href="{{ url('admin/Login/loginout')}}" target="_top" class="left-font01">退出</a>&nbsp;]</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--  任务系统开始    -->
            <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                <tr>
                    <td height="29">
                        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="8%"><img name="img8" id="img8" src="{{asset('admins/images/ico04.gif')}}" width="8" height="11" /></td>
                                <td width="92%">
                                    <a href="javascript:" target="mainFrame" class="left-font03" onClick="list('8');" >图书管理</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </TABLE>
            <table id="subtree8" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0"
                   cellspacing="0" class="left-table02">
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu20" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Book/add')}}" target="mainFrame" class="left-font03" onClick="tupian('20');">添加图书</a></td>
                </tr>
                <tr>
                    <td width="9%" height="21" ><img id="xiaotu21" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Book/show')}}" target="mainFrame" class="left-font03" onClick="tupian('21');">查看图书</a></td>
                </tr>
            </table>
            <!--  任务系统结束    -->



            <!--  消息系统开始    -->
            <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                <tr>
                    <td height="29">
                        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="8%"><img name="img7" id="img7" src="{{asset('admins/images/ico04.gif')}}" width="8" height="11" /></td>
                                <td width="92%">
                                    <a href="javascript:" target="mainFrame" class="left-font03" onClick="list('7');" >分类管理</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </TABLE>
            <table id="subtree7" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0"
                   cellspacing="0" class="left-table02">
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu17" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%">
                        <a href="{{url('admin/Classify/classify')}}" target="mainFrame" class="left-font03" onClick="tupian('17');">添加分类</a></td>
                </tr>
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu18" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%">
                        <a href="{{url('admin/Classify/show')}}" target="mainFrame" class="left-font03" onClick="tupian('18');">查看分类</a></td>
                </tr>
            </table>
            <!--  消息系统结束    -->
            <!--  审核开始    -->
            <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                <tr>
                    <td height="29">
                        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="8%"><img name="img9" id="img9" src="{{asset('admins/images/ico04.gif')}}" width="8" height="11" /></td>
                                <td width="92%">
                                    <a href="javascript:" target="mainFrame" class="left-font03" onClick="list('9');" >借书审核</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </TABLE>

            <table id="subtree9" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0"
                   cellspacing="0" class="left-table02">
                <tr>
                    <td width="9%" height="22" ><img id="xiaotu22" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Do/show')}}" target="mainFrame" class="left-font03"
                                       onClick="tupian('22');">借书列表</a></td>
                </tr>
                <tr>
                    <td width="9%" height="23" ><img id="xiaotu23" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Do/auditing')}}" target="mainFrame" class="left-font03"
                                       onClick="tupian('23');">还书列表</a></td>
                </tr>
            </table>


            <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                <tr>
                    <td height="29">
                        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="8%"><img name="img1" id="img1" src="{{asset('admins/images/ico04.gif')}}" width="8" height="11" /></td>
                                <td width="92%">
                                    <a href="javascript:" target="mainFrame" class="left-font03" onClick="list('1');" >后台用户管理</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </TABLE>
            <table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0"
                   cellspacing="0" class="left-table02">
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu1" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Admins/add')}}" target="mainFrame" class="left-font03" onClick="tupian('1');">添加用户</a></td>
                </tr>
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu4" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Admins/show')}}" target="mainFrame" class="left-font03" onClick="tupian('4');">查看用户</a></td>
                </tr>
            </table>
            <!--  项目系统结束    -->

            <!--  人员系统开始    -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
                <tr>
                    <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="8%" height="12"><img name="img3" id="img3" src="{{asset('admins/images/ico04.gif')}}" width="8" height="11" /></td>
                                <td width="92%"><a href="javascript:" target="mainFrame" class="left-font03" onClick="list('3');" >前台用户管理</a></td>
                            </tr>
                        </table></td>
                </tr>
            </table>

            <table id="subtree3" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
                <tr>
                    <td width="9%" height="20" ><img id="xiaotu8" src="{{asset('admins/images/ico06.gif')}}" width="8" height="12" /></td>
                    <td width="91%"><a href="{{url('admin/Users/show')}}" target="mainFrame" class="left-font03" onClick="tupian('8');">用户查看</a></td>
                </tr>

            </table>

            <!--  人员系统结束    -->
        </TD>
    </tr>

</table>
</body>
<script>
    function tupian(idt){
        var nametu="xiaotu"+idt;
        var tp = document.getElementById(nametu);
        tp.src="../images/ico05.gif";//图片ico04为白色的正方形

        for(var i=1;i<30;i++)
        {

            var nametu2="xiaotu"+i;
            if(i!=idt*1)
            {
                var tp2=document.getElementById('xiaotu'+i);
                if(tp2!=undefined)
                {tp2.src="{{asset('admins/images/ico06.gif')}}";}//图片ico06为蓝色的正方形
            }
        }
    }

    function list(idstr){
        var name1="subtree"+idstr;
        var name2="img"+idstr;
        var objectobj=document.all(name1);
        var imgobj=document.all(name2);


        //alert(imgobj);

        if(objectobj.style.display=="none"){
            for(i=1;i<10;i++){
                var name3="img"+i;
                var name="subtree"+i;
                var o=document.all(name);
                if(o!=undefined){
                    o.style.display="none";
                    var image=document.all(name3);
                    //alert(image);
                    image.src="{{asset('admins/images/ico04.gif')}}";
                }
            }
            objectobj.style.display="";
            imgobj.src="{{asset('admins/images/ico03.gif')}}";
        }
        else{
            objectobj.style.display="none";
            imgobj.src="{{asset('admins/images/ico04.gif')}}";
        }
    }
</script>
</html>
