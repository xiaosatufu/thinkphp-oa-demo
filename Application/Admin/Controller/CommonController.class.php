<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    //构造方法 php提供
    // public function __construct() {

    //     //构造父类
    //     // parent::__construct();
    //     // echo '222';
    // }
    //thinkphp提供
    public function _initialize() {
        // echo '';
        // 判断用户是否登录
        $id = session('id');
        if(empty($id)) {
            //没有登录，跳转到登录的页面
            // $this -> error('请先登录...',U('Public/Login'),3);exit;
            //编写JavaScript代码
            $url = U('Public/login');
            echo "<script>top.location.href='$url'</script>";
        }
        //RBAC部分
        // dump(session('role_id'));die;
        $role_id = session('role_id');//获取当前用户的角色ID
        //使用C方法
        $rbac_role_auths = C('RBAC_ROLE_AUTHS'); //获取全部用户组的权限信息
        // dump($rbac_role_auths); die;
        $currRoleAuth = $rbac_role_auths[$role_id]; //获取到当前用户的权限
        //使用常量获取当前路由中的控制器名和方法名
        $controller = strtolower(CONTROLLER_NAME);
        // dump($controller); die;
        $action = strtolower(ACTION_NAME);

        if ($rold_id >1) {
            //当用户不是超级管理员的时候进行权限判断
            if(!in_array($controller. '/' . $action,$currRoleAuth) && !in_array($controller . '/*',$currRoleAuth)) {
                //用户没有权限
                $this -> error('您没有权限');exit;
            }
        }

    }
}




    ?>
