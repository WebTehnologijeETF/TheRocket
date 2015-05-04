
window.onload=replace("homepage.html");
function replace(url)
{
   
    //if(url=== "rankings.html")window.onload = loadElements;
    
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
             //callback(ajax.responseText);
           document.getElementById("replace-index").innerHTML=ajax.responseText;
//            var visina=document.getElementById("replace-index").style.height;
//            document.getElementsById("parentFooter").style.top=""+(visina+10)+"px";
        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  
  

    };
 	
    ajax.open("GET",url,true);
    ajax.send();
}

//function callback(data) {
 //   alert("callback")
//}


