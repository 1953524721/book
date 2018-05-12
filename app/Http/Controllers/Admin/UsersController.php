<?php
/**
 * @Author: Marte
 * @Date:   2018-05-10 10:04:34
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-11 19:57:01
 */
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\ComController;
use App\Model\Admin\AdminsModel;

class UsersController extends ComController{



    public function show(){
        $data=getArray(DB::select('SELECT * FROM book_user'));
        // print_r($data);die;
        return view('Admin.Users.show',array('data'=> $data));
    }

     public function up()
            {
                $data        = $_POST;
                $display     = $data['display'];
                $id          = $data['id'];
                $res = DB::update("UPDATE `book`.`book_user` SET `user_status` = '$display' WHERE `user_id` = '$id'");
                // var_dump($res);die;
                if($res)
                {
                    echo "1";
                }
                else
                {
                    $sql = DB::update("UPDATE `book`.`book_user` SET `user_status` = '$display' WHERE `user_id` = '$id'");
                    echo $sql;
                }
            }



}