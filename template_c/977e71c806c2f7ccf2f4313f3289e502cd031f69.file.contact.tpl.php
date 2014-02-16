<?php /* Smarty version Smarty3-RC3, created on 2014-02-16 15:15:51
         compiled from "D:\xampp\htdocs/template/web/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133975300c817050bf7-75547757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '977e71c806c2f7ccf2f4313f3289e502cd031f69' => 
    array (
      0 => 'D:\\xampp\\htdocs/template/web/contact.tpl',
      1 => 1392560134,
    ),
    '88e72bd131a0230f8b7eab7e8d3e9849a49cedb3' => 
    array (
      0 => 'D:\\xampp\\htdocs/template/lib/framework/base_fw.html',
      1 => 1392559622,
    ),
  ),
  'nocache_hash' => '133975300c817050bf7-75547757',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>比艾诺艺术中心(52piano.cn) - 联系我们</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="少儿钢琴培训，学钢琴，钢琴课，儿童钢琴培训班，常州钢琴培训学校，钢琴培训中心，常州钢琴培训中心，钢琴老师，钢琴学习，常州钢琴学习，常州艺术培训，常州钢琴"/>
        <meta name="description" content="比艾诺艺术中心欢迎您的光临，欢迎来电咨询13196799363。" />
        
        <link href="/static/css/52piano.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <div id="header">
		
            <a href="/" title="比艾诺艺术中心" class="logo"><img src="/static/img/logo.png" /></a>
			
            <div class="nav-channel">
                <ul class="nav-channel-list">
					<li><a href="/" title="首页" alt="首页">首页</a></li>
					<li><a href="/teacher.html" title="师资力量" alt="师资力量">师资力量</a></li>
					<li><a href="/prize.html" title="获奖情况" alt="获奖情况">获奖情况</a></li>
					<li><a href="/env.html" title="教学环境" alt="教学环境">教学环境</a></li>
					<!--<li><a href="/know.html" title="钢琴知识" alt="钢琴知识">钢琴知识</a></li>-->
					<li class="nav-active"><a href="/contact.html" title="联系我们" alt="联系我们">联系我们</a></li>
                </ul>
            </div>
			
		
        </div>
        <div id="container">
		
	<div class="layout layout-bg">
		<div class="col-main">
			<div class="main-wrap margin-190 help" id="J_help">
				<div class="where block">
					<img src="/static/img/map.jpg" />
					<p><b>江苏省常州市新北区府琛广场一号楼丙单元a区405</b></p>
				</div>
				<div class="cooperation hide block">
					<ul class="f14">
						<li>联系人：许女士</li>
						<li>手机：13196799363</li>
					</ul>
				</div>
				<div class="links hide block">
					<h2>友情链接</h2>
					<ul class="site-link-list">
						<li><a href="http://baike.baidu.com/link?url=r3wFKAQAYfZY2Rzg2cyeLQ9RWW7-9urgd327h0TEtJx6lGKPUwQJOhIyVqisgBnH">钢琴百科</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sub">
			<ul class="help-nav cf" id="J_help-nav">
				<li class="current"><a title="我们在哪" href="#where">我们在哪</a></li>
				<li><a title="商务合作" href="#cooperation">商务合作</a></li>
				<li><a title="友情链接" href="#links">友情链接</a></li>
			</ul>
		</div>
	</div>

		</div>
        
		<div id="footer">
			<p class="footer-nav">
				<a href="/">关于我们</a>
				|
				<a href="/help/cooper.html#cooperation">商务合作</a>
				|
				<a href="/help/cooper.html#links">友情链接</a>
			</p>
			<p class="copyright">
				©Copyright 52piano.cn 2009-2014. All rights reserved
			</p>
		</div>
		
		
		<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.4.2/jquery.min.js"></script>
		
		
<script>
(function () {
    var helpSections = $('#J_help').children(),
        nav = $('#J_help-nav'),
        hashes = ['#where', '#cooperation', '#links', '#announce'];
    $.each($('#J_help-nav li'), function (idx, ele) {
        $(ele).click(function (evt) {
            $(ele).siblings().removeClass('current');
            $(ele).addClass('current');
            helpSections.hide().eq(idx).show();
            location.hash = hashes[idx];
            return false;
        });
    });
    switch(location.hash) {
        case hashes[0]:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
            break;
        case hashes[1]:
            helpSections.hide().eq(1).show();
            nav.children().removeClass('current').eq(1).addClass('current');
            break;
        case hashes[2]:
            helpSections.hide().eq(2).show();
            nav.children().removeClass('current').eq(2).addClass('current');
            break;
        case hashes[3]:
            helpSections.hide().eq(3).show();
            nav.children().removeClass('current').eq(3).addClass('current');
            break;
        default:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
    }
})();
</script>

    </body>
</html>
