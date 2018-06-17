<?php
namespace Admin\Controller;
class PaperController extends CommonController
{
    public function index()
    {
        $Paper=M('paper');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Paper->select();
        }else{
            $info=$Paper->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('paper-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('paper-add');
        }elseif (IS_POST){
            $Paper=M('paper');
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Paper');
            $data['file']=$path;
            $res=$Paper->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }


    public function edit()
    {
        $Paper=M('paper');
        if(IS_GET){
            $id=I('get.id');
            $info=$Paper->find($id);
            $this->assign('info',$info);
            $this->display('paper-add');
        }elseif (IS_POST){
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Paper');
            $data['file']=$path;
            $res=$Paper->save($data);
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
        $Paper=M('paper');
        $res=$Paper->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function downFile(){
        $Paper=M('paper');
        $id=I('get.id');
        $info=$Paper->find($id);
        $path=$info['file'];
        //1.获取要下载图片的文件名和路径
        $path = './'.$path;
        if(!$path) header("Location: /");
        download($path);
    }
    public function search()
    {
        $info=$this->c_search('paper');
        $this->assign('info',$info);
        $this->display('paper-list');
    }
}