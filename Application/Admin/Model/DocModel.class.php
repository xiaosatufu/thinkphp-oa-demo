<?php
namespace Admin\Model;
use Think\Model;
class DocModel extends Model {
    //saveData
    public function saveData($post,$file) {
            // dump($file); die;
            // dump($post); die;
            if (!$file['error']) {
                //定义配置
                $cfg = array(
                        //配置上传路径
                        'rootPath'  => WORKING_PATH . UPLOAD_ROOT_PATH
                    );
                //处理上传
                $upload = new \Think\Upload($cfg);
                //开始上传
                $info = $upload -> uploadOne($file);
                // dump($info); die;
                if($info) {
                    $post['filepath'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                    $post['filename'] = $info['name'];
                    $post['hasfile'] = 1;
                }
            }
            $post['addtime'] = time();
            // dump($post);die;
            // $model = M('Doc');
            return  $this -> add($post);
    }

    public function updateData($post,$file) {
        //如果有文件则处理文件
        if($file['error'] == '0') {
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            // dump($info); die;
            if($info) {
                $post['filepath'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['filename'] = $info['name'];
                $post['hasfile'] = 1;
            }
            // dump($post);
        }
        //写入数据
         return $this -> save($post);
    }
}


