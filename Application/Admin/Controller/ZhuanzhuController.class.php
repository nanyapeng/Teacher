<?php
namespace Admin\Controller;
class ZhuanzhuController extends CommonController
{
    public function index()
    {
        $Zhuanzhu=M('zhuanzhu');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Zhuanzhu->select();
        }else{
            $info=$Zhuanzhu->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('zhuanzhu-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('zhuanzhu-add');
        }elseif (IS_POST){
            $Zhuanzhu=M('zhuanzhu');
            $data=I('post.');
            $res=$Zhuanzhu->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Zhuanzhu=M('zhuanzhu');
        if(IS_GET){
            $id=I('get.id');
            $info=$Zhuanzhu->find($id);
            $this->assign('info',$info);
            $this->display('zhuanzhu-add');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Zhuanzhu->save($data);
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
        $Zhuanzhu=M('zhuanzhu');
        $res=$Zhuanzhu->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }
    public function search()
    {
        $info=$this->c_search('zhuanzhu');
        $this->assign('info',$info);
        $this->display('zhuanzhu-list');
    }
}