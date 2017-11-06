<?php
namespace app\admin\model;
use think\Model;
class Article extends model
{
  public function article()
  {
    $this -> belongsTo('cate',$cateid);
  }
}
