<?php
namespace app\index\controller;
// use app\index\model\Article as ArticleModel;
use think\Controller;
use think\Db;
class Article extends Controller
{
  public function article()
  {
    $arid = input('arid');
    $this -> assign('arid',$arid);

    // $tags = ArticleModel::with('article') -> order('id desc') -> field('id,title,author,pic,content,click,cateid,time,desc,tagid') -> find();
    $tags = Db::name('tags') -> select();
    $this -> assign('tags',$tags);

    $articleres = Db::name('article') -> where('id','=',$arid) -> select();
    $this -> assign('articleres',$articleres);
    return $this -> fetch('article');
  }
}
