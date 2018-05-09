<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */

namespace App\Http\Controllers\Register;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
class RegisterController  extends Controller {
    //注册显示页面
    public function index(){
        return view("Register/register");
    }
    public function Register(){
        $phone  =  Input::get("pNum");
        $res  = $this->phone($phone);
        if($res[1]!="OK"){
            exit(json_encode(array("e"=>1,"m"=>"发送失败请稍后再试")));
        }else{
            $insertCodeArr = array(
                "add_time"=>time(),
                "code_num"=>$res['code_num'],
                "phone_num"=>$phone
            );
            print_r($insertCodeArr);die;
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