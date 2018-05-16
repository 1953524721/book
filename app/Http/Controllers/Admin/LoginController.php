<?php
/**
 * @Author: Marte
 * @Date:   2018-05-08 10:48:58
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-16 10:42:08
 */
namespace App\Http\Controllers\Admin;

use DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Admin\AdminsModel;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
public function login(Request $request){
        if($request->isMethod("post")){
            $data = $request->input();
            // print_r($data);die;
            $admindata = getArray(DB::table('book_admin_user')->where(['admin_name'=>$data['admin_name']])->first());
            if(!$admindata){
                echo "<script>alert('用户名或者密码错误,请重新输入！');window.history.back(-1);</script>";die;
            }
            $password = md5($admindata['salt'].$data['admin_psw']);
            if($password != $admindata['admin_psw']){
                echo "<script>alert('用户名或者密码错误！');window.history.back(-1);</script>";die;
            }
            $session = new Session;
            $admin_id = $session->set("admin_id",$admindata['admin_id']);
            $session->set("admin_name",$admindata['admin_name']);
            date_default_timezone_set('Asia/Shanghai');
            $time = date("Y-m-d H:i:s");
            $res = DB::update("UPDATE `book`.`book_admin_user` SET `admin_lastlogintime` = '$time' WHERE `admin_id` = $admindata[admin_id]");            // $request->session()->put('admin_id', $admindata['admin_id']);
            // $request->session()->put('admin_name', $admindata['admin_name']);
            // $request->session()->save();
            echo "<script>alert('登陆成功！');location.href='../'</script>";die;

        }else{
            return view("Admin.Login.login");
        }
     }

      public function loginout(Request $request){
        $session = new Session;
        $session->set('admin_id',"");
        echo "<script>alert('登出成功！');location.href='login'</script>";die;
     }

    }
