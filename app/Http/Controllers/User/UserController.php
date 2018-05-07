<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{














    /*
     * @刘柯
     * 个人信息页面
     * 2018/05/07 16:34
     */
    public function info()
    {
//        $id = $request->session()->get('id');
        $id    = "1";
        $data  = DB::table("book_user_info")->where("user_id",$id)->first();
        return view("user/info",array("data"=>$data));
    }
}





















