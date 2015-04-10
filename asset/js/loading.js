var showloading_dot="";
var showloading_dot2="";
var showloading_id = 0;
function showloading(){
 var loading=document.getElementById("loading");if(!loading)return false;
 loading.style.display="block";
 showloading_dot+="&laquo;";
 showloading_dot2+="&raquo;";
 if(showloading_dot.length>40){showloading_dot="";showloading_dot2="";}
 // loading.innerHTML=showloading_dot2+"Loadding Content"+showloading_dot;  
 loading.innerHTML="Tunggu Sebentar"+showloading_dot2;  
 showloading_id=setTimeout("showloading()",100);
}
function stoploading(){
 var loading=document.getElementById("loading");if(!loading)return false;
 loading.style.display="none";
 if(showloading_id){clearTimeout(showloading_id);showloading_id=0;}
}