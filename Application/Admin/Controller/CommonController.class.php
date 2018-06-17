<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller
{
    //构造方法
    public function _initialize()
    {
        if (!session('?u_id')) {
            $this->error('请登录后进行相关操作！', U('Admin/login'), 1);
        }
    }

    public function upload($file,$path){
        //判断文件上传是否有误
        if(!isset($file) || $file['error']!=0){
            return false;
        }
        $upload = new \Think\Upload();
        // 实例化上传类
        $upload->maxSize   =  0 ;
        // 设置附件上传大小
        $upload->exts      =  '';
        // 设置附件上传类型
        $upload->savePath  =     $path.'/';
        // 设置附件上传目录
        // 上传单个文件
        $info   =   $upload->uploadOne($file);
        if(!$info) {
            // 上传错误提示错误信息
            return $this->error($upload->getError());
        }else{
            //上传成功 获取上传文件信息
            return 'Uploads/' . $info['savepath'].$info['savename'];
        }
    }

    public function c_search($table)
    {
        $t_name=I('post.t_name');
        $u_name=session('u_name');
        $u_id=session('u_id');
        $Model=M($table);
        if($u_id==1){
            $info=$Model->where("name like '%$t_name%'")->select();
        }else{
            $info=$Model->where("name='$u_name'")->select();
        }
        return $info;
    }
}