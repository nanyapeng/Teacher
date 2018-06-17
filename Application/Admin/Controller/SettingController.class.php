<?php
namespace Admin\Controller;
class SettingController extends CommonController
{


    public function email()
    {
        $Email = M('email');
        if (IS_GET) {
            $info = $Email->find();
            $this->assign('info', $info);
            $this->display();

        } elseif (IS_POST) {
            $data = I('post.');
            if (empty($data['id'])) {
                $res = $Email->add($data);
            } else {
                $res = $Email->save($data);
            }

            if ($res === false) {
                $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败'));
            } else {
                $this->ajaxReturn(array('status' => 1, 'msg' => '修改成功'));
            }
        }
    }


}