function addEvent (o,e,f) {
	if(window.addEventListener){o.addEventListener(e,f,false);}else if(window.attachEvent){r=o.attachEvent('on'+e,f);}
}

function GetID(s){return document.getElementById(s);}

addEvent(window,'load',function(){});

/*在线QQ=============================================================================*/
function LoadQQ(filename){
var lastScrollY=0,LoadNum=0;
//滚动在线QQ
this.OnLineQQ=function(){ 
	var diffY;
	if (document.documentElement && document.documentElement.scrollTop)
	diffY = document.documentElement.scrollTop;
	else if (document.body)
	diffY = document.body.scrollTop
	else
		{/*Netscape stuff*/}
	percent=.1*(diffY-lastScrollY); 
	percent=(percent>0)?Math.ceil(percent):Math.floor(percent);
	GetID("OnLineQQ").style.top = parseInt(GetID("OnLineQQ").style.top)+percent+"px";
	lastScrollY=lastScrollY+percent; 
}

window.setInterval("this.OnLineQQ();",1);
}

//清空浏览记录
function Clearvisit(){
	AJAX_Send('/Ajax.asp?action=Visit&action2=Clear',function(){
		var t=this.responseText;
		GetID('History-Product').innerHTML='您还没有浏览商品！';
	});
}


//切换标签
function SwitchLabel(s,n){
	var lb=GetID(s+'Label').getElementsByTagName('LI'),i;
	for(i=0;i<lb.length;i++){
		SetCss(lb[i],'On','del');
		GetID(s+'_'+i).style.display='none'
	}
	SetCss(lb[n],'On','add');
	GetID(s+'_'+n).style.display='block'
}



//在线QQ显示/隐藏
function OnLineQQ_Stat(str)
{GetID("OnLineQQ").style.width=(str=='O')?'100px':'26px';
GetID("OnLineQQ_ICO").style.display=(str=='O')?'none':'block';
GetID("OnLineQQ_Con").style.display=(str=='O')?'block':'none';}

function Side_Close(ad){
	var i;
	for(i=0;i<ad.length;i++){
		if(GetID(ad[i])){GetID(ad[i]).style.display='none';}
	}
}


/*在线QQ-----------------------------------------------------------------------------*/

/*Class操作
k	-需添加/删除class
s	-操作类型[add-新增否则为删除]*/

function SetCss(o,k,s){
	var c=o.className.split(' '),n=0,nCSS='';
	for(var i=0;i<c.length;i++)
	{
		if(c[i]!=k){nCSS+=(nCSS=='')?c[i]:' '+c[i];}
		else{n=1;}
	}
	if(s=='add'){nCSS+=(nCSS=='')?k:' '+k;}
	o.className=nCSS;
}


//格式化数字
function outputMoney(number){
if(number<0)
return '-'+outputDollars(Math.floor(Math.abs(number)-0)+'')+outputCents(Math.abs(number)-0);
else
return outputDollars(Math.floor(number-0)+'')+outputCents(number-0);
}

function outputDollars(number){
	if(number.length<=3)
		return (number==''?'0':number);
	else{
		var mod=number.length%3;
		var output=(mod==0?'':(number.substring(0,mod)));
		for(i=0;i<Math.floor(number.length/3);i++){
			if((mod==0)&&(i==0))
			output+=number.substring(mod+3*i,mod+3*i+3);
			else
			output+=','+number.substring(mod+3*i,mod+3*i+3);
		}
		return (output);
	}
}

function outputCents(amount){amount=Math.round(((amount)-Math.floor(amount))*100);return (amount<10?'.0'+amount:'.'+amount);}
/*点击统计=============================================================================*/
function cStat(i,a){if(document.images){var t=new Date().getTime();(new Image()).src="/OutLink.asp?i="+i+"&a="+a+"&t="+t;}return true;}
/*点击统计-----------------------------------------------------------------------------*/




/*XMLHTTP=============================================================================*/
function AJAX_Send(URL,OnFinish)
{
	var request=new HttpRequest();
	request.onfinish=OnFinish;
	request.onerror=function(e){alert(e.message);}
	request.open("get",URL+"&math="+Math.random(),true);
	request.setRequestHeader('Content-Type','text/xml');
	request.setRequestHeader("Charset","utf-8");
	request.send(null);
}


function HttpRequest()
{
	if(this==window)throw new Error(0,"HttpRequest is unable to call as a function.")
	var me=this;
   	var asyncFlag=false;
   	var typeFlag=false;
	var r;
	function onreadystatechange()
	{
		if(me.onreadystatechange)me.onreadystatechange.call(r);
		if(r.readyState==4)
		{
			if(Number(r.status)>=300)
			{
				if(me.onerror)me.onerror.call(r,new Error(0,"Http error:"+r.status+" "+r.statusText));
				if(typeFlag)r.onreadystatechange=Function.prototype;
				else r.onReadyStateChange=Function.prototype;
				r=null;
				return;
			}
			me.status=r.status;
			me.statusText=r.statusText;
			me.responseText=r.responseText;
			me.responseBody=r.responseBody;
			me.responseXML=r.responseXML;
			me.readyState=r.readyState;
			if(typeFlag)r.onreadystatechange=Function.prototype;
			else r.onReadyStateChange=Function.prototype;
			r=null;
			if(me.onfinish)me.onfinish();
		}
	}
	function creatHttpRequest(){
		var e;
		try{
			r=new window.XMLHttpRequest();
			typeFlag=true;
		} catch(e) {			
			var ActiveXName=[
				'MSXML2.XMLHttp.6.0',
				'MSXML2.XMLHttp.3.0',
				'MSXML2.XMLHttp.5.0',
				'MSXML2.XMLHttp.4.0',
				'Msxml2.XMLHTTP',
				'MSXML.XMLHttp',
				'Microsoft.XMLHTTP'
			]
			function XMLHttpActiveX()
			{
				var e;
				for(var i=0;i<ActiveXName.length;i++)
				{
					try{
						var ret=new ActiveXObject(ActiveXName[i]);
						typeFlag=false;
					} catch(e) {
						continue;
					}
					return ret;
				}
				throw {"message":"XMLHttp ActiveX Unsurported."};
			}
			try{
				r=new XMLHttpActiveX();
				typeFlag=false;
			} catch(e) {
				throw new Error(0,"XMLHttpRequest Unsurported.");
			}
		}
	}
	creatHttpRequest();


	this.abort=function(){
		r.abort();
	}
	this.getAllResponseHeaders=function(){
		r.getAllResponseHeaders();
	}
	this.getResponseHeader=function(Header){
		r.getResponseHeader(bstrHeader);
	}
	this.open=function(Method,Url,Async,User,Password){
		asyncFlag=Async;
		try{
			r.open(Method,Url,Async,User,Password);
		} catch(e) {
			if(me.onerror)me.onerror(e);
			else throw e;
		}
	}
	this.send=function(Body){
		try{
			if(typeFlag)r.onreadystatechange=onreadystatechange;
			else r.onReadyStateChange=onreadystatechange;

			r.send(Body);
			//alert("sended");
			if(!asyncFlag){
				this.status=r.status;
				this.statusText=r.statusText;
				this.responseText=r.responseText;
				this.responseBody=r.responseBody;
				this.responseXML=r.responseXML;
				this.readyState=r.readyState;

				if(typeFlag)r.onreadystatechange=Function.prototype;
				else r.onReadyStateChange=Function.prototype;

				r=null;
			}
		} catch(e) {
			if(me.onerror)me.onerror(e);
			else throw e;
		}
		//alert("sended");
	}
	this.setRequestHeader=function(Name,Value){
		r.setRequestHeader(Name,Value);
	}
}
/*XMLHTTP-----------------------------------------------------------------------------*/


/*图片切换=============================================================================*/
/*
n	ID
tag	标题标签[0-否,1-是](提取图片Title中<b></b>部份文字)
Txt	是否显示文字[0-否,1-是]
*/
function TransformView (n,tag,Txt){
	var TV=this,Banner=GetID(n),T='';
	Banner.innerHTML='<div class="AD_List">'+Banner.innerHTML+'</div><div class="Clear"></div>';
	this.index=0;

	this.Step=5;		//滑动变化率
	this.timer=10;		//定时器
	this.Up=true;		//是否向上(否则向左)
	this.Auto=true;		//是否自动转换
	this.Pause=3000;	//停顿时间(Auto为true时有效)
	this.target=0;		//目标参数
	
	this.slider=Banner.getElementsByTagName('UL')[0];
	this.Count=this.slider.getElementsByTagName('LI').length;/*切换数量*/
	this.Width=this.slider.getElementsByTagName('LI')[0].getElementsByTagName('IMG')[0].offsetWidth;
	this.Height=this.slider.getElementsByTagName('LI')[0].getElementsByTagName('IMG')[0].offsetHeight;
	
//	alert(this.slider.getElementsByTagName('LI')[0].innerHTML+'\n\n\n'+Banner.innerHTML);
	//文字描述层
	if(Txt==1){
		//背景层
		var div=document.createElement("div");div.className='AD_Text_BG';Banner.appendChild(div);
		//文字层
		var div=document.createElement("div");div.innerHTML=this.GetTitle(0);div.className='AD_Text';this.AD_Text=Banner.appendChild(div);
	}
	
	//生成Label
	var ul=document.createElement("ul");
	ul.className='ADNum';
	for(var i=1;i<this.Count+1;i++){
		var CL=document.createElement("li");
		T=i;
		//.split('</strong>')[0].substring(8)
		if(tag==1){T='<a>'+this.GetTitle(i-1)+'</a>';}
		CL.innerHTML=T;
		
		CL.onmouseover=(function(i,CL){return function(){CL.className='On';TV.index=i-1;TV.nextAd();}})(i,CL);
		CL.onmouseout=(function(i,CL){return function(){CL.className='';TV.index=i-1;TV.nextAd();}})(i,CL);
		ul.appendChild(CL);
	}
	Banner.appendChild(ul);
	this.AdNum=Banner.getElementsByTagName('UL')[1].getElementsByTagName('LI');
	TV.nextAd();
}


TransformView.prototype={
nextAd : function(){
	if(this.index<0){this.index=this.Count-1;}
	else if(this.index>=this.Count){this.index=0;}

	this.target=-1*(this.Up?this.Height:this.Width)*this.index;
	for(var i=0;i<this.AdNum.length;i++){this.AdNum[i].className='';}
	//切换描述文字
	if(this.AD_Text){this.AD_Text.innerHTML=(this.GetURL(this.index)=='')?this.GetTitle(this.index):'<a href="'+this.GetURL(this.index)+'" target="_blank">'+this.GetTitle(this.index)+'</a>';}
	this.AdNum[this.index].className='On';
	this.Move();
},
//移动
Move: function() {
	clearTimeout(this.timer);
	var oThis=this,style=this.Up?"top":"left",iNow=parseInt(this.slider.style[style])||0,iStep=this.GetStep(this.target,iNow);
	
	if(iStep!=0){
		this.slider.style[style]=(iNow+iStep)+"px";
		this.timer=setTimeout(function(){oThis.Move();},10);
	}else{
		this.slider.style[style]=this.target+"px";
		if(this.Auto){this.timer=setTimeout(function(){oThis.index++;oThis.nextAd();},this.Pause);}
	}
},
//获取步长
GetStep: function(iTarget, iNow) {
	var iStep=(iTarget-iNow)/this.Step;
	if(iStep==0)return 0;
	if(Math.abs(iStep)<1) return (iStep>0?1:-1);
	return iStep;
},
//获取alt[替换文本]
GetTitle: function(n){
	return this.slider.getElementsByTagName('LI')[n].getElementsByTagName('IMG')[0].alt;
},
//获取URL
GetURL: function(n){
	if(this.slider.getElementsByTagName('LI')[n].getElementsByTagName('A')[0])
	{return this.slider.getElementsByTagName('LI')[n].getElementsByTagName('A')[0].href;}
	else{return '';}
}
}
/*图片切换-----------------------------------------------------------------------------*/
