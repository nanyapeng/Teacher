<?php
namespace Admin\Controller;
class KeyanController extends CommonController
{
    public function index()
    {
        $Keyan=M('keyan');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Keyan->select();
        }else{
            $info=$Keyan->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('keyan-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('keyan-add');
        }elseif (IS_POST){
            $Keyan=M('keyan');
            $data=I('post.');
            $res=$Keyan->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Keyan=M('keyan');
        if(IS_GET){
            $id=I('get.id');
            $info=$Keyan->find($id);
            $this->assign('info',$info);
            $this->display('keyan-add');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Keyan->save($data);
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
        $Keyan=M('keyan');
        $res=$Keyan->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function search()
    {
        $info=$this->c_search('keyan');
        $this->assign('info',$info);
        $this->display('keyan-list');
    }
}