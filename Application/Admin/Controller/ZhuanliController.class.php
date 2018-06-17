<?php
namespace Admin\Controller;
class ZhuanliController extends CommonController
{
    public function index()
    {
        $Zhuanli=M('zhuanli');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Zhuanli->select();
        }else{
            $info=$Zhuanli->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('zhuanli-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('zhuanli-add');
        }elseif (IS_POST){
            $Zhuanli=M('zhuanli');
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Zhuanli');
            $data['file']=$path;
            $res=$Zhuanli->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Zhuanli=M('zhuanli');
        if(IS_GET){
            $id=I('get.id');
            $info=$Zhuanli->find($id);
            $this->assign('info',$info);
            $this->display('zhuanli-add');
        }elseif (IS_POST){
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Zhuanli');
            $data['file']=$path;
            $res=$Zhuanli->save($data);
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
        $Zhuanli=M('zhuanli');
        $res=$Zhuanli->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function downFile(){
        $Zhuanli=M('zhuanli');
        $id=I('get.id');
        $info=$Zhuanli->find($id);
        $path=$info['file'];
        //1.获取要下载图片的文件名和路径
        $path = './'.$path;
        if(!$path) header("Location: /");
        download($path);
    }

    public function search()
    {
        $info=$this->c_search('zhuanli');
        $this->assign('info',$info);
        $this->display('zhuanli-list');
    }
}