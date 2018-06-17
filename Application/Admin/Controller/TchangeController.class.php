<?php
namespace Admin\Controller;
class TchangeController extends CommonController
{
    public function index()
    {
        $Tchange=M('tchange');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Tchange->select();
        }else{
            $info=$Tchange->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('tchange-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('tchange-add');
        }elseif (IS_POST){
            $Tchange=M('tchange');
            $data=I('post.');
            $res=$Tchange->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Tchange=M('tchange');
        if(IS_GET){
            $id=I('get.id');
            $info=$Tchange->find($id);
            $this->assign('info',$info);
            $this->display('tchange-add');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Tchange->save($data);
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
        $Tchange=M('tchange');
        $res=$Tchange->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }
    public function search()
    {
        $info=$this->c_search('tchange');
        $this->assign('info',$info);
        $this->display('tchange-list');
    }
}