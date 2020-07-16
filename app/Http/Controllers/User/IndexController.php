<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class IndexController extends Controller
{
    //注册
    public function reg()
    {
        return view("/user/reg");
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

        $data = [
            'reg_name' => $reg_name,
            'reg_email' => $reg_email,
            'reg_pwd' => $reg_pwd,
        ];
       //入库
       $ret = DB::table('reg')->insert($data);
       if($ret){
       	echo "注册成功";
       	return redirect("/user/log");
       }else{
       	echo "注册失败";
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
      $reg_pwd = $request->input("reg_pwd");
       
      //验证用户名
      $reg_name = DB::table("reg")->where(['reg_name'=>$reg_name])->first();
      //验证密码
      $ret = password_verify($reg_pwd,$reg_name->reg_pwd); 
      if($ret){
      	echo "登录成功";
        return redirect("/user/log");
      }else{
      	echo "登录失败";
        return redirect("/user/center");
      }
   }
}
