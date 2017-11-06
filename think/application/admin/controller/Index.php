<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
  public function index()
  {
    if (session('admin_name') == null) {
      $this -> error('请先登陆！','login/login');
    }
    return $this -> fetch('index');
  }
}
