<?php
namespace Admin\Controller;
class LsIgnController extends CommonController
{
    public function index()
    {
        $Lsign=M('lsign');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Lsign->select();
        }else{
            $info=$Lsign->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('lsign-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('lsign-add');
        }elseif (IS_POST){
            $Lsign=M('lsign');
            $num_id=I('post.num_id');   //学生学号
            $have=$Lsign->where("num_id = '{$num_id}'")->find();
            if(!empty($have)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'该学生已经添加'));
            }
            $data=I('post.');
            $res=$Lsign->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Lsign=M('lsign');
        if(IS_GET){
            $id=I('get.id');

            $info=$Lsign->find($id);
            $this->assign('info',$info);
            $this->display('lsign-add');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Lsign->save($data);
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
        $Lsign=M('lsign');
        $res=$Lsign->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }
    public function search()
    {
        $info=$this->c_search('lsign');
        $this->assign('info',$info);
        $this->display('lsign-list');
    }
}