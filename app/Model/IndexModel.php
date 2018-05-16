<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class IndexModel extends Model
{

    public function getBooks($offset,$size,$str,$order){

            // echo $offset,$size,$str,$order;die;
        $res = DB::select("SELECT *  FROM book_books

        INNER JOIN book_classify ON book_books.classify_id = book_classify.classify_id 
        
        WHERE book_books.books_status = 1 and  book_books.books_name like '%$str%'
        
        ORDER BY book_books.add_time $order LIMIT $offset,$size");


        $classify   = DB::table("book_classify")->get();
        $books =     json_decode(json_encode($res),true);
        $classify  = json_decode(json_encode($classify),true);
        return array("books"=>$books,"classify"=>$classify);
    }




}