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
        $str =      $this->xss(Input::get("serch",""));
        $classify =      $this->xss(Input::get("classify",""));
        $order =      $this->xss(Input::get("order","desc"));
        $page    =  $this->xss(Input::get("page",1));
        $size = 6;
              $offset=($page-1)*$size;
        $count=getArray(DB::select("SELECT count(*) as num FROM book_books

INNER JOIN book_classify ON book_books.classify_id = book_classify.classify_id 
        
WHERE book_books.books_status = 1 and  book_books.books_name like '%$str%'
        
ORDER BY book_books.add_time $order LIMIT $offset,$size"))[0]['num'];


  
        $last=ceil($count/$size);
        $up   = $page-1<1?1:$page-1;
        $next   = $page+1>$last?$last:$page+1;
        $bookArr =  $this->Mode->getBooks($offset,$size,$str,$order);
        $bookArr['p']['first'] =1;
        $bookArr['p']['last'] =$last;
        $bookArr['p']['up'] =      $up;
        $bookArr['p']['next']  =  $next;
        $bookArr['p']['serch'] = $str;
        $bookArr['p']['order'] = $order;
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