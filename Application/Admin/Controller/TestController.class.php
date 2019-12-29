<?php
namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller{
    public function test1(){
        echo "我是Test控制器下的test1方法";
        $title="hao365网址之家登录";
        $this->assign("title",$title);
        $this->display();
    }

    public function test2(){
        echo "我是Test控制器下的test2方法";
    }
}