<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends CommonController {
    public function add() {
        if (IS_POST) {
            $post = I('post.');
            $model = D('Doc');
            $result = $model -> saveData($post,$_FILES['file']);
            if ($result) {
                $this -> success('添加成功',U('showList'),3);
            } else {
                $this -> error('添加失败');
            }
        } else {
            $this -> display();
        }
    }
    public function showList() {
        $model = M('Doc');
        $data = $model -> select();
        $this -> assign('data',$data);
        // dump($data);
        $this -> display();
    }


    //download 方法
    public function download() {
        $id = I('get.id');
        $data = M('Doc') -> find($id);
        $file = WORKING_PATH . $data['filepath'];
        //输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        //输出缓冲区
        readfile($file);
    }
    //showContent方法
    public function showContent() {
        $id = I('get.id');
        $data = M('Doc') -> find($id);
        echo htmlspecialchars_decode($data['content']);
    }


    public function edit() {
        //判断请求的类型
        if (IS_POST) {
            $post = I('post.');
            $model  = D('Doc');

            //调用updateData
            $result = $model -> updateData($post,$_FILES['file']);
            if ($result) {
                $this -> success('添加成功',U('showList'),3);
            } else {
                $this -> error('保存失败');
            }



        } else {
            $id = I('get.id');
            $data = M('Doc') -> find($id);
            // dump($data); die;
            //变量分配
            // $data -> ;
            $this -> assign('data',$data);
            $this ->display();
        }
    }
}


 ?>
