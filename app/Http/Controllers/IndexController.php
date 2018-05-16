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
use Illuminate\Support\Facades\Input;
use DB;
class IndexController  extends Controller
{
    //显示页面
    public  $Mode;
    public function __construct(){
        $this->Mode = new IndexModel();
    }
    public function index(){
        $page    =      $this->xss(Input::get("page",1));

        $str =          $this->xss(Input::get("serch",""));

        $order   =      $this->xss(Input::get("order","desc"));

        $classify   = DB::table("book_classify")->first();
        // print_r();die;

        $classify   =      $this->xss(Input::get("classify",$classify->classify_id));
        
        $size    =       6;

        $offset  =      ($page-1)*$size;

        $count=getArray(DB::select("SELECT count(*) as num FROM book_books

        INNER JOIN book_classify ON book_books.classify_id = book_classify.classify_id 

        WHERE book_books.books_status = 1 and  book_books.books_name like '%$str%'

        and book_classify.classify_id =$classify

        ORDER BY book_books.add_time $order"))[0]['num'];
        // print_r($count);die;


        $last=ceil($count/$size);
        // print_r($last);die;
        $up     =   $page-1<1?1:$page-1;
        // print_r($up);die;
        $next   =   $page+1>$last?$last:$page+1;

        $bookArr =  $this->Mode->getBooks($offset,$size,$str,$order,$classify);

        foreach ($bookArr['books'] as $key => $val) {
            $bookArr['books'][$key]['books_name']  =  str_replace($str,"<font color='green'>$str</font>",$val['books_name']);  
;

        }
        // print_r($bookArr['books']);die;
        $bookArr['p']['first'] =1;
        $bookArr['p']['last'] =$last;
        $bookArr['p']['up'] =      $up;
        $bookArr['p']['next']  =  $next;
        $bookArr['p']['serch'] = $str;
        $bookArr['p']['order'] = $order;
        $bookArr['p']['classify'] = $classify;
        // $bookArr['p']['class'] = $order;
        // print_r($bookArr);die;
        return view("Index",["data"=>$bookArr]);
    }

    function xss($type)
    {
        $str = trim($type);              //清理空格
        $str = strip_tags($str);         //过滤html标签
        $str = htmlspecialchars($str);   //将字符内容转化为html实体
        $str = addslashes($str);
        return $str;
    }

}