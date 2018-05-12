<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" rev="stylesheet" href="{{asset('admins/css/style.css')}}" type="text/css" media="all" />
    <style type="text/css">
        <!--
        .atten {font-size:12px;font-weight:normal;color:#F00;}
        -->
    </style>
</head>
<body class="ContentBody">
<form action="" method="post" enctype="multipart/form-data" name="fom" id="fom" target="sypost" >
    <div class="MainDiv">
        <table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
            <tr>
                <th class="tablestyle_title" >添加图书</th>
            </tr>
            <tr>
                <td class="CPanel">
                        {{ csrf_field() }}
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                            <td width="100%">
                                <fieldset style="height:100%;">
                                    <legend>添加任务</legend>
                                    <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td nowrap align="right" width="13%">图书名称:</td>
                                            <td width="41%"><input name="books_name" id="book_name" class="text" style="width:250px" type="text" size="40" />
                                                <span class="red"> *</span></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right" width="13%">图书图片:</td>
                                            <td width="41%"><input name="pic" id="book_name" class="text" style="width:250px" type="file" size="40" />
                                                <span class="red"> *</span></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书作者:</td>
                                            <td><input name="books_author" id="books_author" class="text" style="width:154px" /></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书数量:</td>
                                            <td><input name="books_num" id="book_num" class="text" style="width:154px" /></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书类型:</td>
                                            <td>

                                                <select name="classify_id" id="type">
                                                    <option  selected="selected" value="0">==请选择==</option>
                                                    <?php foreach ($data as $key => $val){ ?>
                                                    <option value="<?= $val['classify_id']?>"><?= $val['classify_name']?></option>
                                                    <?php  }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">添加状态:</td>
                                            <td>
                                                <input type="radio" name="books_status" value="1" checked="checked">上架
                                                <input type="radio" name="books_status" value="0">下架
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right" height="120px">图书介绍:</td>
                                            <td colspan="3"><textarea id="textarea" name="books_info" rows="5" cols="80"></textarea></td>
                                        </tr>
                                    </table>
                                    <br />
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" height="50px">
                    <input type="submit" name="Submit" value="保存" class="button" id="tj"/>　
                    <input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
                </td>
            </tr>
        </table>
        </td>
        </tr>
        </table>
    </div>
</form>
</body>
<script src="{{asset('admins/js/jquery-1.8.3.min.js')}}"></script>
<script>
    $(document).on("submit","#fom",function () {
        var name=$("#book_name").val();
        if(name==""){
            alert("内容不能为空");
            return false;
        }else{
            return true;
        }

    })
</script>
</html>