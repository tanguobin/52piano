/******************************************************
	* jQuery plug-in
	* jQuery Image Scale Carousel
	* Developed by J.P. Given (http://johnpatrickgiven.com)
	* Useage: anyone so long as credit is left alone
******************************************************/

var iscGlobal = {};


iscGlobal.x = 0; // Object X
iscGlobal.y = 0; // Object Y
iscGlobal.c = 0; // Object center point
iscGlobal.ct = 0; // Object center point from top
iscGlobal.height = 480;
iscGlobal.imgCount = 1;
iscGlobal.current = 0;
iscGlobal.autoplay = false;
iscGlobal.autoplayTimer = 3000;

$(window).resize(function() {
	iscGlobal.x = iscGlobal.cObj.offset().left;
	iscGlobal.y = iscGlobal.cObj.offset().top;
	iscGlobal.c = iscGlobal.x + (iscGlobal.cObj.width() / 2);
	iscGlobal.ct = iscGlobal.y + (iscGlobal.cObj.height() / 2);
	isc_posCount();
});


(function($) {
	$.fn.isc = function(args) {
		
		if (args.autoplay) {
			iscGlobal.autoplay = true;
			if (args.autoplayTimer > 0) {
				iscGlobal.autoplayTimer = args.autoplayTimer;
			}
		}
		
		iscGlobal.cObj = $(this);
		iscGlobal.current = 0;
		iscGlobal.imgCount = 1;
		iscGlobal.imagesLength = args.imgArray.length;
		
		// set up the CSS
		iscGlobal.cObj.css("overflow","hidden");
		
		//Append the images
		iscGlobal.cObj.append('<div class="internal_swipe_container"></div>');	
		
		for (i=0;i<args.imgArray.length;i++) {
			$(".internal_swipe_container").append('<div class="jq_swipe_image" id="swipe_div_' + i + '"><img id="swipe_img_' + i + '" src="' + args.imgArray[i] + '" border="0"></div>');

			$("#internal_swipe_container").css({
				width: iscGlobal.cObj.width(),
				height: iscGlobal.cObj.height(),
				overflow: "hidden"
			});
			
			// Containing div height for loader
			$(".jq_swipe_image").css({
				"height": iscGlobal.height + "px",
				"background-color":"#FFF"
			});
			
			// Image visibility hidden until loaded
			$('#swipe_img_' + i).css("visibility","hidden");
			
			$('#swipe_img_' + i).load(function() {
				// Lose the background loader image
				$(this).parent('div').css({
					"background-image":"url()",
					"background-color":"inherit"
				});
				
				// Show image
				$(this).css({
					"visibility":"visible",
					"position":"relative"
				});
				
				// Resize the img object to the proper ratio of the container.
				var iw = $(this).width();
				var ih = $(this).height();
				if (iscGlobal.cObj.width() > iscGlobal.cObj.height()) {
					if (iw > ih) {
						var fRatio = iw/ih;
						$(this).css({
							"width":iscGlobal.cObj.width() + "px",
							"height":Math.round(iscGlobal.cObj.width() * (1/fRatio))
						});

						var newIh = Math.round(iscGlobal.cObj.width() * (1/fRatio));

						if(newIh < iscGlobal.cObj.height()) {
							var fRatio = ih/iw;
							$(this).css({
								"height":iscGlobal.cObj.height(),
								"width":Math.round(iscGlobal.cObj.height() * (1/fRatio))
							});
						}
					} else {
						var fRatio = ih/iw;
						$(this).css({
							"height":iscGlobal.cObj.height(),
							"width":Math.round(iscGlobal.cObj.height() * (1/fRatio))
						});
					}
				} else {
					var fRatio = ih/iw;
					$(this).css({
						"height":iscGlobal.cObj.height(),
						"width":Math.round(iscGlobal.cObj.height() * (1/fRatio))
					});
				}
				
				// Center image within container

				if ($(this).width() > iscGlobal.cObj.width()) {
					var wDiff = ($(this).width() - iscGlobal.cObj.width()) / 2;
					$(this).css("left", "-" + wDiff + "px");
				}
				
				if ($(this).height() > iscGlobal.cObj.height()) {
					var hDiff = ($(this).height() - iscGlobal.cObj.height()) / 2;
					$(this).css("top", "-" + hDiff + "px");
				}
				
			});	
		}
		
		// Set CSS for image container after appended
		$(".internal_swipe_container").css("width",($(this).width() * args.imgArray.length) + "px");
		$(".jq_swipe_image").css({
			"float":"left",
			"text-align":"center",
			"overflow":"hidden",
			"width":$(this).width() + "px"
		});
		
		// Get the position of the obj the image will be loaded into
		iscGlobal.x = iscGlobal.cObj.offset().left;
		iscGlobal.y = iscGlobal.cObj.offset().top;
		iscGlobal.c = iscGlobal.x + (iscGlobal.cObj.width() / 2);
		iscGlobal.ct = iscGlobal.y + (iscGlobal.cObj.height() / 2);
		
		// Append Nav
		iscGlobal.cObj.append('<div id="swipe_nav_prev" class="trans"><div></div></div>');
		iscGlobal.cObj.append('<div id="swipe_nav_next" class="trans"><div></div></div>');
		
		$('#swipe_nav_next').bind("click", function() {
			iscGlobal.autoplay = false;
			iscGlobal.imgCount ++;
			if (iscGlobal.imgCount == args.imgArray.length) { $('#swipe_nav_next').css("display","none"); }
			$('.internal_swipe_container').animate({
				left: '-=' + iscGlobal.cObj.width()
			}, 400, function() {
				// Animation complete.
				iscGlobal.current = iscGlobal.current + 1;
				$("#count_container li").removeClass("current");
				$("#count_" + iscGlobal.current).addClass("current");
			});
		});
		
		$('#swipe_nav_prev').bind("click", function() {
			iscGlobal.autoplay = false;
			iscGlobal.imgCount --;
			if (iscGlobal.imgCount == 1) { $('#swipe_nav_prev').css("display","none"); }
			$('.internal_swipe_container').animate({
				left: '+=' + iscGlobal.cObj.width()
			}, 400, function() {
				// Animation complete.
				iscGlobal.current = iscGlobal.current - 1;
				$("#count_container li").removeClass("current");
				$("#count_" + iscGlobal.current).addClass("current");
			});
		});
		
		// Append Count
		$("body").append('<ul id="count_container" class="trans"></ul>');
		
		for (i=0;i<args.imgArray.length;i++) {
			$("#count_container").append('<li id="count_' + i + '" onclick="isc_jumpTo(' + i + ');" class="counter"></li>');
		}
		
		$("#count_" + iscGlobal.current).addClass("current");
		
		$(".counter").css({
			"width":iscGlobal.cObj.width() / args.imgArray.length + "px"
		});
		
		isc_posCount();
		
		$(document).mousemove(function (e) {
			// Set global mouse position
			iscGlobal.mX = e.pageX;
			iscGlobal.mY = e.pageY;
			
			// Bounding box coordinents of object
			var bY = iscGlobal.y + (iscGlobal.cObj.outerHeight(true)-6);
			var rX = iscGlobal.x + iscGlobal.cObj.outerWidth(true);
			if (((iscGlobal.mY > iscGlobal.y) && (iscGlobal.mY < bY)) && ((iscGlobal.mX > iscGlobal.x) && (iscGlobal.mX < rX))) {
				if (iscGlobal.mX < iscGlobal.c) { // Prev
					if (iscGlobal.imgCount > 1) {
						$('#swipe_nav_next').css("display","none");
						$('#swipe_nav_prev').css({
							"display":"block",
							"height":(iscGlobal.cObj.outerHeight(true) - 6) + "px",
							"top": iscGlobal.y + "px",
							"left": iscGlobal.x + "px",
							"width":(iscGlobal.cObj.width() * 0.2) + "px"
						});
					}
				} else if (iscGlobal.mX > iscGlobal.c) { // Next
					if (iscGlobal.imgCount < args.imgArray.length) {
						$('#swipe_nav_prev').css("display","none");
						$('#swipe_nav_next').css({
							"display":"block",
							"height":(iscGlobal.cObj.outerHeight(true) - 6) + "px",
							"top": iscGlobal.y + "px",
							"left": ((iscGlobal.x + iscGlobal.cObj.width()) - iscGlobal.cObj.width() * 0.2) + "px",
							"width":(iscGlobal.cObj.width() * 0.2) + "px"
						});
					}
				}
			} else {
				$('#swipe_nav_next,#swipe_nav_prev').css("display","none");
			}
		});
		
		if (iscGlobal.autoplay) {
			setTimeout("isc_timeJump()",iscGlobal.autoplayTimer);
		}
		
		
	}
})(jQuery);

function isc_timeJump() {
	if (iscGlobal.imgCount == iscGlobal.imagesLength) { 
		iscGlobal.imgCount = 1;
		iscGlobal.current = 0;
		var total_length = (iscGlobal.cObj.width() * iscGlobal.imagesLength) - iscGlobal.cObj.width();
		$('.internal_swipe_container').animate({
			left: '+=' + total_length
		}, 400, function() {
			// Animation complete.
			$("#count_container li").removeClass("current");
			$("#count_" + iscGlobal.current).addClass("current");
		});
	} else {
		iscGlobal.imgCount ++;
		$('.internal_swipe_container').animate({
			left: '-=' + iscGlobal.cObj.width()
		}, 400, function() {
			// Animation complete.
			iscGlobal.current = iscGlobal.current + 1;
			$("#count_container li").removeClass("current");
			$("#count_" + iscGlobal.current).addClass("current");
		});
	}
	
	
	if (iscGlobal.autoplay) {
		setTimeout("isc_timeJump()",iscGlobal.autoplayTimer);
	}
}

function isc_jumpTo(index) {
	iscGlobal.autoplay = false;
	
	$('#swipe_nav_next,#swipe_nav_prev').css("display","none");
	
	if (index > iscGlobal.current) {
		var diff = index - iscGlobal.current;
	} else {
		var diff = iscGlobal.current - index;
	}
	
	var go_to_xy = iscGlobal.cObj.width() * diff;
	
	if (index >= iscGlobal.current) {
		var str = '-=';
	} else {
		var str = '+=';
	}
	
	iscGlobal.current = index;
	
	$('.internal_swipe_container').animate({
		left: str + go_to_xy
	}, 400, function() {
		$("#count_container li").removeClass("current");
		$("#count_" + iscGlobal.current).addClass("current");
		
		iscGlobal.imgCount = index + 1;
	});
}

function isc_posCount() {
	$("#count_container").css({
		"left":iscGlobal.x + "px",
		"top":(iscGlobal.y + iscGlobal.cObj.height() - 6) + "px"
	});
}