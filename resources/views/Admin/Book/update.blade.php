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
                <th class="tablestyle_title" >修改图书</th>
            </tr>
            <tr>
                <td class="CPanel">
                    {{ csrf_field() }}
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                            <td width="100%">
                                <fieldset style="height:100%;">
                                    <legend>修改图书</legend>
                                    <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td nowrap align="right" width="13%">图书名称:</td>
                                            <td width="41%"><input name="books_name" value="<?= $book_data['books_name']?>" id="book_name" class="text" style="width:250px" type="text" size="40" />
                                                <span class="red"> *</span></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书作者:</td>
                                            <td><input name="books_author" id="books_author" value="<?= $book_data['books_author']?>" class="text" style="width:154px" /></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书数量:</td>
                                            <td><input name="books_num" id="book_num" class="text" value="<?= $book_data['books_num']?>" style="width:154px" /></td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">图书类型:</td>
                                            <td>

                                                <select name="classify_id" id="type">
                                                    <option  selected="selected" value="0">==请选择==</option>
                                                    <?php foreach ($data as $key => $val){ ?>
                                                    <option value="<?= $val['classify_id']?>" <?php if($book_data['classify_id']==$val['classify_id']){?>selected<?php }?> ><?= $val['classify_name']?></option>
                                                    <?php  }?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right">添加状态:</td>
                                            <td>
                                                <input type="radio" name="books_status" value="1" <?php if($book_data['books_status']==1){?>checked<?php }?> >上架
                                                <input type="radio" name="books_status" value="0" <?php if($book_data['books_status']==0){?>checked<?php }?>>下架
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap align="right" height="120px">图书介绍:</td>
                                            <td colspan="3"><textarea id="textarea" name="books_info" rows="5" cols="80"><?= $book_data['books_info']?></textarea></td>
                                        </tr>
                                        <input type="hidden" id="books_id" name="books_id" value="<?= $book_data['books_id']?>">
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
                    <input type="hidden" name="_token" id="sc" value="<?= csrf_token(); ?>">
                    <input type="button" name="Submit" value="保存" class="button" id="tj"/>　
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
    $(document).on("click","#tj",function () {
        var name=$("#book_name").val();
        var author=$("#books_author").val();
        var book_num=$("#book_num").val();
        var type=$("#type").val();
        var status=$("input[name='books_status']:checked").val();
        var textarea=$("#textarea").val();
        var cs=$("#sc").val();
        var books_id=$("#books_id").val();
        $.ajax({
            type: "POST",
            url: "{{url('admin/Book/update')}}",
            data: {books_id:books_id,books_name:name,classify_id:type,books_num:book_num,books_author:author,books_info:textarea,books_status:status,_token:cs},
            success: function(msg){
                if(msg==1){
                  alert("修改成功")
                }
            }
        });
        //window.history.back(0);
    })
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