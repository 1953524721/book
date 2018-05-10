<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员添加</title>
<link rel="stylesheet" rev="stylesheet" href="{{asset('admins/css/style.css')}}" type="text/css" media="all" />


<script language="JavaScript" type="text/javascript">
function tishi()
{
  var a=confirm('数据库中保存有该人员基本信息，您可以修改或保留该信息。');
  if(a!=true)return false;
  window.open("冲突页.htm","","depended=0,alwaysRaised=1,width=800,height=400,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}

function check()
{
document.getElementById("aa").style.display="";
}


function link(){
alert('保存成功！');
    document.getElementById("fom").action="xuqiumingxi.htm";
   document.getElementById("fom").submit();
}



</script>
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  <form action="" method="post" enctype="multipart/form-data" name="fom" id="fom" target="sypost" >
  {{ csrf_field() }}
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >管理员添加页面</th>
  </tr>
  <tr>
    <td class="CPanel">

        <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <TR>
            <TD width="100%">
                <fieldset style="height:100%;">
                <legend>管理员添加</legend>
                      <table border="0" cellpadding="2" cellspacing="1" style="width:100%">

                      <tr>
                        <td nowrap align="right" width="13%">管理员昵称:</td>
                        <td width="46%"><input class="text" style="width:300px" type="text" size="40" placeholder="请输入管理员昵称" name="admin_name" />
                        <span class="red"> *</span></td>
                        <td align="right" width="9%"></td>
                        <td width="32%">&nbsp;</td>
                        </tr>
                          <tr>
                        <td nowrap align="right" width="13%">管理员密码:</td>
                        <td width="46%"><input name="admin_psw" class="text" style="width:300px" type="password" size="40" placeholder="请输入管理员密码" />
                        <span class="red"> *</span></td>
                        <td align="right" width="9%"></td>
                        <td width="32%">&nbsp;</td>
                        </tr>
                      </table>
             <br />
                </fieldset>
            </TD>
        </TR>


        </TABLE>


     </td>
  </tr>
        <TR>
            <TD colspan="2" align="center" height="50px">
            <input type="submit" name="Submit" value="保存" class="button"/>　

            <input type="button" value="返回" class="button" onclick="window.history.go(-1);"/></TD>
        </TR>
        </TABLE>


     </td>
  </tr>
  </table>

</div>
</form>
</body>
</html>
