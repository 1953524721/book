<?php
/**
 * @Author: Marte
 * @Date:   2018-05-10 10:04:34
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-16 10:41:37
 */
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\ComController;
use App\Model\Admin\AdminsModel;


class AdminsController extends ComController{
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            // print_r($data);die;
            if(empty($data['admin_name']) || empty($data['admin_psw'])){
                echo "<script>alert('用户名或密码不能为空');window.history.back(-1);</script>";die;
            }
            if(!$this->check_one($data['admin_name'])){
                echo "<script>alert('此管理员已存在');window.history.back(-1);</script>";die;
            }
            $salt = $this->get_hash();
            $data['admin_psw'] = md5($salt.$data['admin_psw']);
            date_default_timezone_set('Asia/Shanghai');
            $time = date("Y-m-d H:i:s");
            $res = DB::table('book_admin_user')->insert([
                [
                    'admin_name' => $data['admin_name'],
                    'admin_psw' => $data['admin_psw'],
                    'salt' => $salt,
                    'admin_addtime' => $time,
                ]
            ]);
            if($res){
                echo "<script>alert('添加成功');location.href='show'</script>";die;
            }else{
                echo "<script>alert('添加失败');window.history.back(-1);</script>";die;
            }
        }
        else{
            return view('Admin.Admins.add');
        }
    }


    public function show(){

        $data=getArray(DB::select('SELECT * FROM book_admin_user'));
        // print_r($data);die;
        return view('Admin.Admins.show',array('data'=> $data));
    }

     public function up()
            {
                $data        = $_POST;
                // print_r($data);die;
                $display     = $data['display'];
                $id          = $data['id'];
                $res = DB::update("UPDATE `book`.`book_admin_user` SET `status` = '$display' WHERE `admin_id` = '$id'");
                // var_dump($res);die;
                if($res)
                {
                    echo "1";
                }
                else
                {
                    // $sql = Db::table("book_admin_user")->getLastSql();
                    // echo $sql;
                    echo "2";
                }
            }
    public function check_one($admin_name,$id = 0){
        $count = DB::table("book_admin_user")->where('admin_name',$admin_name)->where("admin_id",'!=',$id)->count();
        if($count >= 1){
            return false;
        }else{
            return true;
        }
    }
    /*
     *生成hash值
     */
    public function get_hash(){
        $salt=base64_encode(mcrypt_create_iv(32,MCRYPT_DEV_RANDOM));
        return substr($salt, 0,6);
    }

}