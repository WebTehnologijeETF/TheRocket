/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validirajIme() {
    var imeInput = document.getElementById("ime-input").value;
    if(imeInput.length > 1) {
        // ok 
        document.getElementById("ok-ime-input").className = "validation-thumbnail-visible";
        document.getElementById("notok-ime-input").className = "validation-thumbnail-invisible";
        return true;
    } 
    else {
        // not ok
        document.getElementById("message-error1").innerHTML="Name is too short";
        document.getElementById("notok-ime-input").className = "validation-thumbnail-visible";
        document.getElementById("ok-ime-input").className = "validation-thumbnail-invisible";
        return false;
    }
        var regex=/[A-Z][a-zA-Z]*/;
     //alert (regex.test(imeInput));

    if(imeInput.length >1 && regex.test(imeInput))
    {
         document.getElementById("ok-ime-input").className = "validation-thumbnail-visible";
        document.getElementById("notok-ime-input").className = "validation-thumbnail-invisible";
        return true;
    }
    else if(imeInput.length >1 && !regex.test(imeInput)) {
       
        document.getElementById("message-error1").innerHTML="Name field should contaion only letters and first letter should be capitalized";
        document.getElementById("notok-ime-input").className = "validation-thumbnail-visible";
        document.getElementById("ok-ime-input").className = "validation-thumbnail-invisible";
        //var wtf=document.getElementById("message-error");
        //alert(document.getElementById("message-error").innerHTML);
        return false;
       
    }
}

function validirajPrezime(){
    var prezimeInput = document.getElementById("prezime-input").value;
    if(prezimeInput.length > 1) {
        // ok 
        document.getElementById("ok-prezime-input").className = "validation-thumbnail-visible";
        document.getElementById("notok-prezime-input").className = "validation-thumbnail-invisible";
        return true;
    } 
    else {
        // not ok
        document.getElementById("message-error2").innerHTML="Surname is too short";
        document.getElementById("notok-prezime-input").className = "validation-thumbnail-visible";
        document.getElementById("ok-prezime-input").className = "validation-thumbnail-invisible";
        return false;
    }
        var regex=/[A-Z][a-zA-Z]*/;
     //alert (regex.test(imeInput));

    if(prezimeInput.length>1 && regex.test(prezimeInput))
    {
         document.getElementById("ok-prezime-input").className = "validation-thumbnail-visible";
        document.getElementById("notok-prezime-input").className = "validation-thumbnail-invisible";
        return true;
    }
    else if(prezimeInput.length>1 && !regex.test(prezimeInput)){
       
        document.getElementById("message-error2").innerHTML="Surname field should contaion only letters and first letter should be capitalized";
        document.getElementById("notok-prezime-input").className = "validation-thumbnail-visible";
        document.getElementById("ok-prezime-input").className = "validation-thumbnail-invisible";
        //var wtf=document.getElementById("message-error");
        //alert(document.getElementById("message-error").innerHTML);
        return false;
       
    }
}

function validirajTelefon()
{
    var regex=/^\+?([0-9]{5})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})$/;
    var telefonInput=document.getElementById("telefon-input").value;
    
    if(regex.test(telefonInput))
    {
        document.getElementById("ok-telefon-input").className="validation-thumbnail-visible";
        document.getElementById("notok-telefon-input").className="validation-thumbnail-invisible";
        return true;
    }
    
    else
    {
        document.getElementById("notok-telefon-input").className="validation-thumbnail-visible";
        document.getElementById("ok-telefon-input").className="validation-thumbnail-invisible";
        return false;
    }
    
    
}

function validirajEmail()
{
    var email=document.getElementById("email-input").value;
    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    
    if(regex.test(email))
    {
        document.getElementById("ok-email-input").className="validation-thumbnail-visible";
        document.getElementById("notok-email-input").className="validation-thumbnail-invisible";  
        return true;
    }
    
    else
    {
        document.getElementById("ok-email-input").className="validation-thumbnail-invisible";
        document.getElementById("notok-email-input").className="validation-thumbnail-visible";
        return false;
    }
}

function validirajAdresu()
{
    var adresa=document.getElementById("address-input").value;
    if(adresa.length>3)
    {
         document.getElementById("ok-address-input").className="validation-thumbnail-visible";
        document.getElementById("notok-address-input").className="validation-thumbnail-invisible"; 
         return true;
    }
    
    else
    {
        document.getElementById("ok-address-input").className="validation-thumbnail-invisible";
        document.getElementById("notok-address-input").className="validation-thumbnail-visible";
        return false;
    }
}

function validirajGrad()
{
    var drzava=document.getElementById("country-input").value;
    
    if(drzava==="BiH")
    {
        document.getElementById("gradvalue1").innerHTML="Sarajevo";
        document.getElementById("gradvalue2").innerHTML="Zenica";
        document.getElementById("gradvalue3").innerHTML="Tuzla";
        return true;
    }
    
    else if(drzava==="USA")
    {
        document.getElementById("gradvalue1").innerHTML="Washington";
        document.getElementById("gradvalue2").innerHTML="New York";
        document.getElementById("gradvalue3").innerHTML="Los Angeles";
        return true;
    }
    
    else
    {
        document.getElementById("gradvalue1").innerHTML="Sydney";
        document.getElementById("gradvalue2").innerHTML="Melbourne";
        document.getElementById("gradvalue3").innerHTML="Canberra";
        return true;
       
    }
    return false;
}

var statusZip="";

function Servis(zip)
{
   
    var mjesto=document.getElementById("city-input").value;
    
    
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
            statusZip = JSON.parse(ajax.responseText);

        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  
  

    }
 	
    ajax.open("GET","http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+mjesto+ "&postanskiBroj=" + zip,false);
    ajax.send();
    
    
    
}

function validirajZIP(textbox)
{
    Servis(textbox.value);


	if(statusZip.hasOwnProperty("greska"))
        {document.getElementById("notok-zip-input").className="validation-thumbnail-visible";
        document.getElementById("ok-zip-input").className="validation-thumbnail-invisible";
        return true;}
        
	else if(statusZip.hasOwnProperty("ok"))
	{document.getElementById("notok-zip-input").className="validation-thumbnail-invisible";
        document.getElementById("ok-zip-input").className="validation-thumbnail-visible";
        return false;}
}

function validirajSve()
{
    return(validirajIme() && validirajPrezime() && validirajTelefon()
            && validirajEmail() && validirajAdresu() && validirajGrad() && validirajZIP());
}

