{extends file="lib/framework/base_fw.html"}

{block name="title"}学生风采-{/block}

{block name="description"}比艾诺艺术中心面向常州地区招生，目前在本中心学习的学子达500余人，学子成绩优异，屡次斩获国内外钢琴大赛大奖，欢迎来电咨询13196799363。{/block}

{block name="body"}
	<div id="coin-slider" class="slider student"></div>
{/block}

{block name="foot"}
<script type="text/javascript" src="/static/js/coin-slider.js-min.js"></script>
<script>
	var carousel_images = [
		'/static/img/student/1.jpg',
		'/static/img/student/2.jpg',
		'/static/img/student/3.jpg',
		'/static/img/student/4.jpg',
		'/static/img/student/5.jpg',
		'/static/img/student/6.jpg',
		'/static/img/student/7.jpg',
		'/static/img/student/8.jpg',
		'/static/img/student/9.jpg',
		'/static/img/student/10.jpg',
		'/static/img/student/11.jpg',
		'/static/img/student/12.jpg',
		'/static/img/student/13.jpg'
	];
	$(window).load(function() {
		$("#coin-slider").isc({
			imgArray: carousel_images,
			autoplay: true
		});
	});
</script>
{/block}
