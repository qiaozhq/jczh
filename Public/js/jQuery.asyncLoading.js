(function($){
	//alert($.fn.scrollLoading);
	$.fn.scrollLoading = function(options) {
		var defaults = {
			attr: "data-url"
		};
		var params = $.extend(
			{},
			defaults,
			options || {}
		);
		params.cache = [];
		
		$(this).each(function() {
            var node = this.nodeName.toLowerCase(), url = $(this).attr(params["attr"]);
			if(!url) {
				return;
			}
			var data = {
				obj: $(this),
				tag: node,
				url: url
			};
			params.cache.push(data);
        });
		
		var loading = function(){
			var st = $(window).scrollTop(), sth = st + $(window).height();
			// console.log("滚东条距离顶端"+st);
			// console.log("下边界"+sth);
			$.each(params.cache, function(i, data){
				var o = data.obj, tag = data.tag, url = data.url;
				if(o) {
					post = o.parents(".col-md-3").position().top; posb = post + o.height();
					if((post > st && post < sth) || (posb > st && posb < sth)) {
						if(tag === "img") {
							// console.log("图片距离顶端"+post);
							// console.log("图片下边界"+posb);
							// console.log("图片src"+o.attr("src"));
							// if(o.attr("src").indexOf("load")!=-1){
								o.attr("src", url);
							// }
						} else {
							o.load(url);
						}
						data.obj = null;
					}
				}
			});
			return false;
		};

		loading();
		$(window).bind("scroll", loading);
		$("#myTab a").click(function(e){
		 e.preventDefault();
		 $(this).tab("show");
		 $('body').animate({'scrollTop':'0'},300);
		 setTimeout(loading,500);
		 // loading();
		});
	}
})(jQuery);