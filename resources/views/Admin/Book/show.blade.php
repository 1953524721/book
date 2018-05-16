<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <link href="{{asset('admins/css/style.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="fom" id="fom" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="30">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="62" background="{{asset('admins/images/nav04.gif')}}">

                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="24"><img src="{{asset('admins/images/ico07.gif')}}" width="20" height="18" /></td>
                                    <form action="" method="post">
                                    <td width="519"><label>图书名称:
                                            {{ csrf_field() }}
                                            <input name="name" type="text" nam="gongs" value="<?= $name?>" />
                                        </label>
                                        </input>
                                        <input name="Submit" type="submit" class="right-button02" value="查 询" />
                                    </td>
                                        </form>
                                    <td width="679" align="left"></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td></tr>
        <tr>
            <td><table id="subtree1"  width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
                                        <input name="Submit" type="button" id="del" class="right-button08" value="删除所选图书" />
                                        {{--<input name="Submit" type="button" class="right-button08" value="添加图书" onclick="link();" />--}}
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
                                            <tr>
                                                <td height="20" colspan="14" align="center" bgcolor="#EEEEEE"class="tablestyle_title">图书列表 &nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="3%" align="center" bgcolor="#EEEEEE">选择</td>
                                                <td width="10%" height="20" align="center" bgcolor="#EEEEEE">图书名称</td>
                                                <td width="12%" align="center" bgcolor="#EEEEEE">图书编号</td>
                                                <td width="10%" align="center" bgcolor="#EEEEEE">图书作者</td>
                                                <td width="15%" align="center" bgcolor="#EEEEEE">图书分类</td>
                                                <td width="20%" align="center" bgcolor="#EEEEEE">图书介绍</td>
                                                <td width="10%" align="center" bgcolor="#EEEEEE">添加时间</td>
                                                <td width="10%" align="center" bgcolor="#EEEEEE">图书状态</td>
                                                <td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
                                            </tr>
                                            <?php foreach ($data as $key => $val){?>
                                            <tr id="<?= $val['books_id']?>">
                                                <td bgcolor="#FFFFFF" align="center"><input type="checkbox" name="delid" value="<?= $val['books_id']?>"/></td>
                                                <td height="20" bgcolor="#FFFFFF"><a href="listyuangongmingxi.html"><?= $val['books_name']?></a></td>
                                                <td bgcolor="#FFFFFF"><a href="listyuangongmingxi.html"><?= $val['books_sn']?></a></td>
                                                <td height="20" bgcolor="#FFFFFF"><?= $val['books_author']?></td>
                                                <td bgcolor="#FFFFFF"><?= $val['classify_name']?></td>
                                                <td bgcolor="#FFFFFF"><?= $val['books_info']?></td>
                                                <td bgcolor="#FFFFFF" align="center"><?= $val['add_time']?></td>
                                                <?php if($val['books_status']==1){?>
                                                <td bgcolor="#FFFFFF" align="center"><a href="javascript:void(0)">上架</a></td>
                                                <?php }else{?>
                                                <td bgcolor="#FFFFFF" align="center"><a href="javascript:void(0)">下架</a></td>
                                                <?php }?>
                                                <td bgcolor="#FFFFFF" align="center"><a href="{{url('admin/Book/update')}}?books_id=<?= $val['books_id']?>">编辑</a></td>
                                            </tr>
                                            <?php }?>

                                        </table></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="6"><img src="{{asset('admins/images/spacer.gif')}}" width="1" height="1" /></td>
                    </tr>
                    <tr>
                        <?php if($type==0){?>
                        <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
                                <tr>
                                    <td width="50%">共 <span class="right-text09"><?= $last?></span> 页 | 第 <span class="right-text09"><?= $page?></span> 页</td>
                                    <td width="49%" align="right">[<a href="{{url('admin/Book/show')}}?page=<?= $first?>" class="right-font08">首页</a> | <a href="{{url('admin/Book/show')}}?page=<?= $up?>" class="right-font08">上一页</a> | <a href="{{url('admin/Book/show')}}?page=<?= $next?>" class="right-font08">下一页</a> | <a href="{{url('admin/Book/show')}}?page=<?= $last?>" class="right-font08">末页</a>]</td>
                                    <td width="1%"><table width="20" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                {{--<td width="1%"><input name="textfield3" type="text" class="right-textfield03" size="1" /></td>--}}
                                                {{--<td width="87%"><input name="Submit23222" type="submit" class="right-button06" value=" " />--}}
                                                {{--</td>--}}
                                            </tr>
                                        </table></td>
                                </tr>
                            </table>
                        </td>
                        <?php }?>
                    </tr>
                </table></td>
        </tr>
    </table>
    <input type="hidden" name="_token" id="sc" value="<?= csrf_token(); ?>">
</form>
</body>
<script src="{{asset('admins/js/jquery-1.8.3.min.js')}}"></script>
<script>
    $(document).on("click","#del",function () {
        var cs=$("#sc").val();
        var arr =[];
        $('input[name="delid"]:checked').each(function(){
            arr.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "{{url('admin/Book/del')}}",
            data: {id:arr,_token:cs},
            success: function(msg){
                if(msg==1){
                    $('input[name="delid"]:checked').each(function(){
                        $(this).parent().parent().remove();
                    });
                }
            }
        });
    })
</script>
<script language=JavaScript>
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

    {{--function link(){--}}
        {{--document.getElementById("fom").action="{{url('admin/Book/add')}}";--}}
        {{--document.getElementById("fom").method="get";--}}
        {{--document.getElementById("fom").submit();--}}
    {{--}--}}

</script>
</html>