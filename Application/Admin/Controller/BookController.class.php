<?php
namespace Admin\Controller;
class BookController extends CommonController
{
    public function index()
    {
        $Book=M('Book');
        $t_name=session('u_name');
        if($t_name == 'admin'){
            $info=$Book->select();
        }else{
            $info=$Book->where("name='$t_name'")->select();
        }
        $this->assign('info',$info);
        $this->display('Book-list');
    }

    public function add()
    {
        if(IS_GET){
            $this->display('Book-add');
        }elseif (IS_POST){
            $Book=M('Book');
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Book');
            $data['file']=$path;
            $res=$Book->add($data);
            if($res){
                $this->ajaxReturn(array('status'=>1,'msg'=>''));
            }else{
                $this->ajaxReturn(array('status'=>0,'msg'=>'添加失败'));
            }
        }
    }

    public function edit()
    {
        $Book=M('Book');
        if(IS_GET){
            $id=I('get.id');

            $info=$Book->find($id);
            $this->assign('info',$info);
            $this->display('Book-add');
        }elseif (IS_POST){
            $data=I('post.');
            $path=$this->upload($_FILES['file'],'Book');
            $data['file']=$path;
            $res=$Book->save($data);
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
        $Book=M('Book');
        $res=$Book->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }

    public function downFile(){
        $Book=M('book');
        $id=I('get.id');
        $info=$Book->find($id);
        $path=$info['file'];
        //1.获取要下载图片的文件名和路径
        $path = './'.$path;
        if(!$path) header("Location: /");
        download($path);
    }

    public function search()
    {
        $info=$this->c_search('book');
        $this->assign('info',$info);
        $this->display('book-list');
    }
}