<?php
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ComController;
class  DoController extends ComController{
    public function show(){
        $data=getArray(DB::select("SELECT books_name,books_sn,user_name,exadd_time,status FROM book_examine INNER JOIN book_books ON book_examine.book_id=book_books.books_id INNER JOIN book_user ON book_user.user_id=book_examine.user_id"));
        return view('Admin.Do.show',['data'=>$data]);
    }
    public function auditing(Request $request){
        if($request->isMethod("post")){
            $id=$request->input('id');
            $sql="UPDATE book_examine SET status=1 WHERE examine_id=$id";
            $ret=DB::update($sql);
            if($ret){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $data=getArray(DB::select("SELECT examine_id,books_name,books_sn,user_name,exadd_time,status FROM book_examine INNER JOIN book_books ON book_examine.book_id=book_books.books_id INNER JOIN book_user ON book_user.user_id=book_examine.user_id WHERE status=3"));
            return view('Admin.Do.auditing',['data'=>$data]);
        }
    }

}