<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index(){
        //1.获取留言数据
        $msgs = M('msg')->select();
        //传递给视图
        $this->assign('msgs',$msgs);
        //加载视图
        $this->display('index');
    }  


    public function add(){
    	//1.判断提交方式
    	if (IS_POST) {
    		//接收数据
    		$postData = I('post.');
    		$postData['create_at']=$postData['updated_at']=time();
    		//入库
    		$rs = M('msg')->add($postData);
    		//判断
    		if ($rs) {
    			$this->success('操作成功',U('msg/index'));
    		}else{
    			$this->error('操作失败',U('msg/index'));
    		}
    	}
    }

}