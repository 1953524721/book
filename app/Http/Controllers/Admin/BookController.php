<?php
namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\ComController;
use Illuminate\Support\Facades\Storage;
use App\Model\Admin\AdminsModel;
class BookController extends ComController{
    public function add(Request $request){
        //取出类型数据
        if($request->isMethod("post")){
            $data = $request->input();
            $file = $request->file('pic');
            $allowed_extensions = ["png", "jpg", "gif","jpeg","JPG"];
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                return ['error' => 'You may only upload png, jpg or gif.'];
            }
            $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
            $extension = $file->getClientOriginalExtension();
            $fileName = str_random(10).'.'.$extension;
            $file->move($destinationPath, $fileName);
            $filePath = asset($destinationPath.$fileName);
            $path=$destinationPath.$fileName;

            date_default_timezone_set('Asia/Shanghai');
            $time= date("Y-m-d H:i:s",time());
            $res = DB::table('book_books')->insert(
                [
                    'books_name'=>$data['books_name'],
                    'classify_id'=>$data['classify_id'],
                    'books_num'=>$data['books_num'],
                    'books_author'=>$data['books_author'],
                    'books_info'=>$data['books_info'],
                    'books_status'=>$data['books_status'],
                    'add_time'=>$time,
                    'books_sn'=>date("Ymd").time(),
                    'books_img'=>$path,
                ]
            );
            if($res){
                echo "<script>alert('新增成功');location.href='show';</script>";die;
            }else{
                echo "添加失败";
            }

        }else{
            $data=getArray(DB::table("book_classify")->get());
            return view('Admin.Book.add',['data'=>$data]);
        }

    }
    public function show(Request $request){
        //$data =getArray(DB::table("book_books")->get());
        if($request->isMethod("post")){
            $name = isset($request->input()['name'])?$request->input()['name']:"";
            $page=isset($_GET['page'])?$_GET['page'] : 1;
            $size=10;
            $offset=($page-1)*$size;
            $first=1;
            $up=$page-1<0?1:$page-1;
            $count=getArray(DB::select("SELECT count(*) as num FROM book_books INNER JOIN book_classify ON book_books.classify_id=book_classify.classify_id WHERE books_name LIKE '%$name%'"))[0]['num'];
            $last=ceil($count/$size);
            $next=$page+1>$last?$last:$page+1;
            $data=getArray(DB::select("SELECT * FROM book_books INNER JOIN book_classify ON book_books.classify_id=book_classify.classify_id WHERE books_name LIKE '%$name%'"));
            return view('Admin.Book.show',['data'=>$data,'name'=>$name,'up'=>$up,'next'=>$next,'first'=>$first,'last'=>$last,'page'=>$page,'type'=>1]);
        }else{
            $page=isset($_GET['page'])?$_GET['page'] : 1;
            $size=10;
            $offset=($page-1)*$size;
            $first=1;
            $up=$page-1<0?1:$page-1;
            $count=getArray(DB::select("SELECT count(*) as num FROM book_books INNER JOIN book_classify ON book_books.classify_id=book_classify.classify_id"))[0]['num'];
            $last=ceil($count/$size);
            $next=$page+1>$last?$last:$page+1;
            $data=getArray(DB::select("SELECT * FROM book_books INNER JOIN book_classify ON book_books.classify_id=book_classify.classify_id limit $offset,$size"));
            return view('Admin.Book.show',['data'=>$data,'name'=>"",'up'=>$up,'next'=>$next,'first'=>$first,'last'=>$last,'page'=>$page,'type'=>0]);
        }
    }
    public function del(){
        $data=$_POST['id'];
        $book_id=implode(',',$data);
        $sql="delete from book_books where books_id in($book_id)";
        $ret=DB::delete($sql);
        if($ret){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function update(Request $request){
        if($request->isMethod("post")){
            $data=$request->input();
            $books_id=$data['books_id'];
            $res = DB::table("book_books")->where('books_id',$books_id)->update(
                [
                    'books_name'=>$data['books_name'],
                    'classify_id'=>$data['classify_id'],
                    'books_num'=>$data['books_num'],
                    'books_author'=>$data['books_author'],
                    'books_info'=>$data['books_info'],
                    'books_status'=>$data['books_status'],
                ]
            );
            if($res){
                echo 1;
                //echo "<script>alert('修改成功');location.href='index';</script>";die;
            }else{
                echo 2;
                //echo "<script>alert('修改失败');location.href='show';</script>";die;
            }

        }else{
           $book_id=$_GET['books_id'];
           $data=getArray(DB::select('SELECT * FROM book_books INNER JOIN book_classify ON book_books.classify_id=book_classify.classify_id'));
           $book_data=getArray(DB::table("book_books")->where("books_id",$book_id)->first());
           return view('Admin.Book.update',['data'=>$data,'book_data'=>$book_data]);
        }
    }
}