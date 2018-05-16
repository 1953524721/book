<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Poll;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Session\Session;
class UserController extends Controller
{
    public  $Session;
    public function __construct()
    {
        $this->Session = new Session();
    }
    /*
     * @刘柯
     * 个人信息页面
     * 2018/05/07 16:34
     */
    public function info()
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
        $userPhone = DB::table("book_user")->where("user_id", $id)->first();
        //修改手机号为登录时手机号
        $data->info_iphone =  $userPhone->user_phone;
        return view("user/info", array("data" => $data));
    }

    /*
     * @刘柯
     * 修改用户信息
     * 2018/05/08 9:31
     */
    public function update()
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
        //修改手机号为登录时手机号
        $userPhone = DB::table("book_user")->where("user_id", $id)->first();
        $data->info_iphone =  $userPhone->user_phone;
        if(empty($data))
        {
            return view("user/ins");
        }
//        print_r($data);die;
        return view("user/update", array("data" => $data));
    }
    function xss($type)
    {
        $str = trim($type);              //清理空格
        $str = strip_tags($str);         //过滤html标签
        $str = htmlspecialchars($str);   //将字符内容转化为html实体
        $str = addslashes($str);
        return $str;
    }

    /*
     * @刘柯
     * 修改个人信息
     * 2018/05/08 10:49
     */
    public function up(Request $request)
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $rest = $request->input();
        $data['info_birthday']  = $this->xss($rest['birthday']);
        $data['info_work']      = $this->xss($rest['work']);
        $data['info_school']    = $this->xss($rest['school']);
        $data['info_email']     = $this->xss($rest['eamil']);
        $data['info_iphone']    = $this->xss($rest['iphone']);
        $data['info_autograph'] = $this->xss($rest['autograph']);
        $data['info_explain']   = $this->xss($rest['explain']);
        date_default_timezone_set("PRC");
        $data['update_time']    = date("Y-m-d H:i:s");
        $res = DB::table("book_user_info")->where("user_id", $id)->update($data);
        if ($res)
        {
            return redirect("user/info");
        }
        else
        {
            return "2";
        }
    }
    /*
     * @刘柯
     * 信息添加页
     * 2018/05/10 17：25
     */
    public function insd(Request $request)
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $rest = $request->input();
        $data['info_birthday']  = $this->xss($rest['birthday']);
        $data['info_work']      = $this->xss($rest['work']);
        $data['info_school']    = $this->xss($rest['school']);
        $data['info_email']     = $this->xss($rest['eamil']);
        $data['info_iphone']    = $this->xss($rest['iphone']);
        $data['info_autograph'] = $this->xss($rest['autograph']);
        $data['info_explain']   = $this->xss($rest['explain']);
        date_default_timezone_set("PRC");
        $data['update_time']    = date("Y-m-d H:i:s");
        $data['user_id']        = $id;
        $res = DB::table("book_user_info")->insert($data);
        if ($res)
        {
            return redirect("user/info");
        }
        else
        {
            return "2";
        }
    }

    /*
     * @刘柯
     * 借书历史
     */
    public function reading()
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $log = json_decode(json_encode(DB::table("book_examine")->where("user_id",$id)->get()),true);
        if(empty($log)){
            echo "<script>alert('未有借阅');window.history.back(-1);</script>";
            die();
        }
        foreach ($log as $key => $value)
        {
            $book_id[] = $value['book_id'];
            
        }

        $book = json_decode(json_encode(DB::table("book_books")->whereIn("books_id", $book_id)->get()), true);
        if(empty($book))
        {
            return view("user/die");die();
        }
        foreach ($book as $key => $value)
        {
            $log[$key]['book_name'] = $value['books_name'];
        }
        $log = json_decode(json_encode($log));
        return view("user/reading", array("log" => $log));
    }
    /*
     * @刘柯
     * 用户申请还书
     * 2018/05/09 15:35
     */
    public function turn()
    {
        $book_id            = $this->xss($_POST['id']);
        $user_id = $this->Session->get("user_id");
        if(empty($user_id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $log['status']      = "3";
        $res                = DB::table("book_examine")->where("user_id",$user_id)
                                                       ->where("book_id",$book_id)
                                                       ->update($log);
        if($res)
        {
            return "1";
        }
        else
        {
            return "2";
        }
    }
    /*
     * @刘柯
     * 审核还书
     * 2018/05/10 15:33
     */
    public function examine()
    {
        $data = DB::select("SELECT
                             book_user.`user_id`,`user_name`,`books_id`,`books_name`,`status`,`examine_id`
                          FROM
                          `book_examine`
                           INNER JOIN `book_books` ON book_examine.book_id = book_books.books_id
                          INNER JOIN `book_user`  on book_examine.user_id = book_user.user_id");
        return view("user/examine",array("data"=>$data));
    }
    /*
     * @刘柯
     * 密码修改页
     * 2018/05/11 15:51
     */
    public function pwd()
    {
        return view("user/pwd");
    }
    public function pwdUp()
    {
        $id = $this->Session->get("user_id");
        if(empty($id))
        {
            echo "<script>alert('未登录');window.history.back(-1);</script>";
            die();
        }
        $data     = $_POST;
        $old_pwd  = $this->xss($data['old_pwd']);
        $new_pwd1 = $this->xss($data['new_pwd1']);
        $new_pwd2 = $this->xss($data['new_pwd2']);
        if(empty($old_pwd) && empty($new_pwd1) && $new_pwd2)
        {
            echo "<script>alert('密码不能空');window.history.back(-1);</script>";
        }
        elseif($new_pwd1 != $new_pwd2)
        {
            echo "<script>alert('两次密码不一致');window.history.back(-1);</script>";
        }
        else
        {
            $res =  json_decode(json_encode(DB::table("book_user")->where("user_id",$id)->first()),true);
            $old_pwd = $this->password($old_pwd);
            if($res['user_pwd']!= $old_pwd)
            {
                echo "<script>alert('旧密码错误');window.history.back(-1);</script>";
            }
            else
            {
                $new_pwd = $this->password($new_pwd1);
                $update['user_pwd'] = $new_pwd;
                $rest   = DB::table("book_user")->where("user_id",$id)->update($update);
                if($rest)
                {
                    return redirect("user/info");
                }
            }
        }
    }
   function password($old_pwd)
    {
        return  strrev(md5(hash("sha512",$old_pwd)));
    }
    /*
     * @刘柯
     * 前台用户借书页
     *
     */
    public function borrowBooks()
    {
        $book_id  =  $this->xss($_GET['books_id']);
        $user_id  = $this->Session->get("user_id");
        if(empty($user_id))
        {
            $arr = array(
                "e" => "3",
                "m"=>"未登录"
            );
            return $arr;
            die();
        }
        $examine = DB::table("book_examine")->where("user_id",$user_id)
                                            ->where("book_id",$book_id)
                                            ->first();
        if(empty($examine))
        {
            $count = DB::select("SELECT * FROM book_examine WHERE user_id = '$user_id' AND status not in ('1','3')");
            if(count($count)>="5")
            {
                $arr = array(
                    "e"=>"4",
                    "m"=>"超过5本限制"
                );
                return $arr;
                die();
            }
            $insert['exadd_time'] = date("Y-m-d H:i:s");
            $insert['book_id']    = $book_id;
            $insert['user_id']    = $user_id;
            $res =  DB::table("book_examine")->insert($insert);
            if($res)
            {
                $arr = array(
                    "e"=>"0",
                    "m"=>"借书成功"
                );
                $arr = json_encode($arr);
                return $arr;
            }
            else
            {
                $arr = array(
                    "e"=>"1",
                    "m"=>"借书失败"
                );
                $arr = json_encode($arr);
                return $arr;
            }
        }
        else
        {
            $arr = array(
                "e"=>"2",
                "m"=>"已经借走了"
            );
            return $arr;
        }
    }
    public function exitUser(){
        session_start();
        session_destroy();
        exit("<script>alert('退出成功');location.href='../'</script>");
    }
}
