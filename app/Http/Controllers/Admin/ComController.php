<?php
/**
 * @Author: Marte
 * @Date:   2018-05-09 19:39:15
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-10 17:05:47
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\AdminsModel;
use Symfony\Component\HttpFoundation\Session\Session;
class ComController extends Controller
{
    /**
     * 继承公共构造
     */
    public function __construct(Request $request){
        // $request->session()->get('admin_id');
         $session = new Session;
         $admin_id = $session->get("admin_id");
         if(empty($admin_id)){
            echo "<script>alert('请先登录');location.href='Login/login'</script>";die;
         }


    }
}