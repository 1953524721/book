<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */

namespace App\Http\Controllers\Login;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use DB;
class LoginController  extends Controller {
    //注册显示页面
    public  $Model;
    public  $Session;
    public function __construct(){
//        $this->Model   = new  RegisterModel();
        $this->Session = new Session();
    }
    public function index(){
       echo 1;;
    }


}