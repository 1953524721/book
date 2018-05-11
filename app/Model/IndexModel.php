<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class IndexModel extends Model
{

    public function getBooks(){
        $res = DB::table("book_books")->join('book_classify', 'book_books.classify_id', '=', 'book_classify.classify_id')->get();
        $classify   = DB::table("book_classify")->get();
        $books =     json_decode(json_encode($res),true);
        $classify  = json_decode(json_encode($classify),true);
        return array("books"=>$books,"classify"=>$classify);
    }



}