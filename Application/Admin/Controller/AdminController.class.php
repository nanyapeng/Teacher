<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller
{
    //管理员登录
    public function login()
    {
        if (IS_POST) {
            //接受表单数据
            $name = I('post.name');
            $password = I('post.password');
            $captcha = I('post.captcha');
            //检测验证码
            $Verify = new \Think\Verify();
            if (!$Verify->check($captcha)) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '验证码错误！'));
            }
            //调用方法登录验证
            $User = D('Teacher');
            $info = $User->login($name, $password);
            if (!$info) {
                $this->ajaxReturn(array('status' => 0, 'msg' => $User->getError()));
            }
            $this->ajaxReturn(array('status' => 1));
        } else {
            $this->display();
        }
    }

    //
    public function logout(){
        session('u_id',null);
        session('u_username',null);
        $this->redirect('/admin/admin/login');
    }

    //生成验证码
    public function verify(){
        //验证码配置
        $conf=array(
            'useImgBg'  =>  false,           // 使用背景图片
            'fontSize'  =>  16,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  0,               // 验证码图片高度
            'imageW'    =>  0,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            'bg'        =>  array(243, 251, 254),  // 背景颜色
            'reset'     =>  true,           // 验证成功后是否重置
        );
        //实例化验证码类
        $Verify=new \Think\Verify($conf);
        //输出验证码
        $Verify->entry();
    }
}