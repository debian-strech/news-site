globx=0; mobile=0;

if(typeof window.orientation !== 'undefined' && 'ontouchstart' in document.documentElement){mobile=1}

function de(x){return document.getElementById(x)}

// ---

function show_hide(){ 
if(gdp.innerHTML.length>0){gdp.innerHTML='';return}
if(mpr.style.display=='block'){close_preview();return}
document.body.style.marginLeft='0px'
if(men.style.display=='none'){men.style.display='block'; hsc.style.display='block'
}else{men.style.display='none'; hsc.style.display='none' }}

// ---

function preview(x,y){
sty='<textarea id="impexp" class="x_bcolor_bg" style="width:90%;height:150px;margin:auto" onclick="this.select()"></textarea>';
the='<div id="themelist" class="x_bcolor_bg" style="width:90%;padding:10px;margin:auto;overflow:auto"></div>';
switch(y){
case 6 : hst.style.display='block';mpr.style.display='block'; mpr.style.backgroundColor='#283439'; mpr.innerHTML=sty; break;
case 7 : hst.style.display='block';mpr.style.display='block'; mpr.style.backgroundColor='#283439'; mpr.innerHTML=the; break;
default: break;}}

// ---

function ttouch1(e){tj = e.changedTouches[0]; globx = parseInt(tj.clientX)}
function ttouch2(e){tj = e.changedTouches[0]; currx = parseInt(tj.clientX); if(globx<50 && (currx-globx)>50){show_hide()}}

function close_preview(){mpr.innerHTML='';hst.style.display='none';mpr.style.display='none'}

// ----------

function b64e(str) {
return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,function(match, p1){
return String.fromCharCode(parseInt(p1,16))}))}

function b64d(str){
return decodeURIComponent(Array.prototype.map.call(atob(str),function(c){
return '%'+('00'+c.charCodeAt(0).toString(16)).slice(-2)}).join(''))}

// ----------