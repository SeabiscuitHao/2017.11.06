<?php
namespace app\admin\model;
use think\Controller;
use think\Db;
class Admin extends Controller
{
  public function login($data)
  {
    $user = Db::name('admin') -> where('admin_name','=',$data['admin_name']) -> find();
    if ($user) {
      if ($user['password'] == $data['password']) {
        session('admin_name',$user['admin_name']);
        session('id',$user['id']);
        return 1;
      }else{
          return 2;
      }
    }else{
      return 3;
    }
  }
}
