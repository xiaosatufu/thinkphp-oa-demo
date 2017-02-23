<?php

namespace Admin\Controller;
// use Think\Controller;

class DeptController extends CommonController {
    //展示实例化的结果
    public function shilihua() {
        //普通实例化方法
        //$model  = new \Admin\Model\DeptModel();
        // $model = D('Dept');
        //$model = D(); //实例化了父类模型
        $model  = M('Dept');
        dump($model);
    }

    public function tianjia() {
        $model = M('Dept');
        //声明数组
        $data = array(
            'name'   => '财务部',
            'pid'       => 0,
            'sort'      => '1',
            'remark' => '财务部'
        );
        $result = $model -> add($data);//增加操作
        dump($result);
    }

    public function xiugai() {
        $model   = M('Dept');
        $data = array(
                 'id'         => '2', //如果没有主键信息，返回值为false
                'sort'      => '22',
                'remark' => '今天发工资'
            );
        $result = $model ->save($data);
        dump($result);
    }


    public function chaxun() {
        //实例化模型
        $model = M('Dept');
        //select 部门
        $data  =$model -> select();
        $data = $model -> select('2');
        $data = $model -> select('1,2');
        //find
        $data = $model -> find();
        $data = $model -> find('1');
        dump($data);
    }


    public function shanchu() {
        $model = M('Dept');
        $data = $model -> delete('1');
        dump($data);
    }

    public function add() {
        //判断请求类型
        if(IS_POST) {
            // $post = I('post.');
            //写入数据
            $model = D('Dept');
            //数据对象的创建
            $data = $model -> create(); //不传递参数则接受post数据
            // $result = $model -> add($post);
            if(!$data) {
                // dump($model -> getError()); die;
                $this -> error($model -> getError()); exit;
            }
            // dump($data); die;
            $result = $model -> add();
            if ($result) {
                $this->success('添加成功',U('showList'),3);
            } else {
                $this->error('添加失败');
            }
        } else {
            $model = M('Dept');
            $data = $model -> where('pid = 0') -> select();
            $this -> assign('data',$data);
            $this->display();
        }


    }
    public function showList() {
        $model  = M('Dept');
        $data = $model -> order('sort asc') -> select();
        foreach ($data as $key => $value) {
            // 查询pid对应的部门信息
            // dump($value); die;
            if ($value['pid']>0) {
                $info = $model -> find($value['pid']);
                // dump($info); die;
                //只需要保留其中的name
                $data[$key]['deptname'] = $info['name'];
                // dump($data);
            }
        }
        //使用load方法载入文件
        load('@/tree');
        $data = getTree($data);
        // dump($data);
        // dump($data);
        $this -> assign('data',$data);
        $this->display();
    }

    //edit
    public function edit() {

        if (IS_POST) {
            // // $post = I('post.');
            // //写入数据
            // $model = D('Dept');
            // //数据对象的创建
            // $data = $model -> create(); //不传递参数则接受post数据
            // // $result = $model -> add($post);
            // if(!$data) {
            //     // dump($model -> getError()); die;
            //     $this -> error($model -> getError()); exit;
            // }
            // // dump($data); die;
            // $result = $model -> add();
            // if ($result) {
            //     $this->success('添加成功',U('showList'),3);
            // } else {
            //     $this->error('添加失败');
            // }
            //
            $post = I('post.');
            $model = M('Dept');
            $result = $model -> save($post);
            if($result !== fasle) {
                $this->success('修改成功',U('showList'),3);
            }
            else {
                $this->error('修改失败');
            }
        } else {
            //接受ID
            $id = I('get.id');
            $model = M('Dept');
            //查询部门的信息
            $data = $model -> find($id);
            //查询全部的部门信息，给下拉列表使用
            $info = $model ->where('id != '.$id) ->select();
            //变量分配
            $this -> assign('data',$data);
            $this -> assign('info',$info);
            $this -> display();
        }
    }


    //del
    public function del() {
        $id = I('get.id');
        $model = M('Dept');
        $result = $model -> delete($id);
        if ($result) {
            $this -> success('删除成功');
        } else {
            $this -> error('删除失败');
        }
    }





}



