<?php
namespace Admin\Controller;

class TjController extends CommonController
{
    public function index()
    {
        $teacher=M('teacher')->field('id,name,deep,score')->where("name != 'admin'")->order('id desc')->select();
        $tj=array();
        foreach ($teacher as $key=>$value){
            $lesson=M('lesson')->where("name ='{$value['name']}'")->count();
            $book=M('book')->where("name ='{$value['name']}'")->count();
            $gsign=M('gsign')->where("name ='{$value['name']}'")->count();
            $honour=M('honour')->where("name ='{$value['name']}'")->count();
            $keyan=M('keyan')->where("name ='{$value['name']}'")->count();
            $lsign=M('lsign')->where("name ='{$value['name']}'")->count();
            $paper=M('paper')->where("name ='{$value['name']}'")->count();
            $reward=M('reward')->where("name ='{$value['name']}'")->count();
            $tchange=M('tchange')->where("name ='{$value['name']}'")->count();
            $zhuanli=M('zhuanli')->where("name ='{$value['name']}'")->count();
            $teacher=M('teacher')->field('score,deep')->where("name ='{$value['name']}'")->find();
            if(!empty($value['deep'])){
                $base_score=M('base_score')->field('base_score')->where("deep ='{$value['deep']}'")->find();
            }

            $tj[$key]['id']=$value['id'];
            $tj[$key]['name']=$value['name'];
            $tj[$key]['lesson']=$lesson;
            $tj[$key]['book']=$book;
            $tj[$key]['gsign']=$gsign;
            $tj[$key]['honour']=$honour;
            $tj[$key]['keyan']=$keyan;
            $tj[$key]['lsign']=$lsign;
            $tj[$key]['paper']=$paper;
            $tj[$key]['reward']=$reward;
            $tj[$key]['tchange']=$tchange;
            $tj[$key]['zhuanli']=$zhuanli;
            $tj[$key]['score']=$teacher['score'];
            $tj[$key]['cha']=$teacher['score'] - $base_score['base_score'];
        }
        $this->assign('tj',$tj);
        $this->display('tj-list');
    }
    public function search()
    {
        $t_name=I('post.t_name');
        $teacher=M('teacher')->field('id,name')->where("name like '%$t_name%'")->order('id desc')->select();
        $tj=array();
        foreach ($teacher as $key=>$value){
            $lesson=M('lesson')->where("name ='{$value['name']}'")->count();
            $book=M('book')->where("name ='{$value['name']}'")->count();
            $gsign=M('gsign')->where("name ='{$value['name']}'")->count();
            $honour=M('honour')->where("name ='{$value['name']}'")->count();
            $keyan=M('keyan')->where("name ='{$value['name']}'")->count();
            $lsign=M('lsign')->where("name ='{$value['name']}'")->count();
            $paper=M('paper')->where("name ='{$value['name']}'")->count();
            $reward=M('reward')->where("name ='{$value['name']}'")->count();
            $tchange=M('tchange')->where("name ='{$value['name']}'")->count();
            $zhuanli=M('zhuanli')->where("name ='{$value['name']}'")->count();
            $teacher=M('teacher')->field('score')->where("name ='{$value['name']}'")->find();
            $tj[$key]['id']=$value['id'];
            $tj[$key]['name']=$value['name'];
            $tj[$key]['lesson']=$lesson;
            $tj[$key]['book']=$book;
            $tj[$key]['gsign']=$gsign;
            $tj[$key]['honour']=$honour;
            $tj[$key]['keyan']=$keyan;
            $tj[$key]['lsign']=$lsign;
            $tj[$key]['paper']=$paper;
            $tj[$key]['reward']=$reward;
            $tj[$key]['tchange']=$tchange;
            $tj[$key]['zhuanli']=$zhuanli;
            $tj[$key]['score']=$teacher['score'];
        }
        $this->assign('tj',$tj);
        $this->display('tj-list');
    }

    public function score()
    {
        $Teacher = M('teacher');
        if (IS_GET) {
            $id = I('get.id');
            $info = $Teacher->find($id);
            $this->assign('info', $info);
            $this->display();

        } elseif (IS_POST) {
            $data = I('post.');
            if (!empty($data['id'])) {
                $res = $Teacher->save($data);
            }

            if ($res === false) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败'));
            } else {
                $this->ajaxReturn(array('status' => 1, 'msg' => '修改成功'));
            }
        }
    }
    
    public function set()
    {
        $Base = M('base_score');
        if (IS_GET) {
            $id = I('get.id');
            $info = $Base->find($id);
            $this->assign('info', $info);
            $this->display();

        } elseif (IS_POST) {
            $data = I('post.');
            if (empty($data['id'])) {
                $res = $Base->add($data);
            } else {
                $res = $Base->save($data);
            }

            if ($res === false) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败'));
            } else {
                $this->ajaxReturn(array('status' => 1, 'msg' => '修改成功'));
            }
        }
    }

    public function set_show()
    {
        $Base = M('base_score');
        $info = $Base->select();
        $this->assign('info', $info);
        $this->display();
    }

    public function del()
    {
        $id=I('post.id');
        $Base=M('base_score');
        $res=$Base->delete($id);
        if($res === false || $res == 0){
            $this->ajaxReturn(array('status'=>0,'msg'=>''));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>''));
        }
    }
}