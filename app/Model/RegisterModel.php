<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisterModel extends Model
{

    public function insertCode($arr){
        $res = DB::table('book_phone_code')->insert($arr);
        return $res;
    }
    public function getCode($phone){
        $res = DB::table('book_phone_code')->orderBy('add_time', 'desc')->where("phone_num",$phone)->where("is_use",0)->first();
        return $res;
    }
    public function getUserName($user){
        $res = DB::table('book_user')->where("user_name",$user)->first();
        return $res;
    }
    public function insertUser($arr){
        $res = DB::table('book_user')->insert($arr);
        return  $res;
    }
    public function upPcode($code_id){
        $where = array(
            'code_id'=>$code_id,
        );
        $set = array(
            "is_use"=>1
        );
        DB::table('book_phone_code')->where($where)->update($set);
    }

}