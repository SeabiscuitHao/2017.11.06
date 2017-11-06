<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Tags extends controller
{
  public function index()
  {
    return $this -> fetch('tags');
  }

  public function lst()
  {
    $tags = Db::name('tags') -> paginate(3);
    $this -> assign('tags',$tags);
    return $this -> fetch('lst');
  }


  public function add()
  {
    if (request() -> isPost()) {
      $data=[
        'tagname' => input('tagname'),
      ];
      $insert = Db::name('tags') -> insert($data);
      if ($insert) {
        $this -> success('添加标签成功！','lst');
      }else{
        $this -> error('添加标签失败！');
      }
    }
    return $this -> fetch('add');
  }


  public function edit()
  {
    $id = input('id');
    $tagss = Db::name('tags') -> find($id);
    if (request() -> isPost()) {
      $data=[
        'tagname' => input('tagname'),
      ];
      $save = Db::name('tags') -> update($data);
      if($save){
        $this -> success('修改标签成功!','lst');
      }else{
        $this -> error('修改标签失败!');
      }
    }
    $this -> assign('tagss',$tagss);
    return $this -> fetch('edit');
  }

  public function del()
  {
    $id = input('id');
    if ($id) {
      Db::name('tags') -> where('id','=',$id) -> delete();
      $this -> success('删除标签成功!','lst');
    }else{
      $this -> error('删除标签失败!');
    }
  }
}
