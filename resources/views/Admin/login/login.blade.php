<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台管理员登录</title>
<style type="text/css">
<!--
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}
-->
</style>
<link href="{{asset('admins/css/css.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="147" background="{{asset('admins/images/top02.gif')}}"><img src="{{asset('admins/images/top03.gif')}}" width="776" height="147" /></td>
  </tr>
</table>
<table width="562" border="0" align="center" cellpadding="0" cellspacing="0" class="right-table03">
  <tr>
    <td width="221"><table width="95%" border="0" cellpadding="0" cellspacing="0" class="login-text01">

      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
          <tr>
            <td align="center"><img src="{{asset('admins/images/ico13.gif')}}" width="107" height="97" /></td>
          </tr>
          <tr>
            <td height="40" align="center">&nbsp;</td>
          </tr>

        </table></td>
        <td><img src="{{asset('admins/images/line01.gif')}}" width="5" height="292" /></td>
      </tr>
    </table></td>
    <form action="" method="post">
    {{ csrf_field() }}
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%" height="35" class="login-text02">用户名称：<br /></td>
        <td width="69%"><input name="admin_name" type="text" size="30" id="admin_name" />
        <span></span>
        </td>
      </tr>
      <tr>
        <td height="35" class="login-text02">密　码：<br /></td>
        <td><input name="admin_psw" type="password" size="33" id="admin_psw" /></td>
      </tr>
      <tr>
        <td height="35" class="login-text02">验证图片：<br /></td>
        <td><div>
        <img src="{{asset('code/code.php')}}" alt=""
         onclick="this.src='http://127.0.0.1/book/public/code/code.php?'+new Date().getTime();"
        title="点击更换验证码">

        <span id="span"></span>
       </div>
       </td>
      </tr>
        <tr>
        <td height="35" class="login-text02">验证码：<br /></td>
        <td><input name="code" type=text size="33"/></td>
      </tr>
      <tr>
      <tr>

        <td height="35">&nbsp;</td>
        <td><input  type="submit" class="right-button01" value="确认登陆" onClick="window.location='index.html'" />
          <input  type="submit" class="right-button02" value="重 置" /></td>
      </tr>
    </table></td>
  </tr>
</table>

    </form>
</body>
<script src="{{asset('admins/js/jquery-3.0.0.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
 <script type="text/javascript">
   $(document).on("blur","#admin_name",function(){

   })
 </script>
</html>