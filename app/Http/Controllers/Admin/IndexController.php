<?php
namespace App\Http\Controllers\Admin;
use App\Model\Admin\AdminsModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\Admin\ComController;

class IndexController extends ComController{
    public function index(){

        return view('Admin.Index.index');
    }
    public function left(Request $request){
        $session = new Session;
        $admin_name = $session->get("admin_name");
        return view('Admin.Index.left',['admin_name'=>$admin_name]);
    }
    public function top(){
        return view('Admin.Index.top');
    }
    public function main(){
        return view('Admin.Index.mainfra');
    }
}