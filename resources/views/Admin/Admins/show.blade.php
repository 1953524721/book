<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="csrf-token" content="{{csrf_token()}}">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>项目管理系统 by www.mycodes.net</title>
<style type="text/css">
<!--
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
.tabfont01 {
    font-family: "宋体";
    font-size: 9px;
    color: #555555;
    text-decoration: none;
    text-align: center;
}
.font051 {font-family: "宋体";
    font-size: 12px;
    color: #333333;
    text-decoration: none;
    line-height: 20px;
}
.font201 {font-family: "宋体";
    font-size: 12px;
    color: #FF0000;
    text-decoration: none;
}
.button {
    font-family: "宋体";
    font-size: 14px;
    height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;}
-->
</style>

<link href="{{asset('admins/css/css.css')}}" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

</script>
<link href="{{asset('admins/css/style.css')}}" rel="stylesheet" type="text/css" />
</head>
<SCRIPT language=JavaScript>
function sousuo(){
    window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
function selectAll(){
    var obj = document.fom.elements;
    for (var i=0;i<obj.length;i++){
        if (obj[i].name == "delid"){
            obj[i].checked = true;
        }
    }
}

function unselectAll(){
    var obj = document.fom.elements;
    for (var i=0;i<obj.length;i++){
        if (obj[i].name == "delid"){
            if (obj[i].checked==true) obj[i].checked = false;
            else obj[i].checked = true;
        }
    }
}

function link(){
    document.getElementById("fom").action="addrenwu.htm";
   document.getElementById("fom").submit();
}

</SCRIPT>

<body>
<form name="fom" id="fom" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="../images/nav04.gif">

           <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

          </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="40" class="font42">
                <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
                 <tr class="CTitle" >
                        <td height="22" colspan="7" align="center" style="font-size:16px">管理员信息列表</td>
                  </tr>

                  <tr bgcolor="#EEEEEE">

                    <td width="4%" align="center">ID</td>
                    <td width="8%" align="center">管理员名称</td>
                    <td width="9%" align="center">添加时间</td>
                    <td width="9%" align="center">最后登录时间</td>
                    <td width="3%" align="center">操作</td>
                  </tr>
                   <?php foreach ($data as $key => $value) { ?>


                  <tr bgcolor="#FFFFFF">

                    <td align="center"><?= $value['admin_id']?></td>
                    <td align="center"><?= $value['admin_name']?></td>
                    <td align="center"><?= $value['admin_addtime']?></td>
                    <td align="center"><?= $value['admin_lastlogintime']?></td>
                    <?php if($value['status']==1){ ?>
                    <td align="center"><font color="green" style="cursor: pointer" class="status"  p = "<?=$value['admin_id']?>" statu="0">启用</font></td>
                    <?php }else{ ?>
                    <td align="center"><font color="red" style="cursor: pointer" class="status"  p = "<?=$value['admin_id']?>" statu="1">未启用</font></td>
                    <?php } ?>
                  </tr>
                  <?php   } ?>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="../images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">

          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
<script src="{{asset('admins/js/jquery-1.8.3.min.js')}}" type="text/javascript"></script>
<script>
 $(document).on("click",".status",function(){
        var  id   = $(this).attr("p");
        var  display  = $(this).attr("statu");
        var _this = $(this);
        // alert(display);
        var _this = $(this);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type:"POST",
          url:"{{url('admin/Admins/up')}}",
          data:{id:id,display:display},
          success:function(res){
             if(res==1)
                {
                    if(display==0)
                    {
                        _this.attr("statu","1");
                        _this.attr("color","red");
                        _this.html("未启用");
                    }
                    else
                    {
                        _this.attr("statu","0");
                        _this.attr("color","green");
                        _this.html("启用");
                    }
                }
                else
                {
                    alert(res)
                }
          }
        })
 })
</script>
</html>
