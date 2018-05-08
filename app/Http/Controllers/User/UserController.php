<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
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
//        $id = $request->session()->get('id');
        $id = "1";
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
        return view("user/info", array("data" => $data));
    }

    /*
     * @刘柯
     * 修改用户信息
     * 2018/05/08 9:31
     */
    public function update()
    {
//        $id = $Request->session()->get('id');
        $id = "1";
        $data = DB::table("book_user_info")->where("user_id", $id)->first();
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
        $rest = $request->input();
//        $id = $Request->session()->get('id');
        $id = "1";
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
        if ($res) {
            return redirect("user/info");
        }
    }

    /*
     * @刘柯
     * 借书历史
     */
    public function reading()
    {
        $id = "1";
        $log = json_decode(json_encode(DB::table("book_user_log")->where("user_id", $id)->get()), true);
        foreach ($log as $key => $value) {
            $book_id[] = $value['book_id'];
        }
        $book = json_decode(json_encode(DB::table("book_books")->whereIn("books_id", $book_id)->get()), true);
        foreach ($book as $key => $value) {
            $log[$key]['book_name'] = $value['books_name'];
        }
        $log = json_decode(json_encode($log));
        return view("user/reading", array("log" => $log));
    }
    public function session()
    {
//        $id      = "1";
        $session = new Session();
//        $res     = $session->set("id",$id);
//        var_dump($res);die();
        //取
        $id = $session->get("id");
//        $value = $request->session()->get("id");
        print_r($id);

    }
}




















