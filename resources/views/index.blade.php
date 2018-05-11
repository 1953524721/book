<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="{{asset('index/css/templatemo_style.css')}}" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <li><a href="" class="current">欢迎进入图书管理主页面</a></li>
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
        <!--此处是搜索框 -->
        <div >

            
        </div>
    </div> <!-- end of header -->

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
          <img src="{{asset('index/images/templatemo_image_01.jpg')}}" alt="image" />
                <div class="product_info">
                    <p><?=$val['books_info']?></p>
                    <div class="buy_now_button"><a href="subpage.html">现在借阅</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
            <?php } ?>

            {{--<div class="cleaner_with_width">&nbsp;</div>--}}

            {{--<div class="templatemo_product_box">--}}
                {{--<h1>Cooking  <span>(by New Author)</span></h1>--}}
            {{--<img src="{{asset('index/images/templatemo_image_02.jpg')}}" alt="image" />--}}
                {{--<div class="product_info">--}}
                    {{--<p>Aliquam a dui, ac magna quis est eleifend dictum.</p>--}}
                    {{--<h3>$35</h3>--}}
                    {{--<div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>--}}
                    {{--<div class="detail_button"><a href="subpage.html">Detail</a></div>--}}
                {{--</div>--}}
                {{--<div class="cleaner">&nbsp;</div>--}}
            {{--</div>--}}

            {{--<div class="cleaner_with_height">&nbsp;</div>--}}

            {{--<div class="templatemo_product_box">--}}
                {{--<h1>Gardening <span>(by Famous Author)</span></h1>--}}
          {{--<img src="{{asset('index/images/templatemo_image_01.jpg')}}" alt="image" />--}}
                {{--<div class="product_info">--}}
                    {{--<p>Ut fringilla enim sed turpis. Sed justo dolor, convallis at.</p>--}}
                    {{--<h3>$65</h3>--}}
                    {{--<div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>--}}
                    {{--<div class="detail_button"><a href="subpage.html">Detail</a></div>--}}
                {{--</div>--}}
                {{--<div class="cleaner">&nbsp;</div>--}}
            {{--</div>--}}

            {{--<div class="cleaner_with_width">&nbsp;</div>--}}

            {{--<div class="templatemo_product_box">--}}
                {{--<h1>Sushi Book  <span>(by Japanese Name)</span></h1>--}}
                {{--<img src="{{asset('index/images/templatemo_image_01.jpg')}}" alt="image" />--}}
                {{--<div class="product_info">--}}
                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>--}}
                    {{--<h3>$45</h3>--}}
                    {{--<div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>--}}
                    {{--<div class="detail_button"><a href="subpage.html">Detail</a></div>--}}
                {{--</div>--}}
                {{--<div class="cleaner">&nbsp;</div>--}}
            {{--</div>--}}

            <div class="cleaner_with_height">&nbsp;</div>

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
<script src="{{asset('js/vue.min.js')}}"></script>


</html>