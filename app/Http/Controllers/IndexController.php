<?php
/**
 * @Author: Marte
 * @Date:   2018-05-07 09:51:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-07 11:02:53
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\IndexModel;
use DB;
class IndexController  extends Controller
{
    //显示页面
    public  $Mode;
    public function __construct(){
        $this->Mode = new IndexModel();
    }

    public function index(){
        $bookArr =  $this->Mode->getBooks();
        return view("Index",["data"=>$bookArr]);
    }

}