<?php
namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller{
    public function test1(){
        echo "����Test�������µ�test1����";
        $title="hao365��ַ֮�ҵ�¼";
        $this->assign("title",$title);
        $this->display();
    }

    public function test2(){
        echo "����Test�������µ�test2����";
    }
}