<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model
{

    public function getUser($User){
        $res = DB::table('book_user')->where("user_name",$User)->first();
        return $res;
    }
    public function  upError($User_id){
        $res = DB::update("UPDATE book_user SET `user_status`=user_status+1 where user_id =$User_id");
        return $res;
    }
    public function zError($User_id){
        $res = DB::update("UPDATE book_user SET `user_status`=0 where user_id =$User_id");
        return $res;
    }


}