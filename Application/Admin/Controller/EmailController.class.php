<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends CommonController {
    public function send() {
        //判断请求的类型
        if(IS_POST) {
            //处理数据
            $post = I('post.');
            //实例化自定义模型
            $model = D('Email');
            //调取具体类中的方法实现数据保存
            $result = $model -> addData($post,$_FILES['file']);
            if($result) {
                $this -> success('邮件发送成功',U('sendBox'),3);
            } else {
                $this -> error('邮件发送失败');
            }
        } else {
            // 展示模板
            //查询收件人的信息
            $data = M('User') -> field('id,truename') -> where("id !=" . session('id')) -> select();
            // dump($data); die;
            $this -> assign('data',$data);
            $this -> display();
        }
    }

    public function sendBox() {
        //当前用户已经发送的邮件
        $data = M('Email') -> field('t1.*,t2.truename as truename') -> alias('t1') -> join('left join sp_user as t2 on t1.to_id = t2.id')  -> where('t1.from_id =' . session('id')) -> select();
        // dump($data);
        $this -> assign('data',$data);
        $this -> display();
    }

    public function download() {
        $id = I('get.id');
        $data = M('Email') -> find($id);
        $file = WORKING_PATH . $data['file'];
        //输出文件
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        //输出缓冲区
        readfile($file);
    }

    public function recBox() {
        $data = M('email') -> field('t1.*,t2.truename as truename') -> alias('t1') -> join('left join sp_user as t2 on t1.from_id = t2.id') -> where('t1.to_id =' . session('id')) -> select();
        // dump($data);
        //传递数据给模板
        $this -> assign('data',$data);
        $this -> display();
    }

    public function getContent() {
        $id = I('get.id');
        $data = M('Email') -> where("id = $id and to_id = " .session('id')) -> find();
        //如果data为真则修改邮件的状态
        if ($data['isread']=='0') {
            M('Email') -> save(array('id' => $id,'isread'=>1));
            # code...
        }
        echo $data['content'];
        // dump($data);
    }

    public function getCount() {
        // $data = M('Email');
        if(IS_AJAX) {
            //实例化模型
            $model = M('Email');
            //查询当前用户未读邮件的数量
            $count = $model ->where("isread=0 and to_id = " . session('id')) -> count();
            echo $count;
        }
    }

    // public function _empty() {
        //针对当前的控制器
        // echo "您访问的" . ACTION_NAME ."不存在";
        // $this -> display();
        // $this -> display('Empty/error');
    // }
}


 ?>
