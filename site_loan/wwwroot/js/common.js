$(function(){
	var self = $("#alterInfo");
	var txt = self.find(".txt1");
	var alter = self.find("#alter");
	var ipt = self.find("input");
	var hid = self.find(".hide");
	ipt.hide();
	alter.click(function(){
		$(this).hide();
		txt.hide();
		ipt.show();
	});
	hid.click(function(){
		alter.show();
		txt.show();
		ipt.hide();	
	});
});

$(function(){
	var menu = $("#menu-frame");
	menu.css({"background":"#f9f9f9"})
});

//dialog
function popupDiv(div_id) { 
var div_obj = $("#"+div_id); 
var windowWidth = document.documentElement.clientWidth; 
var windowHeight = document.documentElement.clientHeight; 
var popupHeight = div_obj.height(); 
var popupWidth = div_obj.width(); 
//添加并显示遮罩层 
$("<div id='mask'></div>").addClass("mask") 
.width(windowWidth * 0.99) 
.height(windowHeight * 0.99) 
.click(function() {hideDiv(div_id); }) 
.appendTo("body") 
.fadeIn(200); 
div_obj.css({"position": "absolute","width":"popupWidth"}) 
.animate({left: windowWidth/2-popupWidth/2, 
top: windowHeight/2-popupHeight/2, opacity: "show" }, "2000"); 
}

function hideDiv(div_id) {
$("#mask").remove(); 
$("#" + div_id).animate({left: 0, top: 0, opacity: "hide" }, "2000"); 
}

//drag
(function($){

	var isMouseDown    = false;

	var currentElement = null;

	var dropCallbacks = {};
	var dragCallbacks = {};
	
	var bubblings = {};

	var lastMouseX;
	var lastMouseY;
	var lastElemTop;
	var lastElemLeft;
	
	var dragStatus = {};	

	var holdingHandler = false;

	$.getMousePosition = function(e){
		var posx = 0;
		var posy = 0;

		if (!e) var e = window.event;

		if (e.pageX || e.pageY) {
			posx = e.pageX;
			posy = e.pageY;
		}
		else if (e.clientX || e.clientY) {
			posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop  + document.documentElement.scrollTop;
		}

		return { 'x': posx, 'y': posy };
	};

	$.updatePosition = function(e) {
		var pos = $.getMousePosition(e);

		var spanX = (pos.x - lastMouseX);
		var spanY = (pos.y - lastMouseY);

		$(currentElement).css("top",  (lastElemTop + spanY));
		$(currentElement).css("left", (lastElemLeft + spanX));
	};

	$(document).mousemove(function(e){
		if(isMouseDown && dragStatus[currentElement.id] != 'false'){
			$.updatePosition(e);
			if(dragCallbacks[currentElement.id] != undefined){
				dragCallbacks[currentElement.id](e, currentElement);
			}

			return false;
		}
	});

	$(document).mouseup(function(e){
		if(isMouseDown && dragStatus[currentElement.id] != 'false'){
			isMouseDown = false;
			if(dropCallbacks[currentElement.id] != undefined){
				dropCallbacks[currentElement.id](e, currentElement);
			}

			return false;
		}
	});

    $.fn.ShowMore = function(){
        var self = $(this);
        var obj = self.find('.ico_show');
        var a = self.find('a');
        obj.click(function(){
            $(this).parent().parent().toggleClass('open');
        });
        a.click(function(){
            $(this).parent().toggleClass('selected');
        });
    }
    //初始化左边
//    $(document).ready(function () {
//        $('#mainList').ShowMore();
//    });
//    window.golo = {};

	$.fn.ondrag = function(callback){
		return this.each(function(){
			dragCallbacks[this.id] = callback;
		});
	};

	$.fn.ondrop = function(callback){
		return this.each(function(){
			dropCallbacks[this.id] = callback;
		});
	};
	
	$.fn.dragOff = function(){
		return this.each(function(){
			dragStatus[this.id] = 'off';
		});
	};
	
	$.fn.dragOn = function(){
		return this.each(function(){
			dragStatus[this.id] = 'on';
		});
	};

	$.fn.setHandler = function(handlerId){
		return this.each(function(){
			var draggable = this;
			
			bubblings[this.id] = true;
			
			$(draggable).css("cursor", "default");
			dragStatus[draggable.id] = "handler";
			$("#"+handlerId).css("cursor", "move");	
			$("#"+handlerId).mousedown(function(e){
				holdingHandler = true;
				$(draggable).trigger('mousedown', e);
			});
			
			$("#"+handlerId).mouseup(function(e){
				holdingHandler = false;
			});
		});
	}

	$.fn.easydrag = function(allowBubbling){

		return this.each(function(){

			// if no id is defined assign a unique one
			if(undefined == this.id || !this.id.length) this.id = "easydrag"+(new Date().getTime());
			
			// save event bubbling status
			bubblings[this.id] = allowBubbling ? true : false;

			// set dragStatus 
			dragStatus[this.id] = "on";
			
			// change the mouse pointer
			$(this).css("cursor", "move");

			// when an element receives a mouse press
			$(this).mousedown(function(e){
				
				// just when "on" or "handler"
				if((dragStatus[this.id] == "off") || (dragStatus[this.id] == "handler" && !holdingHandler))
					return bubblings[this.id];

				// set it as absolute positioned
				$(this).css("position", "absolute");
				

				// set z-index
				$(this).css("z-index",1);

				// update track variables
				isMouseDown    = true;
				currentElement = this;

				// retrieve positioning properties
				var pos    = $.getMousePosition(e);
				lastMouseX = pos.x;
				lastMouseY = pos.y;

				lastElemTop  = this.offsetTop;
				lastElemLeft = this.offsetLeft;

				$.updatePosition(e);

				return bubblings[this.id];
			});
		});
	};

})(jQuery);

//copy url
function copyUrl(txt){
    if( window.clipboardData && clipboardData.setData ){
        window.clipboardData.setData("Text",txt );
    alert("复制成功，请粘贴到你的邮箱里面发送给你的好友！");
    }else{
        alert("您当前使用的浏览器不支持复制操作,请在IE下使用！");
    }
}

function str_decode(utftext){
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;
    if (utftext == null){
        return "";
    }

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

    return string;
}