<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */
namespace App\Http\Controllers\Register;
use App\Http\Controllers\Controller;
class RegisterController  extends Controller {
    //显示页面
    public function index(){
        return view("Register/Register");
    }
}