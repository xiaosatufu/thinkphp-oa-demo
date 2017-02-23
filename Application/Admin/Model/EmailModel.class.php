<?php
namespace Admin\Model;

use Think\Model;


class EmailModel extends Model {
    public function addData($post,$file) {
        // dump($file); die;
        if($file['error'] == '0') {
            //有文件需要处理
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            //实例化上传类
            $upload = new \Think\Upload($cfg);
            //开始上传
            $info = $upload -> uploadOne($file);
            // dump($info); die;
            // 判断上传的结果
            if($info) {
                //上传成功
                //file hasfile filename
                $post['file']  = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['hasfile'] = '1';
                $post['filename']  = $info['name'];
            }
        }
            //补充字段form_id addtime
            $post['from_id'] = session('id');
            $post['addtime'] = time();
            // dump($post); die;
            //数据的保存
            return $this -> add($post);
    }
}


 ?>
