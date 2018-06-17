<?php
namespace Admin\Controller;
class HonourController extends CommonController
{
    public function index()
    {
        $Honour=M('honour');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Honour->select();
        }else{
            $info=$Honour->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('honour-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('honour-add');
        }elseif (IS_POST){
            $Honour=M('honour');
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Honour');
            $data['file']=$path;
            $res=$Honour->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Honour=M('honour');
        if(IS_GET){
            $id=I('get.id');
            $info=$Honour->find($id);
            $this->assign('info',$info);
            $this->display('honour-add');
        }elseif (IS_POST){
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Honour');
            $data['file']=$path;
            $res=$Honour->save($data);
            if($res === false){
                $this->ajaxReturn(array('status'=>0,'msg'=>'修改失败'));
            }elseif (!empty($res)){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }

        }
    }

    public function del()
    {
        $id=I('post.id');
        $Honour=M('honour');
        $res=$Honour->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function downFile(){
        $Honour=M('Honour');
        $id=I('get.id');
        $info=$Honour->find($id);
        $path=$info['file'];
        //1.获取要下载图片的文件名和路径
        $path = './'.$path;
        if(!$path) header("Location: /");
        download($path);
    }

    public function search()
    {
        $info=$this->c_search('honour');
        $this->assign('info',$info);
        $this->display('honour-list');
    }
}