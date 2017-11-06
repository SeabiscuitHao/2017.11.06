<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Article extends Model
{
  public function tags()
  {
    return $this -> belongsTo('tags','tagid');
  }
}
