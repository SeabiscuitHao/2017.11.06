<?php
namespace app\admin\controller;
use think\Controller;
use think\Model as ArticleModel;
use think\Db;
class Article extends controller
{
  public function index()
  {
    $list = ArticleModel::paginate(3);
    $this -> assign('list',$list);
    return $this -> fetch('index');
  }

  public function lst()
  {
    $list = Db::name('article') -> paginate(3);
    $this -> assign('list',$list);
    return $this -> fetch('lst');
  }


  public function add()
  {
    if (request() -> isPost()) {
      $data=[
        'title' => input('title'),
        'author' => input('author'),
        'pic' => input('pic'),
        'content' => input('content'),
        'time' => time(),
        'cateid' => input('cateid'),
        'click' => input('click'),
      ];
      if ($data['click'] == '') {
        $data['click'] = 0;
      }
      if ($_FILES['pic']['tmp_name']) {
            $file = request() -> file('pic');//获取到图片
            $info = $file -> move(ROOT_PATH . 'public' . DS . 'static/uploads');
            $data['pic'] = '/uploads/'.$info -> getSaveName();
          }
      $insert = Db::name('article') -> insert($data);
      if ($insert) {
        $this -> success('添加文章成功！','lst');
      }else{
        $this -> error('添加文章失败！');
      }
    }
    $cates = Db::name('cate') -> select();
    $this -> assign('cates',$cates);
    $tags = Db::name('tags') -> select();
    $this -> assign('tags',$tags);
    return $this -> fetch('add');
  }


  public function edit()
  {
    $id = input('id');
    $articles = Db::name('article') -> find($id);
    if (request() -> isPost()) {
      $data=[
        'title' => input('title'),
        'author' => input('author'),
        'time' => time(),
        'pic' => input('pic'),
        'content' => input('content'),
        'cateid' => input('cateid'),
      ];
      if ($_FILES['pic']['tmp_name']) {
            $file = request() -> file('pic');//获取到图片
            $info = $file -> move(ROOT_PATH . 'public' . DS . 'static/uploads');
            $data['pic'] = '/uploads/'.$info -> getSaveName();
          }
      $save = Db::name('article') -> update($data);
      if($save){
        $this -> success('修改文章成功!','lst');
      }else{
        $this -> error('修改文章失败!');
      }
    }
    $cates = Db::name('cate') -> select();
    $this -> assign('cates',$cates);
    $this -> assign('articles',$articles);
    return $this -> fetch('edit');
  }

  public function del()
  {
    $id = input('id');
    if ($id) {
      Db::name('article') -> where('id','=',$id) -> delete();
      $this -> success('删除文章成功!','lst');
    }else{
      $this -> error('删除文章失败!');
    }
  }
}
