<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    public function login(){
        $this->display();
    }

    public function verify(){
        $config=array(
            'fontSize'=>15,
            'length'=>4,
            'useNoise'=>false,
            'imageW'=>108,
            'imageH'=>42,
            'codeSet'=>'0123456789',
        );
        $Verify=new \Think\Verify($config);
        $Verify->entry();
    }


    public function checkLogin(){
        $code=I('code');
        $verify=$this->checkCode($code);
        /*if($verify){
            echo "验证码正确！yzmzq";
        }else{
            echo "验证码错误yzmerro";
        }*/
        if(!$verify){
            $res['status']=0;
            $res['message']="验证码错误！";
            $this->ajaxReturn($res);
        }

        $username=I("username"," ","trim");
        $password=I("password"," ","trim");
        $return=$this->checkPassword($username,$password);
        /*if($return){
            echo "<br />";
            echo "登录成功dlsucc";
        }else{
            echo "<br />";
            echo "账号密码不匹配dlerro";
        }*/

        if(!$return){
            $res['status']  = 0;
            $res['message'] = '用户名或者密码错误!';
            $this->ajaxReturn($res);
        }else{
            $data = array(
                "loginip"  =>get_client_ip(),
                "logintime"=>date("Y-m-d H:i:s"),
            );
            M("admin")->save($data);                 //增加数据
            session('admin_id', $return["id"]);     //将admin_id存入session
            session('admin_username', $return["username"]); //将admin_username存入session
            $res['status']  = 1;
            $res['message'] = '登录成功!';
            $this->ajaxReturn($res);
        }

        session('admin_id',$return['id']);
        session('admin_user',$return["username"]);
    }

    public function checkCode($code){
        $verify=new  \Think\Verify();
        return $verify->check($code);
    }

    public function checkPassword($username,$password){
        $map['username']=$username;
        $admin=M('admin')->where($map)->find();

        if($admin['password']===$password){
            return $admin;
        }else{
            return false;
        }
    }

    public function logout(){
        session('admin_id',null);
        session('admin_username',null);
        $this->redirect("login");
    }

}