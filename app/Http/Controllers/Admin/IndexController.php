<?php
namespace App\Http\Controllers\Admin;

class IndexController{
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