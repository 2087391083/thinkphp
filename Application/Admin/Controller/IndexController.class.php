<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->redirect('HighLevel/lists');
    }

    public function changePassword(){
        if(IS_POST){
            $old_password = I('old_password',''); //接收原密码
            $new_password = I('new_password',''); //接收新密码
            $map['id']     =  session('admin_id'); 		//通过session获取管理员id
            $admin = M('admin')->where($map)->find();  //查找原密码
            if($old_password === $admin['password']){  //检测原始密码是否正确
                $admin = M('admin')->where($map)->setField('password',$new_password); //更改密码
                if($admin !== false){
                    $res['status']  = 1;
                    $res['message'] = '更改成功';
                    $this->ajaxReturn($res);
                }else{
                    $res['status']  = 0;
                    $res['message'] = '更改失败';
                    $this->ajaxReturn($res);
                }
            }else{
                $res['status']  = 0;
                $res['message'] = '更改失败，原始密码错误';
                $this->ajaxReturn($res);
            }
        }else{
            $this->display();
        }
    }
}