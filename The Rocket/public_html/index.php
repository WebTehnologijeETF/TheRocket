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
            <div class="tekst">
                <h1>Welcome to the Rocket!</h1>
                <p>Situated in the heart of <span>Newcastle upon Tyne</span>, the Rocket is celebrating over <span>35 years</span> as the region's premier pool and snooker venue. From full size snooker tables, English and American Pool, gaming machines, quality bar food and an extensively stocked bar, we've got all the ingredients for a great night out. </p>

                <p>Open daily from <span>11am - Midnight (Noon - 11pm Sunday)</span>, all are welcome. Call in for a beer, game of pool or darts or just to check your Facebook page with our free Wi-Fi. The outdoor terrace area is available for smokers while downstairs we've got so much going on, you'll be spoilt for choice! The Rocket Team look forward to seeing you very soon, and don't forget, we show all live sports on our large-screen and TV's, accept debit / credit cards and offer a cash-back service, too!</p>
            
            </div>
            
            <div class="slika">
                <img alt="Pool img" src="The Rocket-images/pool01.jpg"/>
                
            </div>
            
        </div>
        
        <div class="container">
            <div class="tekst">
                <h1>So much in one place:</h1>
                
                <ul>
                    <li>22 traditional English pool tables</li> 
                    <li>10 American pool tables</li>
                    <li>8 full size snooker tables</li>
                    <li>Challenging 'L' shape pool table</li>
                    <li>Free Wi-Fi - Perfect for your phone and laptop</li>
                    <li>Quiz and fruit machines, air-hockey, Foosball and bar billiards</li>
                    <li>Boxing machine, darts area with 5 boards and free dart hire</li>
                    <li>Internet Jukebox - download your favourite songs</li>
                    <li>"Push the Button" Happy Hour from 6pm - 8pm every weekday</li>
                    <li>All live sports shown on our large-screen and TV's</li>
                    <li>Cue repairs and purchases, tip replacement etc</li>
                    <li>Card payments and cash-back available at the bar</li>
                    <li>Pool competitions and special offers all year round</li>
                    <li>10 American pool tables</li>
                    
                </ul>
            
            </div>
            
            <div class="slika">
                <img alt="Pool img" src="The Rocket-images/bd4cb797feab58b8a4eba6b0ca41bf28_f57.jpg"/>
                
            </div>
            
            
        </div>
        
        
        <div class="container">
            
              <div class="tekst1">  
            <h1 id="LN">Latest News</h1>
            
            <?php
             $veza = new PDO("mysql:dbname=rocket;host=localhost;charset=utf8", "wt8user", "wt8pass");
             $veza->exec("set names utf8");

             $izraz = $veza->prepare("select id, naslov, slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, detaljnije from vijest order by vrijeme desc");
             $izraz->execute();
             $rezultat=$izraz->fetchAll(PDO::FETCH_ASSOC);

             if (!$rezultat) {
             $greska = $veza->errorInfo();
             print "SQL greška: " . $greska[2];
             exit();
             }



            foreach ($rezultat as $vijest) {
            $id=$vijest['id'];
            $naslov=$vijest['naslov'];
            $slika=$vijest['slika'];
            $tekst=$vijest['tekst'];
            $autor=$vijest['autor'];
            $vrijeme=$vijest['vrijeme2'];
            $detaljnije=$vijest['detaljnije'];


            print "<form id='novost".$id."' action='read_more.php' method='GET'>
            <div class='tekst2'><div class='slikica'>
            <img alt='tab' src='".$slika."'/></div>
            <h2>".$naslov."</h2>
            <p>".$tekst."</p>
            <h5 class='shaded'>By ".$autor."&nbsp".date("d.m.Y. (h:i)", $vrijeme)."</h5>
            <h3><a onClick='openReadMore(".$id.")' >Read more...</a>
            <input type='hidden' value='".$id."' name='id'></h3>
            </div></form>";
        }

        ?>
           

          <!--   <div class="tekst2">
            <div class="slikica">
                <img alt="tab" src="The Rocket-images/1439185-30780610-1600-900.jpg"/>
            </div>
               
                <h2>Michaela Tabb quits snooker</h2>
                
                <p>Michaela Tabb, the most famous referee on the world snooker circuit, has quit the sport.</p>
              
                <h5 class="shaded">By Eurosport 19/03/2015 17:28</h5>
            <h3><a href="#">Read more...</a></h3>
            
        
                </div>
            
            <div class="tekst2">
            <div class="slikica">
                <img alt="tab" src="The Rocket-images/1439185-30780610-1600-900.jpg"/>
            </div>
            
            <h2>Judd Trump - Ronnie O'Sullivan</h2>
            <p>March 2015. World Grand Prix – Follow the Snooker match between
Judd Trump and Ronnie O'Sullivan live with Eurosport.</p>
            
            <h5 class="shaded">By Eurosport 19/03/2015 17:28</h5>
            <h3><a href="#">Read more...</a></h3>
            </div>
            
            <div class="tekst2">
            <div class="slikica">
                <img alt="tab" src="The Rocket-images/1439185-30780610-1600-900.jpg"/>
            </div>
            
            <h2>Judd Trump - Ronnie O'Sullivan</h2>
            <p>March 2015. World Grand Prix – Follow the Snooker match between
Judd Trump and Ronnie O'Sullivan live with Eurosport.</p>
            
            <h5 class="shaded">By Eurosport 19/03/2015 17:28</h5>
            <h3><a href="#">Read more...</a></h3>
            </div>
            
            <div class="tekst2">
            <div class="slikica">
                <img alt="tab" src="The Rocket-images/1439185-30780610-1600-900.jpg"/>
            </div>
            
            <h2>Judd Trump - Ronnie O'Sullivan</h2>
            <p>March 2015. World Grand Prix – Follow the Snooker match between
Judd Trump and Ronnie O'Sullivan live with Eurosport.</p>
            
            <h5 class="shaded">By Eurosport 19/03/2015 17:28</h5>
            <h3><a href="#">Read more...</a></h3>
            </div>
            -->
              
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
            <!--
            <div class="FT2">
              
                <h2>Find Us</h2>
                <img  alt="map" src="The Rocket-images/map-2.png"/>
                
                <div class="FT1">
                <p>The Rocker Billiards and Snooker Club, Hadrian House, 
Higham Place,Newcastle upon Tyne, NE1 8AF  
Telephone: 0191 241 0660</p></div>
                
            </div>
           -->
        </div>
        </div>
            </div>
               </div>


            
            </div>
                
            </div>
            
            
        
        
        
         <!--<script type="text/javascript" src="tableFunctions.js"></script>-->
    </body>
</html>
