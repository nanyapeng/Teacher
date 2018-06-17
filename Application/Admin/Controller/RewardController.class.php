<?php
namespace Admin\Controller;
class RewardController extends CommonController
{
    public function index()
    {
        $Reward=M('reward');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Reward->select();
        }else{
            $info=$Reward->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('reward-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('reward-add');
        }elseif (IS_POST){
            $Reward=M('reward');
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Reward');
            $data['file']=$path;
            $res=$Reward->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Reward=M('reward');
        if(IS_GET){
            $id=I('get.id');
            $info=$Reward->find($id);
            $this->assign('info',$info);
            $this->display('reward-add');
        }elseif (IS_POST){
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Reward');
            $data['file']=$path;
            $res=$Reward->save($data);
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
        $Reward=M('reward');
        $res=$Reward->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function downFile(){
        $Reward=M('reward');
        $id=I('get.id');
        $info=$Reward->find($id);
        $path=$info['file'];
        //1.获取要下载图片的文件名和路径
        $path = './'.$path;
        if(!$path) header("Location: /");
        download($path);
    }
    public function search()
    {
        $info=$this->c_search('reward');
        $this->assign('info',$info);
        $this->display('reward-list');
    }
}