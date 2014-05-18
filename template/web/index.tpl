{extends file="lib/framework/base_fw.html"}

{block name="title"}{/block}

{block name="body"}
	<div id="coin-slider" class="slider"></div>
{/block}

{block name="foot"}
<script type="text/javascript" src="/static/js/coin-slider.js-min.js"></script>
<script>
	var carousel_images = [
		'/static/img/slider/slider0.jpg',
		'/static/img/slider/slider1.jpg',
		'/static/img/slider/slider2.jpg',
		'/static/img/slider/slider3.jpg',
		'/static/img/slider/slider4.jpg'
	];
	$(window).load(function() {
		$("#coin-slider").isc({
			imgArray: carousel_images,
			autoplay: true
		});
	});
</script>
{/block}