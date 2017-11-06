<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Cate extends Controller
{
  public function cate()
  {
    $cateid = input('cateid');
    $cates = Db::name('cate') -> find($cateid);
    $this -> assign('cates',$cates);

    $articles = Db::name('article')-> where(array('cateid' => $cateid)) -> select();
    $this -> assign('articles',$articles);

    $tags = Db::name('tags') -> select();
    $this -> assign('tags',$tags);

    return $this -> fetch('cate');
  }
}
