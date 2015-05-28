<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
 <head>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>The Rocket</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <script type="text/javascript" src="drop-down-menu.js"></script>
        <script type="text/javascript" src="spa.js"></script>
        <!--<script src="validacija.js"></script>-->
        <script src="tableFunctions.js"></script>

        
    </head>
    <body>


    	<div class="parentWrapper">
        <div class="container">
        <div class="header">
            <h1>Billiards and Snooker Club </h1>
            <h2><img alt="Cover" src="The Rocket-images/coollogo_com-792718.png"/></h2>
            <!-- <img id="header-slika" src="The Rocket-images/images.jpg" />-->
        </div>
        </div>
           
        
        <div class="container">
         <div class="menu" >
            
             <ul id="prva" >
                 <li><a onClick="replace('homepage.php')">Home</a></li>
                 <li><a onClick="replace('homepage.php')" onmouseover="sakrijMeni();">Play</a></li>
                 <li id="dine-drink"><a  onClick="replace('homepage.php')" onmouseover="prikaziMeni();" >Dine &amp; Drink</a>
                     <ul id="drop-down" class="menu-invisible" onmouseover="prikaziMeni();" onmouseout="sakrijMeni();" >
                         <li><a onClick="replace('homepage.php')">Restaurant</a></li>
                         <li><a onClick="replace('homepage.php')">Bar</a></li>
                         
                     </ul>
                 
                 </li>
                 <li><a onClick="replace('homepage.php')" onmouseover="sakrijMeni();" >Tournaments</a></li>
                 <li><a onClick="replace('rankings.html'); loadElements();" >Rankings</a></li>
                 <li><a onClick="replace('homepage.php')">Specials</a></li>
                 <li><a onClick="replace('homepage.php')">Facilities</a></li>
                 <li><a onClick="replace('products.html')">Products</a></li>
             </ul>
             
             <ul id="druga">
                 <li><a onClick="replace('homepage.php')">Register</a></li>
                 <li><a onClick="replace('homepage.php')">Sing in</a></li>
                 <li><a onClick="replace('contact.html')">Contact</a></li>
             </ul>
        </div>
        </div>

    <div id="replace-index">
          <div class="content">
        <div class="wrapper">
        <div class="container">
            
        	<?php

            $vijest_glob;

        	function read($id)
        	{

        		$veza = new PDO("mysql:dbname=rocket;host=localhost;charset=utf8", "wt8user", "wt8pass");
             $veza->exec("set names utf8");


             $izraz = $veza->prepare("select id, naslov, slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, detaljnije from vijest 
             	where id=:id order by vrijeme desc");

             $izraz->execute(array(":id" => $id));
             $vijest=$izraz->fetch(PDO::FETCH_ASSOC);
             $vijest_glob=$vijest;



 
             if (!$vijest) {
             $greska = $veza->errorInfo();
             print "SQL greška: " . $greska[2];
             exit();
             }
            
            $id=$vijest['id'];
            $naslov=$vijest['naslov'];
            $slika=$vijest['slika'];
            $tekst=$vijest['tekst'];
            $autor=$vijest['autor'];
            $vrijeme=$vijest['vrijeme2'];
            $detaljnije=$vijest['detaljnije'];


            print "
            <div id='komentar-blok'>
            <div class='tekst2'><div class='slikica'>
            <img alt='tab' src='".$slika."'/></div>
            <h2 id='rm2'>".$naslov."</h2>
            <p class='rm'>".$tekst."</p>
            <div id='detalji'> <p class='rm'>".$detaljnije."</p></div>
            <h5 id='autor' class='shaded'>By ".$autor."&nbsp".date("d.m.Y. (h:i)", $vrijeme)."</h5>
            
            </div>
            </div>
            <br>
            <br>";



            $veza = new PDO("mysql:dbname=rocket;host=localhost;charset=utf8", "wt8user", "wt8pass");
            $veza->exec("set names utf8");
            $izraz = $veza->prepare("select id, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, email from komentar where vijest=:id order by vrijeme desc");

             $izraz->execute(array(":id" => $id));
             $komentari=$izraz->fetchAll(PDO::FETCH_ASSOC);


             
        
            if(count($komentari)==0){
            echo "<p class='rm3'> No comments! </p>";
            } 

            else {echo "<a  class='rm3' onClick='showComments()'>Show ".count($komentari)." comments </a> <br>";}
            echo "<br>";
            echo "<br>";
            echo "<br>";

            echo "<div id='komentar'>";
            foreach($komentari as $komentar){
                //echo "<div  style='width:40%; border: 1px solid #9e0303;'>";
              echo "<div class='komentar-border'>";
              print "<p class='rm'>Comment: <br>".$komentar['tekst']."</p>"."&nbsp"."<small class='smallred'>Author: ".$komentar['autor']."</small><br>"."&nbsp"."<small class='smallred'>Email: ".$komentar['email']."</small><br>"."&nbsp"."<small class='smallred'>Date: ".date("d.m.Y. (h:i)", $komentar['vrijeme2'])."</small>"."</div><br>";
            }
            echo "</div>";

            
            
           
          
        }


        if(isset($_GET['id']))
        	read($_GET['id']);

        
        // $vijest = $_GET['vijest'];
        // $tekst= $_POST['tekst'];
        // $autor= $_POST['autor'];
        // echo $vijest+"to";
       


        if(isset($_POST['post-comment'])){
            if(!isset($_POST['autor']))
            {
                $autor='Anonimus';
            }
            else{
            $autor=htmlentities($_POST['autor'],ENT_QUOTES);
            }

            $id=htmlentities($_POST['id'],ENT_QUOTES);
            $tekst=htmlentities($_POST['tekst'],ENT_QUOTES);
            $email=htmlentities($_POST['email'],ENT_QUOTES);
            

        $veza = new PDO("mysql:dbname=rocket;host=localhost;charset=utf8", "wt8user", "wt8pass");
        $veza->exec("set names utf8");
        $izraz = $veza->prepare("insert into komentar set vijest=?, tekst=?, autor=?, email=?;");
        $izraz->execute(array($id,$tekst,$autor,$email));
        read($id);
        
        }
        	


        	?>

    <div id="ostavi-komentar-div">
    <form id="ostavi-komentar" name="komentar_forma" action='read_more.php' method='POST'>
        <h4 id="komentar-post"> Post your comment</h4>
    
    <label class="komentar-labela">tekst:</label><br>
    <textarea cols="34" rows="5" class"komentar-unos" name="tekst"></textarea>
    <br><br>

    <label class="komentar-labela">autor:</label>
    <input class="komentar-unos" name="autor"></input>
    <br>

    <label class="komentar-labela">email:</label>
    <input class="komentar-unos" name="email"></input>
    <input type='hidden' name='id' value="<?php if(isset($_GET['id'])) echo $_GET['id'];?>"></input>
    <br>
    <input type='submit' class="komentar-unos" value='Unesi' name="post-comment"></button>
      <br>

  </form>
</div>


        </div>
        </div>
          </div>
        
  <div id="parentFooter">
            <div class="container">
        <div class="footer">
            
            <div class="FT">
            <h2>Join Us</h2>
            <img alt="twitter" src="The Rocket-images/twitter.png"/>
            <img alt="facebook" src="The Rocket-images/facebook.png"/> 
            
            <div class="FT1">
             <h4>For the latest offers, news and daft stuff, follow us on 
                    Twitter and Facebook. </h4></div>
            </div>
            
        </div>
        </div>
            </div>
   </div>
    
   
  </body>  

</html>
