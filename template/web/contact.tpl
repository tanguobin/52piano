{extends file="lib/framework/base_fw.html"}

{block name="title"} - 联系我们{/block}

{block name="description"}比艾诺艺术中心欢迎您的光临，欢迎来电咨询13196799363。{/block}

{block name="currentContact"} class="nav-active"{/block}

{block name="container"}
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
{/block}

{block name="foot"}
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
{/block}