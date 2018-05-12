<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>图书分类添加</title>
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

</script>
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->
</style>
</head>

<body class="ContentBody">
  <form action="update_type" method="post" enctype="multipart/form-data" name="form">
  {{ csrf_field() }}
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >修改图书分类</th>
  </tr>
  <tr>
    <td class="CPanel">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
        <tr><td align="left">
        </td></tr>
                <TR>
            <TD width="100%">
                <fieldset style="height:100%;">
                <legend>图书分类修改</legend>
                      <table border="0" cellpadding="2" cellspacing="1" style="width:100%">

                      <tr>
                        <td nowrap align="right" width="15%">分类名称:</td>
                        <td width="35%"><input name='classify_name' type="text" class="text" style="width:154px" value="{{$data['classify_name']}}" placeholder="请输入要修改的图书分类名称" />
                        <span class="red">*</span></td>

                      </tr>
                      <tr><td><input type="hidden" name="classify_id" value="{{$data['classify_id']}}"></td></tr>
                      </table>
                      <br />
                </fieldset></TD>
        </TR>
        </TABLE>
     </td>
  </tr>

        <TR>
            <TD colspan="2" align="center" height="50px">
            <input type="submit" value="提交" class="button"/>　

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
