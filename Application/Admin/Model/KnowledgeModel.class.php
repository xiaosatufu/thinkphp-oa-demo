<?php
namespace Admin\Model;
use Think\Model;
class KnowledgeModel extends Model {
    public function addData($post,$file) {
        //判断是否有文件需要处理
        //要求size大于0 或者error 等于0
        if($file['error'] == '0') {
            $cfg = array(
                'rootPath'  => WORKING_PATH . UPLOAD_ROOT_PATH

                );
            //实例化上传类
            $upload = new \Think\Upload($cfg);
            //上传
            $info = $upload -> uploadOne($file);
            // dump($info); die;
            if($info) {
                //成功之后补全字段
                $post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                //制作缩略图
                //实例化类
                $image = new \Think\Image();
                $image -> open(WORKING_PATH . $post['picture']);
                //制作缩略图，等比缩放
                $image -> thumb(100,100);
                //保存图片 保存完整路径  目录加上文件名
                $image -> save(WORKING_PATH . UPLOAD_ROOT_PATH .$info['savepath'] .'thumb_' . $info['savename']);
                $post['thumb'] = UPLOAD_ROOT_PATH .$info['savepath'] .'thumb_' . $info['savename'];
            }
        }
        //补全字段
        $post['addtime'] = time();
        // dump($post); die;
        //添加操作
        return $this -> add($post);

    }
}


 ?>
