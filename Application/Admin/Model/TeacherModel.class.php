<?php
namespace Admin\Model;
use Think\Model;
class TeacherModel extends Model{
    //登录验证
    public function login($name,$password){
        //检测密码
        if(strlen($password)<4 || strlen($name)<2){
            $this->error='数据不合法!';
            return false;
        }
        //检测数据
        $User=M('Teacher');
        $res=$User->where("name='$name'")->find();
        if(!$res){
            $this->error='用户名不存在!';
            return false;
        }
        if($res['password']!=strtolower(md5($password))){
            $this->error="用户名或密码错误";
            return false;
        }

        //验证成功
        session('u_id',$res['id']);
        session('u_name',$res['name']);
        return true;
    }



}