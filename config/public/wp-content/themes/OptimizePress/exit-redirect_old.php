<?php if (!empty($postcustom['_seo_exitredirect'])) : ?>
<script language="javascript" type="text/javascript">
//<![CDATA[
<?php $str = str_replace('"', '″', $postcustom['_seo_exitredirpopmsg'][0]);
$order   = array("\r\n\r\n", "\r\n");
$replace = array('\n\n" + "', '\n" + "');
$newstr = str_replace($order, $replace, $str);
?>

	var exitsplashmessage = "<?php echo trim($newstr); ?>";
	var exitsplashpage = '<?php echo $postcustom['_seo_exitredirurl'][0]; ?>';

function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') { window.onload = func; } else { window.onload = function() { if (oldonload) { oldonload(); }  func(); }}
}

function addClickEvent(a,i,func) { 
	if (typeof a[i].onclick != 'function') { a[i].onclick = func; } 
}

var theDiv = '<div id="ExitSplashDiv"  style="display:block; width:100%; height:100%; position:absolute; background:#FFFFFF; margin-top:0px; margin-left:0px;" align="center">';
theDiv = theDiv + '<iframe src="'+exitsplashpage+'" width="100%" height="100%" align="middle" frameborder="0"></iframe>';
theDiv = theDiv + '</div>';

theBody = document.body; 
if (!theBody) {theBody = document.getElementById("body"); 
if (!theBody) {theBody = document.getElementsByTagName("body")[0];}}
var PreventExitSplash = false;

function DisplayExitSplash(){ 
	if(PreventExitSplash == false){ 
		window.scrollTo(0,0);
		window.alert(exitsplashmessage); 
		PreventExitSplash=true; 
		divtag = document.createElement("div"); 
		divtag.setAttribute("id","ExitSplashMainOuterLayer"); 
		divtag.style.position="absolute"; 
		divtag.style.width="100%"; 
		divtag.style.height="100%"; 
		divtag.style.zIndex="99"; 
		divtag.style.left="0px"; 
		divtag.style.top="0px"; 
		divtag.innerHTML=theDiv; 
		theBody.innerHTML=""; 
		theBody.topMargin="0px"; 
		theBody.rightMargin="0px"; 
		theBody.bottomMargin="0px"; 
		theBody.leftMargin="0px"; 
		theBody.style.overflow="hidden"; 
		theBody.appendChild(divtag); 
	return exitsplashmessage; 
	}
}

var a = document.getElementsByTagName('A'); 
for (var i = 0; i < a.length; i++) { 
	if(a[i].target !== '_blank') {addClickEvent(a,i, function(){ PreventExitSplash=true; });} else{addClickEvent(a,i, function(){ PreventExitSplash=false;});}
}

disablelinksfunc = function(){
	var a = document.getElementsByTagName('A'); 
	for (var i = 0; i < a.length; i++) { 
		if(a[i].target !== '_blank') {addClickEvent(a,i, function(){ PreventExitSplash=true; });} else{addClickEvent(a,i, function(){ PreventExitSplash=false;});}
	}
}

hideexitcancelbuttonimage = function(){
	document.getElementById('ExitCancelButtonImageDiv').style.display='none'; 
}
addLoadEvent(disablelinksfunc);

disableformsfunc = function(){
	var f = document.getElementsByTagName('FORM'); for (var i=0;i<f.length;i++){ if (!f[i].onclick){ f[i].onclick=function(){ PreventExitSplash=true; } }else if (!f[i].onsubmit){ f[i].onsubmit=function(){ PreventExitSplash=true; }}}
}

addLoadEvent(disableformsfunc);
window.onbeforeunload = DisplayExitSplash;
//]]>
</script>
<?php endif; ?>