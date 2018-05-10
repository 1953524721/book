<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Model\LoginModel;
use Illuminate\Support\Facades\Input;
use DB;
class LoginController  extends Controller {
    //注册显示页面
    public  $Model;
    public  $Session;
    public function __construct(){
        $this->Session = new Session();
        $this->Model   = new LoginModel();
    }
    public function index(){
        return view("Login/login");
    }
    public function Login(){
        $user_name =  $this->xss(Input::get("user_name"));
        $user_pwd  =  $this->xss(Input::get("user_pwd"));
        $UserArr   =  $this->Model->getUser($user_name);
        if($UserArr->user_status>=3){
            exit("<script>alert('该账号已被冻结。。。');location.href='index'</script>");
        }
        if(empty($UserArr)){
            exit("<script>alert('用户名错误');location.href='index'</script>");
        }
        if($UserArr->user_pwd!=strrev(md5(hash("sha512",$user_pwd)))){
            $this->Model->upError($UserArr->user_id);
            exit("<script>alert('密码错误');location.href='index'</script>");
        }
        $this->Model->zError($UserArr->user_id);
        $this->Session->set("user_id",$UserArr->user_id);

        exit("<script>alert('登录成功');location.href='../user/info'</script>");
    }
    function xss($type)
    {
        $str = trim($type);              //清理空格
        $str = strip_tags($str);         //过滤html标签
        $str = htmlspecialchars($str);   //将字符内容转化为html实体
        $str = addslashes($str);
        return $str;
    }


}