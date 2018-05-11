<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\RegisterModel;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use DB;
class RegisterController  extends Controller {
    //注册显示页面
    public  $Model;
    public  $Session;
    public function __construct(){
        $this->Model   = new  RegisterModel();
        $this->Session = new Session();
    }
    function xss($type){
        $str = trim($type);              //清理空格
        $str = strip_tags($str);         //过滤html标签
        $str = htmlspecialchars($str);   //将字符内容转化为html实体
        $str = addslashes($str);
        return $str;
    }
    public function index(){
        //前台注册页面！
        return view("Register/register");
    }
    public function Register(){
        //ajax接值
        $phone   =  $this->xss(Input::get("pNum"));
        //调用M层历史数据
        $getCode =  $this->Model->getCode($phone);
        //不等于空
        if(!empty($getCode)){
            //获取当前时间-历史添加时间
            $ifTime = time() - $getCode->add_time  ;
            //小于30秒频繁操作
            if($ifTime<=30){
                exit(json_encode(array("e"=>0,"m"=>"操作过于频繁。30秒后再试")));
            }
        }
        //调用短信接口
        $res  = $this->phone($phone);
        //判断是否成功
        if($res[1]!="OK"){
            exit(json_encode(array("e"=>1,"m"=>"发送失败请稍后再试")));
        }else{
            //添加入库
            $insertCodeArr = array(
                "add_time"=>time(),
                "code_num"=>$res['code_num'],
                "phone_num"=>$phone
            );
            $this->Model->insertCode($insertCodeArr);
            exit(json_encode(array("e"=>"yes","m"=>"发送成功。请验证")));
        }
    }
    //注册执行页面
    public function OnlyUser(){
        $UserName   =  $this->xss(Input::get("user_name"));
        $UserArr =  $this->Model->getUserName($UserName);
        if(empty($UserArr)){
            exit(json_encode(array("e"=>"0","m"=>"可以使用")));
        }else{
            exit(json_encode(array("e"=>"1","m"=>"用户名已经存在")));
        }

    }
    //添加页面
    public function RegisterDo(){
        $allArr  =  Input::get();
        foreach ($allArr as $key =>$val){
            $post[$key] = $this->xss($val);
        }
        //读取发送验证码！
        $getCode =  $this->Model->getCode($post['pNum']);
        if(empty($getCode)){
            exit(json_encode(array("e"=>"10","m"=>"请发送验证码")));
        }else{
            //判断验证码
           if($post['code_num']!=$getCode->code_num){
               exit(json_encode(array("e"=>"11","m"=>"验证码错误")));
           }
        }
        //添加入库
        $insert = array(
            "user_name"=>$post['user_name'],
            "user_pwd"=>strrev(md5(hash("sha512",$post['user_pwd'])))
        );
        //入库
        $res =  $this->Model->insertUser($insert);
        if($res){
            //修改验证码状态
            $this->Model-> upPcode($getCode->code_id);
            exit(json_encode(array("e"=>"1","m"=>"注册成功")));
        }else{
            exit(json_encode(array("e"=>"2","m"=>"注册失败")));
        }

    }
























    function phone($iphone)
    {
        $code  = rand(000000,999999);
        $host    = "https://feginesms.market.alicloudapi.com";
        $path    = "/codeNotice";
        $method  = "GET";
        $appcode = "61734758d07c432aab909581a1bf074c";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys  = "param=$code&phone=$iphone&sign=1&skin=1";
        $bodys   = "";
        $url     = $host . $path . "?" . $querys;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $res = curl_exec($curl);
        $reg  = '#{"Message":".*","RequestId":".*","Code":"(.*)"}#';
        preg_match($reg,$res,$p);
        $p['code_num'] = $code;
        return $p;

    }


}