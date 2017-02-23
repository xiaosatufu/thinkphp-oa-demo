<?php
namespace Admin\Controller;
use Think\Controller;

/**
*
*/
class UserController extends CommonController
{
    public function add() {
        if (IS_POST) {
            //处理表单提交
            $model = M('User');
            //创建数据对象    create默认接受post数据
            $data = $model -> create();
            $data['addtime'] = time();
            $result = $model ->add($data);
            if ($result) {
                $this -> success('添加成功',U('showList'),3);
            } else {
                $this -> error('添加失败');
            }
        } else {
            $data = M('Dept') -> field('id,name') -> select();
            $this -> assign('data',$data);
            $this -> display();
        }
    }
    public function showList() {
        $model = M('User');
        //分页第一步查询总的记录数
        $count = $model -> count();
        // dump($count);
        //分页第二布实例化分页类，并且传递参数
        $page = new \Think\Page($count,1);
        //分页第三步：可选步骤，定义提示文字
        $page -> rollPage = 5;
        $page -> lastSuffix = false; // 最后一页是否显示总页数
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('last','末页');
        $page -> setConfig('first','首页');
        //分页第四步使用show方法生成url
        $show = $page-> show();
        // dump($show);
        // 分页第五步使用limit方法查询数据
        $data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
        // dump($data);
        //

        //展示数据
        // $data = $model -> select();
        //.展示模板
        $this -> assign('data',$data);
        //分页第六步
        $this -> assign('show',$show);
        //分页第七步
        $this -> display();
    }

    public function charts() {
        //SELECT t2.name as deptname,count(*) as count from sp_user as t1 ,sp_dept as t2 where t1.dept_id = t2.id GROUP BY deptname
        $model = M();
        $data = $model -> field('t2.name as deptname,count(*)') -> table('sp_user as t1 ,sp_dept as t2') -> where('t1.dept_id = t2.id') -> group('deptname') -> select();
        // dump($data);
        $str = '[';
        foreach ($data as $key => $value) {
            $str .= "['" .$value['deptname'] . "'," . $value['count(*)'] . "],";
        }
        $str = rtrim($str,',') . ']';
        // echo  $str;
        $this -> assign('str',$str);
        $this -> display();
    }
}

 ?>
