<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
  public function index()
  {
    $articleres = Db::name('article') -> order('id desc') -> paginate(3);
    $this -> assign('articleres',$articleres);
    $tags = Db::name('tags') -> select();
    $this -> assign('tags',$tags);
    return $this -> fetch('index');
  }
}
