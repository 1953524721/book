<?php
/**
 * @Author: Marte
 * @Date:   2018-05-08 15:48:56
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-10 16:31:57
 */
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\ComController;
use App\Model\Admin\AdminsModel;
class ClassifyController extends ComController{
  public function classify(Request $request){
        if($request->isMethod("post")){
            $data = $request->input();
            if(empty($data['classify_name'])){
                echo "<script>alert('分类名称不能为空');window.history.back(-1);</script>";die;
            }
            if(!$this->check_one($data['classify_name'])){
                echo "<script>alert('分类名称已存在');window.history.back(-1);</script>";die;
            }
            $res = DB::table('book_classify')->insert([
                [
                    'classify_name' => $data['classify_name'],
                ]
            ]);
            if($res){
                echo "<script>alert('添加分类成功');location.href='show'</script>";die;
            }else{
                echo "<script>alert('添加分类失败');window.history.back(-1);</script>";die;
            }

        }else{
            return view("Admin.Classify.Classify");
        }
     }

     public function show(){
         $classify=getArray(DB::select('SELECT * FROM book_classify'));
         // print_r($classify);die;
         $books = getArray(DB::select('SELECT * FROM book_books'));
         // print_r($books);die;

        return view("Admin.Classify.show",array('classify'=>$classify,'books'=>$books));
     }

     public function delete($id){
        // echo "123";die;
        $data=getArray(DB::delete("DELETE book_classify,book_books from book_classify LEFT JOIN book_books ON book_classify.classify_id=book_books.classify_id WHERE book_classify.classify_id='$id'"));
        if($data){
            echo "<script>alert('删除成功');window.location.href=document.referrer;</script>";die;

        }else{
            echo "<script>alert('删除失败');window.history.back(-1);</script>";die;
        }
        // $classify=getArray(DB::select('SELECT * FROM book_classify'));
     }

     public function check_one($admin_name,$id = 0){
        $count = DB::table("book_classify")->where('classify_name',$admin_name)->where("classify_id",'!=',$id)->count();
        if($count >= 1){
            return false;
        }else{
            return true;
        }
    }

    }