<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          {{ csrf_field() }}

              <tr>
                <td height="40" class="font42">
                <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
                 <tr class="CTitle" >
                        <td height="22" colspan="7" align="center" style="font-size:16px">图书分类展示</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">

                    <td width="10%">所属分类</td>
                    <td width="10%">图书名称</td>
                    <td width="12%">操作</td>
                  </tr>
                  <?php foreach ($classify as $key => $v) { ?>
                  <tr bgcolor="#FFFFFF">

                    <td ><?= $v['classify_name']?></td>

                    <td>
                    <select name="" class="type" p="" where="">
                    <?php foreach ($books as $ke => $val){ ?>
                      <?php if($v['classify_id']==$val['classify_id']){ ?>
                      {
                        <option value="<?= $val['books_id']?>"><?= $val['books_name']?></option>
                      }
                      <?php }?>
                      }
                    <?php } ?>
                    </select>
                  </td>

                    <td><a href="{{url('admin/Classify/update')}}?classify_id=<?= $v['classify_id']?>&classify_name=<?= $v['classify_name']?>">编辑|</a>
                      <a class="red" href="javascript:;" onclick='javascript:if(confirm("删除分类是会将分类下的图书一并删除，您确定要删除吗?")){location.href="delete/{{$v['classify_id']}}"}' >删除
        </a></td>

                  </tr>
                   <?php }?>
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
<script src="{{asset('admins/js/jquery-3.0.0.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
</html>
