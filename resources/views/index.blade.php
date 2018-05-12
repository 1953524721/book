<?php
use Symfony\Component\HttpFoundation\Session\Session;
$user = new Session();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('index/css/templatemo_style.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #stext{
            margin-top: 4px;
            margin-left: 270px;
            border-radius: 10px;
        }
        #ibutton{
           border-radius: 10px;
            background-color: #F7B96F;
            margin-left: 50px;
        }
    </style>

</head>
<body id="body">
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <?php if(empty($user->get("user_name"))){ ?>
            <li><a href="{{('Login/index')}}">现在去登录</a></li>
            <li><a href="{{('Register/index')}}">现在去注册</a></li>
            <?php }else{ ?>
            <li><a href="" class="current">欢迎<font color="red"><?php echo $user->get("user_name")  ?></font></a></li>
            <li><a href="{{('user/info')}}">个人中心</a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="templatemo_header" style="background: url({{asset('index/images/templatemo_header_bg.jpg')}});">
        <div id="templatemo_special_offers">
            <p>
                <span>25%</span> discounts for
        purchase over $80
            </p>
            <a href="" style="margin-left: 50px;">了解详情...</a>
        </div>


        <div id="templatemo_new_books">
            <ul>
            <!-- 此处是新书上架 -->
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="" style="margin-left: 50px;">了解详情...</a>
        </div>


    </div> <!-- end of header -->
    <!--此处是搜索框 -->
    <form action=""  method="post">
    <div id="divse" style="height: 30px;line-height: 30px;" >
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        <input type="text" id="stext" name="serch" value="<?php echo $data['p']['serch']?>">
        <input type="submit" value="查询" id="ibutton">
        <span  style="margin-left: 50px;">
            <input type="radio" name="order" value="desc" <?php if($data['p']['order']=="desc"){echo "checked";} ?>>正序
            <input type="radio" name="order" value="asc" <?php if($data['p']['order']=="asc"){echo "checked";} ?>>倒叙
        </span>
    </div>
    </form>
    <div id="templatemo_content">

        <div id="templatemo_content_left">
            <div class="templatemo_content_left_section">
                <h1>图书分类</h1>
                <ul>
                <!-- 此处遍历图书分类 -->
                    <?php foreach ($data['classify'] as $key=>$val){ ?>
                    <li><a href="javascript:void(0)"><?= $val['classify_name']?></a></li>
                    <?php  } ?>
                </ul>
            </div>




            <div class="templatemo_content_left_section">
          <!--       <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a> -->
            </div>
        </div> <!-- end of content left -->

        <div id="templatemo_content_right" style="background: url({{asset('index/images/templatemo_h1_bg.jpg')}});">
        <!-- 此处遍历图书封面详情作者以及价格等等 -->
            <?php foreach ($data['books'] as $key=>$val){ ?>
            <div class="templatemo_product_box">
                <h1><?= $val['books_name']?>  <span>(<?= $val['books_author']?>)</span></h1>
          <img src="<?php echo $val['books_img'] ?>" alt="image" height="150px;" />
                <div class="product_info">
                    <p><?=$val['books_info']?></p>
                    <p>剩余：<?= $val['books_num']?>本</p>
                    <div class="buy_now_button"><a href="Javascript:void(0)" where="<?= $val['books_id']?>" id="jy">现在借阅</a></div>
                </div>
                <div class="cleaner"></div>
            </div>
            <?php } ?>
            <div class="cleaner_with_height">&nbsp;</div>
        <div style="height: 50px;  line-height: 50px; text-align: center;" id="pagediv">
            <a href="?page=<?php echo $data['p']['first'] ?>&serch=<?php echo $data['p']['serch'] ?>&order=<?php echo $data['p']['order'] ?>">首页</a>
            <a href="?page=<?php echo $data['p']['up'] ?>&serch=<?php echo $data['p']['serch'] ?>&order=<?php echo $data['p']['order'] ?>" >上一页</a>
            <a href="?page=<?php echo $data['p']['next'] ?>&serch=<?php echo $data['p']['serch'] ?>&order=<?php echo $data['p']['order'] ?>" >下一页</a>
            <a href="?page=<?php echo $data['p']['last'] ?>&serch=<?php echo $data['p']['serch'] ?>&order=<?php echo $data['p']['order'] ?>">尾页</a>
        </div>
            <!-- a href="subpage.html"><img src="{{asset('index/images/templatemo_ads.jpg')}}" alt="ads" /></a> -->
        </div> <!-- end of content right -->

        <div class="cleaner_with_height">&nbsp;</div>

    </div> <!-- end of content -->

    <div id="templatemo_footer">

           <a href="">Search</a> | <a href="">Books</a> | <a href="#">About Us</a><br />
        Copyright © 2018 <a href="#"><strong>图书管理系统</strong></a>  </div>
    <!-- end of footer -->

</div> <!-- end of container -->
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
    $(document).on("click","#jy",function () {
        var books_id = $(this).attr("where");
        $.ajax({
            type: "get",
            url: "{{('user/borrowBooks')}}",
            data: {books_id:books_id},
            dataType:"json",
            success: function(msg){
                // console.log(msg);
                if(msg.e==0){
                    alert(msg.m)
                    return
                }
                if(msg.e==3){
                    alert(msg.m)
                    location.href="{{('Login/index')}}"
                }else{
                    alert(msg.m)
                }

            }
        })


    })

</script>
</html>