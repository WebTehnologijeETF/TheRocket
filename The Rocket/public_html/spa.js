function replace(url)
{
    
    
    
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
            
            document.open();
            document.write(ajax.responseText);
            document.close();
        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  
  

    };
 	
    ajax.open("GET",url,true);
    ajax.send();
}


