<?php


namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller {
    //登录
    public function test() {
        $array  = array('西游记','红楼梦','三国演义','水浒传');
        $this -> assign('array',$array);
        $this->display();
    }
    public function test2() {
        $time = time();
        //传递给末班
        //定义字符串
        $str = 'AbcDeFghiJk';
        $this -> assign('time',$time);
        $this -> assign('str',$str);
        $this -> display();
    }
    //默认值
    public function test3() {
        $str = '';
        //$str = $str ? $str : 'sss';
        $this -> assign('str',$str);
        $this ->display();
    }

    //系统变量
    public function test4() {
        $this->display();
    }

    //视图中使用函数
    /**
     * 语法格式
     * {$变量 | 函数名1 | 函数名2 =参数1，参数2......}
     * 参数说明
     * $变量:模板变量
     * |：变量修饰符
     * 函数名1：表示需要使用的第一个函数
     * 函数名2：表示需要使用的第二个函数
     *
     */

    public function test11() {
        //定义时间戳
        $time = time();
        //传递给模板
        $this -> assign('time',$time);
        $this ->display();
        /**
         * data(Y-m-d H:i:s)
         */
    }

    public function test13() {
        $a = 100;
        $b = 10;
        $this ->assign('a',$a);
        $this ->assign('b',$b);
        $this -> display();
    }

    public function head() {
        $this -> display();
    }
    public function body() {
        $this -> display();
    }
    public function foot() {
        $this -> display();
    }


    public function test17() {
        //实例化模型
        $model = M('Dept');
        //查询
        $data = $model -> select();
        //获取sql语句
        echo $model -> getLastSql();

        echo $model -> _sql();
    }

    //性能测试
    public function  test18() {
        //定义开始标记
        G('begin');
        for($i = 0;i<1000;$i++) {
            echo $i;
        }
        echo "<hr />";
        G('end');
        //统计开始
        echo G('begin','end',4);
    }

    //AR模式增加操作
    public function test19() {
        //第一个映射：类映射表（类关联表）
        $model = M('Dept');
        $model -> name = '技术部';
        $model -> pid = '0';
        $model -> sort = '10';
        $model -> remark = '技术部门';
        //第三个映射：实例映射记录
        $result = $model -> add();//没有参数
        dump($result);
    }


    //AR模式修改操作
    public function test20() {
        $model = M('Dept');
        $model -> id ='5';//确定主键信息
        $model -> name ='法务部';
        $model -> remark ='this is法务部';
        //修改操作
        $result = $model ->save();
        dump($result);
    }
    //AR模式删除操作
    public function test21() {
        $model = M('Dept');
        $model -> id ='6,7'; //属性可以指定1个主键也可以指定多个主键
        $result  = $model -> delete();
        dump($result);
    }
    //AR模式可以不指定主键信息

    public function test22() {
        $model = M('Dept');
        $data = $model ->find();
        $model -> pid = '1';
        $res = $model -> save();
        dump($res);
    }


    /**
     * where 方法
     * @return [type] [description]
     */
    public function test23() {
        $model = M('Dept');

        $res = $model -> where('id>15') -> select();
        dump($res);
    }


    /**
     * limit方法
     * 分页
     */

    public function test24() {
        $model = M('dept');
        //查询前N条
        $res = $model -> limit(3) -> select();
        // $res = $model -> limit(1,5) -> select();
        dump($res);
    }

    /**
     * field方法
     * @return [type] [description]
     */
    public function test25() {
        $model = M('Dept');
        $res = $model
                    -> field('name,pid,remark')
                    -> select();
        dump($res);
    }

    /**
     * order 方法
     */
    public function test26() {
        $model = M('Dept');
        $model -> order('id desc');
        $res = $model -> select();
        dump($res);
    }


    /**
     * group方法
     * 分组查询
     */
    public function test27() {
        $model = M('Dept');
        $model -> field('name,count(*) as count');
        $model -> group('name');
        $data = $model -> select();
        dump($data);
    }

    /**
     * count
     */
    public function test29() {
        $model = M('Dept');
        $count = $model -> count();
        dump($count);
    }
    /**
     * max
     */
    public function test30() {
        $model = M('Dept');
        $max = $model -> max('id');
        dump($max);
    }
    /**
     * min
     */
    public function test31() {
        $model = M('Dept');
        $min = $model -> min('id');
        dump($min);
    }
    /**
     * avg
     */
    public function test32() {
        $model = M('Dept');
        $avg = $model -> avg('id');
        dump($avg);
    }
    /**
     * sum
     */
    public function test33() {
        $model = M('Dept');
        $sum = $model -> sum('id');
        dump($sum);
    }

    /**
     * fetchSql
     * $model -> where() -> limit() -> .....-> order() ->fetchSql(true) -> CURD;
     * fetchSql thinkphp 3.2.3 之后
     */
    public function test34() {
        $model = M('Dept');
        $data = $model
        -> field('name,count(*) as count')
        -> group('name')
        -> fetchSql(true)
        -> select();
        dump($data);
    }
  //特殊类的实例化
  public function test35() {
    $model = D('Szphp');
    dump($model);
  }

  public function test36() {
    //1、设置
    session('name','韩梅梅');
    session('name2','李雷');
    dump($_SESSION);
    //读取单个
    $value = session('name');
    dump($value);
    //3、清空单个
    session('name',null);
    dump($_SESSION);
    //4、全部删除
    session('name3','马冬梅');
    // session(null);
    dump($_SESSION);
    //5、判断某个session是否存在

    dump(session('?name2'));
  }

  public function test37() {
    cookie('name1','2');
    dump(cookie());
    //1、设置没有有效期的cookie
    cookie('name','xialuo');
    //、设置带有有效期的cookie
    cookie('name2','shashibiya',3600);
    //3、获取单个cookie值
    dump(cookie('name2'));
    //4、清空单个
    cookie('name',null);
  }

  public function test38() {
    //使用函数
    gbk2utf8();
    phpinfo();
  }

  //load方法
  public function test39() {
    load('@/hello');
    sayHello(11);
  }

  public function test41() {
    //配置
    $cfg = array(
        'fontSize'  =>  16,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点
        'imageH'    =>  0,               // 验证码图片高度
        'imageW'    =>  0,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
    //实例化验证码类
    $verify = new \Think\Verify($cfg);
    //输出验证码
    $verify -> entry();
  }


  public function test42() {
    $cfg = array(

        'fontSize'  =>  16,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点
        'imageH'    =>  0,               // 验证码图片高度
        'imageW'    =>  0,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'useZh'     =>  true,           // 使用中文验证码
        'fontttf'   =>  '1.ttf',              // 验证码字体，不设置随机获取

        );
    //实例化验证码类
    $verify = new \Think\Verify($cfg);
    //输出验证码
    $verify -> entry();
  }



  //table 方法
 public function test43() {

    $model = M();
    // $sql = "SELECT t1.*,t2.name as deptname FROM sp_user as t1,sp_dept as t2 WHERE t1.dept_id = t2.id";
    // $result = $model -> query($sql);
    //
    //连贯操作
    $result = $model -> field('t1.*,t2.name as deptname') -> table('sp_user as t1,sp_dept as t2') -> where('t1.dept_id = t2.id') -> select();
    dump($result);

 }

    // join方法
    public function test44() {
        $model = M('Dept');
        $result = $model ->  field('t1.*,t2.name as deptname') -> alias('t1') -> join('left join sp_dept as t2 on t1.pid = t2.id') ->  select();
        dump($result);
    }


    public function test45() {
        echo get_client_ip();
    }

    public function test46() {
        $ip = new \Org\Net\IpLocation('qqwry.dat');
        //查询
        $data = $ip -> getlocation('200,181,65,66');
        dump($data);
    }


}


 ?>
