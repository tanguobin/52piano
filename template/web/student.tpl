{extends file="lib/framework/base_fw.html"}

{block name="title"} - 学生风采{/block}

{block name="description"}比艾诺艺术中心面向常州地区招生，目前在本中心学习的学子达500余人，学子成绩优异，屡次斩获国内外钢琴大赛大奖，欢迎来电咨询13196799363。{/block}

{block name="currentStudent"} class="nav-active"{/block}

{block name="body"}
    <div class="student">
		<ol id="coin-slider">
			<li>
				<img data-src='/static/img/student/1.jpg' />
				<span>2012年比艾诺艺术中心新年音乐会开始咯，各位小伙伴们一起来看看吧！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/2.jpg' />
				<span>Action！！！节目开始咯，各位小朋友们准备好了嘛！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/3.jpg' />
				<span>咚咚咚~~~有请我们今天的三大小美女主持，哦，忘了，还有一位小帅哥主持！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/4.jpg' />
				<span>那就让本小姐先来一首神曲开个头吧！！！各位掌声鼓励哦！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/5.jpg' />
				<span>哼哼哼，让本女神给台下的各位来首钢琴曲子吧，尽情的膜拜女神吧！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/6.jpg' />
				<span>哈哈哈哈！就让我们帅哥三人组表扬个相声给大家听吧。</span>
			</li>
			<li>
				<img data-src='/static/img/student/7.jpg' />
				<span>本帅哥不屑于多人表演，让我来高歌一曲！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/8.jpg' />
				<span>你们这些小屁孩，看来只有本姑娘成熟稳重，这样吧，就让我来给大家当回老师吧！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/9.jpg' />
				<span>你们都表演的这么好，人家有点害羞羞了~~~</span>
			</li>
			<li>
				<img data-src='/static/img/student/10.jpg' />
				<span>那本男神也来一弹奏一曲吧！！！</span>
			</li>
			<li>
				<img data-src='/static/img/student/11.jpg' />
				<span>你一个人表演算什么，本少帅找了位美女跟我一起弹奏，让你们羡慕嫉妒恨去吧！</span>
			</li>
			<li>
				<img data-src='/static/img/student/12.jpg' />
				<span>获奖咯，台下的朋友们，你们羡慕不？</span>
			</li>
			<li>
				<img data-src='/static/img/student/13.jpg' />
				<span>表演结束咯，快乐的时光总是很短暂的，一起来合个影吧，纪念一下快乐的时光！明年我们再见！</span>
			</li>
		</ol>
	</div>
{/block}

{block name="foot"}
<script type="text/javascript" src="/static/js/coin-slider.js-min.js"></script>
<script>
	$(document).ready(function() {
		$('#coin-slider').coinslider({ width: 670, height: 445, delay: 6000, effect: 'straight' });
	});
</script>
{/block}