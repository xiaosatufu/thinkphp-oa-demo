<?php
namespace Admin\Controller;
use Think\Controller;

class KnowledgeController extends CommonController {
    public function add() {
        if(IS_POST) {
            $post = I('post.');
            $model = D('Knowledge');
            $result = $model -> addData($post,$_FILES['thumb']);
            if($result) {
                $this -> success('添加成功',U('showList'),3);
            } else {
                $this -> error('添加失败');
            }
        }
        $this -> display();
    }
    public function showList() {

        //获取数据
        $data = M('Knowledge') -> select();
        $this -> assign('data',$data);
        //展示模板
        $this -> display();
    }


    public function download() {
        $id = I('get.id');
        $data = M('Knowledge') -> find($id);

        $file = WORKING_PATH . $data['picture'];
        //输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        //输出缓冲区
        readfile($file);
    }
}

 ?>
