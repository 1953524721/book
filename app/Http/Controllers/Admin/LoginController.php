<?php
/**
 * @Author: Marte
 * @Date:   2018-05-08 10:48:58
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-09 20:44:07
 */
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
public function login(Request $request){
        if($request->isMethod("post")){
            $data = $request->input();
            // print_r($data);die;
            $admindata = getArray(DB::table('book_admin_user')->where(['admin_name'=>$data['admin_name']])->first());
            if(!$admindata){
                echo "<script>alert('用户名或者密码错误！');location.href='/admin'</script>";die;
            }
            $password = md5($admindata['salt'].$data['admin_pwd']);
            if($password != $admindata['admin_pwd']){
                echo "<script>alert('用户名或者密码错误！');location.href='/admin'</script>";die;
            }
            $request->session()->put('admin_id', $admindata['admin_id']);
            $request->session()->put('admin_name', $admindata['admin_name']);
            $request->session()->save();
            echo "<script>alert('登陆成功！');location.href='/admin/index'</script>";die;

        }else{
            return view("Admin.Login.login");
        }
     }



    }
