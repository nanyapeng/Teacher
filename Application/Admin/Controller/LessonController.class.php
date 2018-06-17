<?php
namespace Admin\Controller;
class LessonController extends CommonController
{
    public function index()
    {
        $Lesson = M('lesson');
        $t_name = session('u_name');
        if ($t_name == 'admin') {
            $info = $Lesson->select();
        } else {
            $info = $Lesson->where("name='$t_name'")->select();
        }

        $this->assign('lesson', $info);
        $this->display('lesson-list');
    }

    public function add()
    {
        if (IS_GET) {
            $this->display('lesson-add');
        } elseif (IS_POST) {
            $Lesson = M('lesson');
            $code = I('post.code');   //课程编号
            $have = $Lesson->where("code = '{$code}'")->find();
            if (!empty($have)) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '该课程已经添加'));
            }
            $data = I('post.');
            $t_id = session('u_id');
            $data['t_id'] = $t_id;
            $res = $Lesson->add($data);
            if ($res) {
                $this->ajaxReturn(array('status' => 1, 'msg' => ''));
            } else {
                $this->ajaxReturn(array('status' => 0, 'msg' => '添加失败'));
            }
        }
    }

    public function edit()
    {
        $Lesson = M('lesson');
        if (IS_GET) {
            $id = I('get.id');
            $info = $Lesson->find($id);
            $this->assign('info', $info);
            $this->display('lesson-add');
        } elseif (IS_POST) {
            $data = I('post.');
            $res = $Lesson->save($data);
            if ($res === false) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败'));
            } elseif (!empty($res)) {
                $this->ajaxReturn(array('status' => 1, 'msg' => ''));
            }

        }
    }

    public function search()
    {

        $info = $this->c_search('lesson');
        $this->assign('lesson', $info);
        $this->display('lesson-list');
    }

    public function excel(){
        import("ORG.Yufan.Excel");
        $list = M('lesson')->select();
        $row=array();
        $row[0]=array('序号','id','教师','课程名','课程代码','学时','考试方式','上课教室','上课时间','开始时间','结束时间','备注');
        $i=1;
        foreach($list as $k=>$v){
            $row[$i]['i'] = $i;
            $row[$i]['id'] = $v['id'];
            $row[$i]['name'] = $v['name'];
            $row[$i]['title'] = $v['title'];
            $row[$i]['code'] = $v['code'];
            $row[$i]['score'] = $v['score'];
            $row[$i]['exam'] = $v['exam'];
            $row[$i]['classroom'] = $v['classroom'];
            $row[$i]['time'] = $v['time'];
            $row[$i]['start'] = $v['start'];
            $row[$i]['end'] = $v['end'];
            $row[$i]['remark'] = $v['remark'];
            $i++;
        }

        $xls = new \Excel_XML('UTF-8', false, 'datalist');
        $xls->addArray($row);
        $xls->generateXML("lesson");
    }

}