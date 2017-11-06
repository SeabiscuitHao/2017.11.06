<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
class Login extends Controller
{
  public function login()
  {
    if (request() -> isPost()) {
      $admin = new Admin();
      $data = input('post.');
      $num = $admin -> login($data);
      if ($num == 1) {
        $this -> success('登陆成功，请稍等...','index/index');
      }elseif($num == 2){
        $this -> error('用户信息不正确！');
      }else{
        $this -> error('用户信息不正确！');
      }
    }
    return $this -> fetch('login');
  }
}
