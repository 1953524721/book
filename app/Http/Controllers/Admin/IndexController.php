<?php
namespace App\Http\Controllers\Admin;
use App\Model\Admin\AdminsModel;
use Illuminate\Session;
use App\Http\Controllers\Admin\ComController;
class IndexController extends ComController{
    public function index(){
        return view('Admin.Index.index');
    }
    public function left(){
        return view('Admin.Index.left');
    }
    public function top(){
        return view('Admin.Index.top');
    }
    public function main(){
        return view('Admin.Index.mainfra');
    }
}