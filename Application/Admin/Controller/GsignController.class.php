<?php
namespace Admin\Controller;
class GsIgnController extends CommonController
{
    public function index()
    {
        $Gsign=M('gsign');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Gsign->select();
        }else{
            $info=$Gsign->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('gsign-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('gsign-add');
        }elseif (IS_POST){
            $Gsign=M('gsign');
            $num_id=I('post.num_id');   //学生学号
            $have=$Gsign->where("num_id = '{$num_id}'")->find();
            if(!empty($have)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'该学生已经添加'));
            }
            $data=I('post.');
            $res=$Gsign->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Gsign=M('gsign');
        if(IS_GET){
            $id=I('get.id');

            $info=$Gsign->find($id);
            $this->assign('info',$info);
            $this->display('gsign-add');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Gsign->save($data);
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
        $Gsign=M('gsign');
        $res=$Gsign->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }
    public function search()
    {
        $info=$this->c_search('gsign');
        $this->assign('info',$info);
        $this->display('gsign-list');
    }
}