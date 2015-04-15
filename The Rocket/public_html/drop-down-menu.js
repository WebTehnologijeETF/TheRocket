/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function prikaziMeni()
{    
    
    var meni=document.getElementById("drop-down").value;
    document.getElementById("drop-down").className="menu-visible";
   
    
}

function sakrijMeni()
{
    document.getElementById("drop-down").className="menu-invisible";
}
