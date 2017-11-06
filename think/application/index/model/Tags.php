<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Tags extends Model
{
  public function article()
  {
    return $this -> hasMany('article','id','tagid');
  }
}
