
function validation(name,picture,career,points)
{ 
    if(name.length<=1)return "Name is too short";
    
    var matches = name.match(/\d+/g);
    if (matches != null) return "Name must not contain numbers";
    
    var matches=picture.match(/\.(jpeg|jpg|gif|png)$/);
    if(matches === null && picture!="" ) return "Enter correct url of the picture";
    
    
   // if(career !="Amateur" || career != "Professional")return "Career should be 'Amateur' or 'Professional'";
    
    if(points<0)return "Points should be positive number!";
    
    var matches=points.match(/\d+/g);
    if(matches === null)return "Points should have numeric value";
    
    return"";
        
}


function makeEmptyTable()
{  
    return "<tr><th class='table-header'>Player ID</th><TH class='table-header'>Name of the player</TH><th class='table-header'>Picture</th><TH class='table-header'>Career</TH><TH class='table-header'>Points</TH></tr>";
    
}

function loadElements()
{
     var elements;
     var table;
     var row;
     
     var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
            elements= JSON.parse(ajax.responseText);
            
            table=document.getElementById("rankings-table");
            //alert(table);
            if(elements.length!==0){
            table.innerHTML=makeEmptyTable();
            //row=table.insertRow();
            //var cell;
            //for(i = 0; i<elements.length; i++)
		//table.innerHTML+=getRow(i+1,objects[i].naziv,objects[i].opis,objects[i].url);
            //table.innerHTML+="<tr class='blankrow'><td colspan='7'></td></tr>";
        //}   
               table.style.border="1px solid black";
               
        
            for (var i = 0; i < elements.length; i++) {
                    var current_row = table.insertRow();
                    var cell1,cell2,cell3,cell4,cell5;
                    
                    cell1=current_row.insertCell(0); 
                    cell1.innerHTML = elements[i].id;
                    
                    cell2 = current_row.insertCell(1);
                    cell2.innerHTML = elements[i].naziv;
                    
                    cell3 = current_row.insertCell(2);
                    //if(elements[i].slika === NSNull null)
                      //  type="missing-profile-picture";
                   // else
                      //  type="profile-picture";
                    cell3.innerHTML = "<img class='profile-picture' alt='Missing image' src='" +  elements[i].slika + "'/>";
                    
                    cell4 = current_row.insertCell(3);
                    cell4.innerHTML = elements[i].opis;
                    
                    cell5 = current_row.insertCell(4);
                    cell5.innerHTML = elements[i].kolicina;
                    
                    
                }
                
                //table.td.className="data";
                //table.td.style="border: 1px solid black";
                //table.tr.style="border:1px solid black";
                //var tableDiv = document.getElementById('table_div');
                //var newTableHeight = (table.offsetHeight + 200) + 'px';
                //tableDiv.style.height = newTableHeight;
        }}
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  

    };
    ajax.open("GET","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16190",true);
    ajax.send();
    

}



function addElement()
{
    //naziv="Joy Doe";
    //slika="http://upload.wikimedia.org/wikipedia/en/c/cd/Ronnie_O'Sullivan_PHC_2011-2_cropped.png";
    //opis="Amateur";
    //kolicina=125;
    naziv=document.getElementById("name").value;
    slika=document.getElementById("picture").value;
    opis=document.getElementById("description").value;
    kolicina=document.getElementById("points").value;
    
    if(validation(naziv,slika,opis,kolicina)!="")
    alert(validation(naziv,slika,opis,kolicina));
    else{
    var element={
        naziv: naziv,
        slika: slika,
        opis: opis,
        kolicina: kolicina
    };
    //alert(JSON.stringify(element));
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
           //alert("Radi");

        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  

    };
        ajax.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16190",true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("akcija=dodavanje" + "&brindexa=16190&proizvod=" + JSON.stringify(element));
    
    }
}


function modifyElement(){
    
    if(document.getElementById("id").value === ""){
        alert('Please enter ID of the player!');
        return;
    }
    else ID=document.getElementById("id").value;
    naziv=document.getElementById("name").value;
    slika=document.getElementById("picture").value;
    opis=document.getElementById("description").value;
    kolicina=document.getElementById("points").value;
      //if(validation(naziv,slika,opis,kolicina)!="")
    //alert(validation(naziv,slika,opis,kolicina));
   // else{
    
    
    
    
    if(ID === ""){
        alert('Please enter ID of the player!');
        return;
    }

    var element={
        naziv: naziv,
        slika: slika,
        opis: opis,
        kolicina: kolicina
    };
    
    
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
           deleteElement(ID);
           loadElements();
           

        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  

    };
        ajax.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16190",true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("akcija=dodavanje" + "&brindexa=16190&proizvod=" + JSON.stringify(element));
  //  }
    
}

function deleteElement(ajdi){

    

    if(document.getElementById("id").value === ""){
        alert('Please enter ID of the player!');
        return;
    }
    else if(ajdi===-1) ID=document.getElementById("id").value;
    else ID=ajdi;
    var element = {
        id: ID
    };
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange= function(){
         if (ajax.readyState === 4 && ajax.status === 200){
           loadElements();

        }
        if (ajax.readyState === 4 && ajax.status === 404)
        alert("Greska: nepoznat URL");  

    };
    ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16190", true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajax.send("akcija=brisanje" + "&proizvod=" + JSON.stringify(element));
}




