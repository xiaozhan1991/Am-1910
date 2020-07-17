<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
class IndexController extends Controller
{
    //注册
    public function reg()
    {
        return view('user.reg');
    }
    //执行注册
   public function regDo(Request $request)
   {
       $reg_name = $request->input("reg_name");
       $reg_email = $request->input("reg_email");
       $reg_pwd = $request->input("reg_pwd");
       $reg_pwds = $request->input("reg_pwds");

       //验证
       if(empty($reg_name)){
           die("用户名不能为空");
       }
       if(empty($reg_email)){
           die("邮箱不能为空");
       }
       if(empty($reg_pwd)){
           die("密码不能为空");
       }
       if(empty($reg_pwds)){
           die("确认密码不能为空");
       }
       $pass = password_hash($reg_pwd,PASSWORD_BCRYPT);
        $data = [
            'reg_name' => $reg_name,
            'reg_email' => $reg_email,
            'reg_pwd' => $pass,
        ];
       //入库
       $ret = UserModel::insert($data);
       if($ret){
           echo "<script>alert('注册成功');location='/user/log'</script>";
       }else{
       	   echo "注册失败";
       	   return redirect('/user/reg');
       }
   }

   //登录
   public function log()
   {
   	return view("user.log");
   }

   //执行登录
   public function logDo(Request $request)
   {
      $reg_name = $request->input("reg_name");
      $reg_pwd = $request->input('reg_pwd');

      $name = UserModel::where(['reg_name'=>$reg_name])->first();

      //验证密码
      $ret = password_verify($reg_pwd,$name->reg_pwd);

      if($ret){
          session(["reg_id"=>$name->reg_id]);
          echo "<script>alert('登录成功');location='/user/center'</script>";
      }else{
      	echo "登录失败";
        return redirect("/user/log");
      }
   }

   /**
    * 个人中心
    */
   public function center(Request $request)
   {
       $ret = UserModel::where(["reg_id"=>session('reg_id')])->first();
       if(session()->has("reg_id")){
           return view("user.center");
       }else{
           echo "请先进行登录";
           return redirect("/user/log");
       }
   }
}
