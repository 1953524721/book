<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Poll;
use Symfony\Component\HttpFoundation\Session\Session;
class UserController extends Controller
{


    /*
     * @刘柯
     * 个人信息页面
     * 2018/05/07 16:34
     */
    public function info()
    {
        $session = new Session();
        $id = $session->get("user_id");
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
        // print_r($data);die();
        return view("user/info", array("data" => $data));
    }

    /*
     * @刘柯
     * 修改用户信息
     * 2018/05/08 9:31
     */
    public function update()
    {
        $session = new Session();
        $id = $session->get("user_id");
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
        if(empty($data))
        {
            return view("user/ins");
        }
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
        $session = new Session();
        $id = $session->get("user_id");
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
        $session = new Session();
        $id = $session->get("user_id");
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
        $session = new Session();
        $id = $session->get("user_id");
        $log = json_decode(json_encode(DB::table("book_user_log")->where("user_id", $id)->get()), true);
        foreach ($log as $key => $value) {
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
//        print_r($log);die();
        return view("user/reading", array("log" => $log));
    }
    /*
     * @刘柯
     * 用户申请还书
     * 2018/05/09 15:35
     */
    public function turn()
    {
        date_default_timezone_set("PRC");
        $book_id            = $this->xss($_POST['id']);
//        $session            = new Session();
//       $id = $session->get("id");
        $session = new Session();
        $user_id = $session->get("user_id");
        $time               = date("Y-m-d H:i:s");
        $examine['user_id'] = $user_id;
        $examine['book_id'] = $book_id;
        $examine['time']    = $time;
        $log['status']      = "2";
        DB::beginTransaction();
        try
        {
            $res                = DB::table("book_examine")->insert($examine);
            $log                = DB::table("book_user_log")
                ->where("book_id",$book_id)
                ->where("user_id",$user_id)
                ->update($log);
            DB::commit();
            return "1";
        }
        catch (\Exception $exception)
        {
            DB::rollback();
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
        $data = json_decode(json_encode(DB::table("book_examine")->get()),true);
        foreach ($data as $key =>$value)
        {
            $book_id[] = $value['book_id'];
            $user_id[] = $value['user_id'];
        }
        $book = json_decode(json_encode(DB::table("book_books")->whereIn("books_id",$book_id)->get()),true);
        $user = json_decode(json_encode(DB::table("book_user")->whereIn("user_id",$user_id)->get()),true);
        print_r($data);
        print_r($book);
        print_r($user);
//        return view("user/examine",array("data"=>$data));
    }
}




















