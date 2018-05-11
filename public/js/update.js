$("#phone").on("keydown",function () {
    var reg   =/^1[3|4|5|7|8][0-9]\d{4,8}$/;
    var phone = $(this).val();
    if(phone.length == 11 ||!reg.test(phone)) {$(".phone").html("不合法");$(".btn").attr("type","button");}
    else {$(".phone").html("√");$(".btn_save2").attr("type","submit");}
})
$("#eamil").on("keydown",function () {
    var myreg = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
    var email = $(this).val();
    if(!myreg.test(email))
    {$(".eamil").html("不合法");$(".btn_save2").attr("type","button");}
    else{$(".eamil").html("√");}
})