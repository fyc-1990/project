<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="x-ua-compatible"/>
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>admin/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CS_PATH;?>font-awesome.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo JS_PATH ?>DD_belatedPNG.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>Validform_Datatype.js"></script>


<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>artDialog/plugins/iframeTools.js" ></script>
<script type="text/javascript">
(function(config) {
	config['lock'] = true;
	config['fixed'] = true;
})(art.dialog.defaults);
</script>

<script type="text/javascript" src="<?php echo JS_PATH;?>common.js"></script>
</head>
<body>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.cookie.js"></script>
<style type="text/css">
/* 关闭消息提示x按钮 */
.tisi .closetips{float:right;margin-right:10px;color:#636363;}
.tisi .closetips:hover {color:red;text-decoration:none;}
</style>
<div class="content">
    <div class="site">
        <a href="#">站点设置</a> > 后台首页
    </div>
    <span class="line_white"></span>

    <div class="tisi mt5" tips-id="09">为了安全起见，建议您定期修改管理员密码。<a href="javascript:;" class="closetips" title="关闭后24小时内将不再显示">X</a></div>

    <dl class="box fl mt10">
        <dt><strong>网站信息统计</strong></dt>
        <dd>
            <ul class="odd3">
                <li><span><a href="<?php echo U('User/User/lists') ?>" title=""><i>32</i></a> 个</span>用户注册数：</li>
                <li><span><a href="<?php echo U('Bar/Bar/lists',array('label'=>3)) ?>" title=""><i>120</i></a> 件</span>酒吧商家数据：</li>
                <li><span><a href="<?php echo U('Message/Message/lists',array('label'=>2)) ?>" title=""><i>1200</i></a> 件</span>消息记录数：</li>
                <li><span><i>10</i> 个</span>今日注册会员：</li>
                <li><span><i>20</i> 个</span>用户订单数：</li>
            </ul>
        </dd>
    </dl>
    <dl class="box fr mt10">
        <dt><strong>系统信息</strong></dt>
        <dd>
            <ul class="odd4">
                <li><span><?php echo C('VERSION') ?>(UTF-8) Release <?php echo C('BUILD'); ?></span>程序版本：</li>
                <li><span><?php echo $sys_info['os'] ?> / PHP v<?php echo $sys_info['phpv'] ?></span>服务器系统及PHP：</li>
                <li><span><?php echo $sys_info['web_server'] ?></span>服务器软件：</li>
                <li><span><?php echo $sys_info['mysqlv'] ?></span>服务器MySQL版本：</li>
                <li><span><?php echo $sys_info['mysqlsize'] ?> MB</span>当前数据库尺寸：</li>
            </ul>
        </dd>
    </dl>
    <div class="clear"></div>

<script>
$(function(){
    $(".odd1 li:even").css("background","#fff");
    $(".odd2 li:even").css("background","#fff");
    $(".odd3 li:even").css("background","#fff");
    $(".odd4 li:even").css("background","#fff");
    $(".odd5 li:even").css("background","#fff");
    // 关闭系统提示信息
    var now_cookie = $.cookie('closetips');
    var str = '';
    $('.closetips').bind('click',function(){
        var obj = $(this);
        if (now_cookie != undefined && now_cookie != '') {
            var arr_cookie = new Array();
            arr_cookie = now_cookie.split(',');
            if ($.inArray(obj.parent().attr('tips-id'),arr_cookie) > -1) {
                str += now_cookie;
            } else {
                str += now_cookie + ',' + obj.parent().attr('tips-id');
            }
        } else {
            str += ',' + obj.parent().attr('tips-id');
        }
        $.cookie('closetips', str , { expires: 1 });
        obj.parent().fadeOut(1000);        
    })
    /* 将已关闭提示的消息隐藏 */
    if (now_cookie != undefined && now_cookie != '') {
        arr_cookie = now_cookie.split(',');
        var div = $('.closetips').parent();
        $.each(div,function(n, v) {
            if ($.inArray($(this).attr('tips-id'),arr_cookie) > -1) {
                $(this).attr('style','display:none;');
            }
        });
    }
});
</script>
<div class="copy"><span class="line_white"></span>  版权所有 © 2013-2015 <?php echo C('site_company');?>，并保留所有权利。</div>
</body>
</html>