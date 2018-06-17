<?php
namespace Admin\Controller;
class TeacherController extends CommonController
{
    public function index()
    {
        $Teacher=D('Teacher');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Teacher->where("is_del = 0 and name != 'admin'")->select();
        }else{
            $info=$Teacher->where("name='$t_name' and is_del = 0")->select();
        }
        $this->assign('info',$info);
        $this->display('Teacher-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('Teacher-add');
        }elseif (IS_POST){
            $Teacher=D('Teacher');
            $name=I('post.name');
            $password=I('post.password');
            $have=$Teacher->where("name = '{$name}'")->find();
            if(!empty($have)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'该教师姓名已经添加'));
            }
            $password=md5($password);

            $data=array();
            $data['name']=$name;
            $data['password']=$password;
            $res=$Teacher->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>''));
            }
        }

    }

    public function edit()
    {
        $Teacher=M('Teacher');
        if(IS_GET){
            $id=I('get.id');

            $info=$Teacher->find($id);
            $this->assign('info',$info);
            $this->display('Teacher-edit');
        }elseif (IS_POST){
            $data=I('post.');
            $res=$Teacher->save($data);
            if($res === false){
                $this->ajaxReturn(array('status'=>0,'msg'=>'修改失败'));
            }elseif (!empty($res)){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }

        }

    }

    public function changepassword()
    {
        $Teacher=M('Teacher');
        if(IS_GET){
            $id=I('get.id');

            $name=$Teacher->find($id);
            $this->assign('name',$name['name']);
            $this->assign('id',$id);
            $this->display('change-password');
        }elseif (IS_POST){
            $data=I('post.');
            $pwd['id']=$data['id'];
            $pwd['password']=md5($data['password']);
            $res=$Teacher->save($pwd);
            if($res === false){
                $this->ajaxReturn(array('status'=>0,'msg'=>'修改失败'));
            }elseif (empty($res)){
                $this->ajaxReturn(array('status'=>0,'msg'=>'新密码不能和原密码一致'));
            }else{
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }
        }

    }

    public function search()
    {
        $info=$this->c_search('teacher');
        $this->assign('info',$info);
        $this->display('Teacher-list');
    }
    
    public function del()
    {
    }

    public function email()
    {
        $Teacher=M('Teacher');
        if(IS_GET){
            $id=I('get.id');
            $info=$Teacher->find($id);
            $this->assign('info',$info);
            $this->display();

        }elseif (IS_POST){
            $data = I('post.');
            if(empty($data['email'])){
                $this->ajaxReturn(array('status'=>0,'msg'=>'该教师没有邮箱信息'));
            }
            $Email=M('email');
            $info=$Email->find();

            $res = sendemail($info['address'],$info['username'],$info['password'],$info['email'],$info['nickname'],$data['email'],$data['subject'],$data['content']);
            if($res){
                $this->ajaxReturn(array('status'=>0,'msg'=>'发送成功'));
            }
        }
    }


}