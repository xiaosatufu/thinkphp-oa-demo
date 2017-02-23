<?php

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {
    //登录
    public function login() {
        $this->display();
    }
    public function captcha() {
        //配置
        $cfg = array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'imageH'    =>  38,               // 验证码图片高度
            'imageW'    =>  80,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $verify = new \Think\Verify($cfg);
        $verify -> entry();
    }
    public function checkLogin() {
        $post = I('post.');
        // dump($post);
        // 验证验证码  不需要传参
        $verify = new \Think\Verify();
        //验证
        $result = $verify -> check($post['captcha']);
        // dump($result);
        if($result) {
            $model = M('User');
            //删除验证码元素
            unset($post['captcha']);
            //查询
            $data = $model -> where($post) -> find();
            //判断是否存在用户
            if($data) {
                //存在用户
                //用户信息持久化，保存在session 中，跳转到后台的首页
                session('id',$data['id']);
                session('username',$data['username']);
                session('role_id',$data['role_id']);
                //跳转到后台首页
                $this -> success('登录成功^_^',U('Index/Index'),3);
            } else {
                //不存在用户
                $this -> error('用户名或者密码错误');
            }
        } else {
            $this -> error('您输入的验证码错误');
        }
    }

    public function logout() {
        //清楚session
        session(null);
        //跳转到登录页面
        $this -> success('登出成功',U('login'),3);
    }
}



