<?php
/**
 * @Author: Marte
 * @Date:   2018-05-09 19:39:15
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-09 19:42:37
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Session;

class CommonController extends Controller
{
    /**
     * 继承公共构造
     */
    public function __construct(Request $request){
         $admin_id = session('admin_id');
         if(!$admin_id){
            echo "<script>alert('请先登录');location.href='/admin'</script>";die;
         }


    }
}