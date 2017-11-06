<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"F:\www\youme\think\public/../application/admin\view\article\lst.html";i:1509629331;s:68:"F:\www\youme\think\public/../application/admin\view\common\head.html";i:1509360873;s:68:"F:\www\youme\think\public/../application/admin\view\common\left.html";i:1509370159;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main.css"/>
    <script type="text/javascript" src="__PUBLIC__/js/libs/modernizr.min.js"></script>
</head>
<style type="text/css">
  .list-page ul li{
    float: left;
  }
</style>
<body>
  
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?php echo \think\Request::instance()->session('admin_name'); ?></a></li>
                <li><a href="<?php echo url('admin/edit',array('id' => \think\Request::instance()->session('id'))); ?>">修改密码</a></li>
                <li><a href="<?php echo url('Login/login'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container clearfix">
  
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo url('article/lst'); ?>"><i class="icon-font">&#xe008;</i>作品管理</a></li>
                        <li><a href="<?php echo url('admin/lst'); ?>"><i class="icon-font">&#xe005;</i>管理员管理</a></li>
                        <li><a href="<?php echo url('tags/lst'); ?>"><i class="icon-font">&#xe006;</i>标签管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.html"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo url('article/add'); ?>"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>审核状态</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>简介</th>
                            <th>缩略图/th>
                            <th>更新时间</th>
                            <th>标签</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="tc"><input name="id[]" value="<?php echo $vo['id']; ?>" type="checkbox"></td>
                            <td>
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td><?php echo $vo['id']; ?></td>
                            <td title="<?php echo $vo['title']; ?>"><a target="_blank" href="#" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a>
                            </td>
                            <td>0</td>
                            <td>2</td>
                            <td><?php echo $vo['author']; ?></td>
                            <td><?php echo $vo['desc']; ?></td>
                            <td>
                              <?php if($vo['pic'] == ''): ?>
                              暂无缩略图
                              <?php else: ?>
                              <img src="__IMG__<?php echo $vo['pic']; ?>" width="50px" alt="">
                              <?php endif; ?>
                            </td>
                            <td><?php echo date("Y-m-d",$vo['time']); ?></td>
                            <td>{}</td>
                            <td>
                                <a class="link-update" href="<?php echo url('article/edit',array('id' => $vo['id'])); ?>">修改</a>
                                <a class="link-del" href="<?php echo url('article/del',array('id' => $vo['id'])); ?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"><?php echo $list -> render(); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
