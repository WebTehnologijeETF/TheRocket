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
        <script src="validacija.js"></script>
        <script src="tableFunctions.js"></script>

        
    </head>
    <?php 
      function correctName($name){
        $regex = "/[A-Z][a-zA-Z]*/";
        if(strlen($name)<=1)
          return false; 
        else if(!preg_match($regex, $name) && strlen($name)>1)
        return false;

        else return true;
      }

      function correctLastName($surname){
        $regex = "/[A-Z][a-zA-Z]*/";
        if(strlen($surname)<=1)
          return false; 
        else if(!preg_match($regex, $surname) && strlen($surname)>1)
        return false;

        else return true;

      }

      function correctTelephone($telephone){
        $regex="/^\+?([0-9]{5})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})$/";
        
        if(preg_match($regex, $telephone))
          return true;
        return false;

      }

      function correctEmail($email){
        $regex = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";

        if(preg_match($regex, $email))
          return true;
        return false;
      }

      function correctAddress($address){
        if(strlen($address)>3)
          return true;
        return false;
      }

      function correctCity($country, $city){
 
                
          
        
        /*if(strcmp($country, "BiH") == 0)
        {
          if((strcmp($city, "Sarajevo") == 0) || (strcmp($city, "Zenica") == 0) || (strcmp($city, "Tuzla") == 0))
          if($num==1){return "validation-thumbnail-visible"};
          else {return "validation-thumbnail-invisible"};
        }
        

        elseif(strcmp($country, "USA") == 0)
        {
          if((strcmp($city, "Washington") == 0) || (strcmif($num==1)return "validation-thumbnail-visible";
          if($num==1)return {"validation-thumbnail-visible"};
          else return {"validation-thumbnail-invisible"};
        }

        elseif(strcmp($country, "Australia") == 0)
        {
          if((strcmp($city, "Sydney") == 0) || (strcmp($city, "Melbourne") == 0) || (strcmp($city, "Canberra") == 0))
          if($num==1)return {"validation-thumbnail-visible"};
          else return {"validation-thumbnail-invisible"};
        }
        
        elseif($num==1){return "validation-thumbnail-invisible";} 
        elseif($num==0){return "validation-thumbnail-visible";}
      
     */ 
    }

      function isCorrect(){
        if(correctName($name) && correctLastName($surname) && correctEmail($email) &&
          correctAddress($address) && correctTelephone($telephone) && correctCity($country,$city))
          return true;
        return false;
      }


    ?>
    <body>
        
        <div class="parentWrapper">
        <div class="container">
        <div class="header">
            <h1>Billiards and Snooker Club </h1>
            <!-- <h2><img alt="Cover" src="/The Rocket-images/coollogo_com-792718.png"/></h2>-->
            <!-- <img id="header-slika" src="The Rocket-images/images.jpg" />-->
        </div>
        </div>
           
        
        <div class="container">
         <div class="menu" >
            
             <ul id="prva" >
                 <li><a onClick="replace('homepage.html')">Home</a></li>
                 <li><a onClick="replace('homepage.html')" onmouseover="sakrijMeni();">Play</a></li>
                 <li id="dine-drink"><a  onClick="replace('homepage.html')" onmouseover="prikaziMeni();" >Dine &amp; Drink</a>
                     <ul id="drop-down" class="menu-invisible" onmouseover="prikaziMeni();" onmouseout="sakrijMeni();" >
                         <li><a onClick="replace('homepage.html')">Restaurant</a></li>
                         <li><a onClick="replace('homepage.html')">Bar</a></li>
                         
                     </ul>
                 
                 </li>
                 <li><a onClick="replace('homepage.html')" onmouseover="sakrijMeni();" >Tournaments</a></li>
                 <li><a onClick="replace('rankings.html'); loadElements();" >Rankings</a></li>
                 <li><a onClick="replace('homepage.html')">Specials</a></li>
                 <li><a onClick="replace('homepage.html')">Facilities</a></li>
                 <li><a onClick="replace('products.html')">Products</a></li>
             </ul>
             
             <ul id="druga">
                 <li><a onClick="replace('homepage.html')">Register</a></li>
                 <li><a onClick="replace('homepage.html')">Sing in</a></li>
                 <li><a onClick="replace('contact.html')">Contact</a></li>
             </ul>
        </div>
        </div>
            
            <div id="replace-index">
                  <div class="content">
        <div class="wrapper">
        <div class="container">
            <div id="forma">
            <?php 

              echo $_POST['name'];
              echo $_POST['address'];
              echo $_POST['city'];
              echo $_POST['country'];
              echo strcmp($_POST['city'], "Tuzla");

              
            ?>
            <h2>Get in touch with us</h2>
            <h4>Please contact The Rocket team using following information:</h4>
            <p><span>Telephone:</span> 0191 241 0660  </p>          
            <p> <span> Address:</span> Higham Place,Newcastle upon Tyne, NE1 8AF  </p>
            <p> <span>Email:</span> therocket@gmail.com</p>
            <div id="required-fields" class="redstar">*-required fields</div>
            <form action="contact.php" method="POST">
                
                
                <div>
                    <div>
                        <label><span class="redstar">*</span>Name:</label>
                    </div>
                    <input id="ime-input"  type="text" class="my-input" name="name" value="<?php echo $_POST['name'];    ?>">
                    
                    <span id="ok-ime-input" class="<?php if(correctName($_POST['name'])){ echo 'validation-thumbnail-visible'; } else{echo 'validation-thumbnail-invisible';} ?>">
                        <img alt="" class="zeleno" src="The Rocket-images/check">
                    </span>
                    
                    <span id="notok-ime-input" class="<?php if(correctName($_POST['name'])){ echo 'validation-thumbnail-invisible'; } else{echo 'validation-thumbnail-visible';} ?>">
                        <img alt="" class="crveno" src="The Rocket-images/error">
                        <span id="message-error1" class="validation-error">Name should contain more than one letter, first letter must be capitalized and shouldn't contain numbers.
                        </span></span>
                </div>
                
                <div>
                    <div>
                <label><span class="redstar">*</span>Surname:</label>
                    </div>
                <input id="prezime-input" class="my-input"  type="text" name="surname" value="<?php echo $_POST['surname'];    ?>">
                <span id="ok-prezime-input" class="<?php if(correctLastName($_POST['surname'])){ echo 'validation-thumbnail-visible'; } else{echo 'validation-thumbnail-invisible';} ?>">
                        <img alt="" class="zeleno" src="The Rocket-images/check">
                    </span>
                    <span id="notok-prezime-input" class="<?php if(correctLastName($_POST['surname'])){ echo 'validation-thumbnail-invisible'; } else{echo 'validation-thumbnail-visible';} ?>">
                        <img alt="" class="crveno" src="The Rocket-images/error">
                        <span id="message-error2" class="validation-error">Surname should contain more than one letter, first letter must be capitalized and shouldn't contain numbers.
                        </span></span>
                </div>
                
                <div>
                <div>
                <label>Telephone:</label>
                </div>
                <input id="telefon-input" class="my-input"  type="text" name="telephone">   
                <span id="ok-telefon-input" class="<?php if(correctTelephone($_POST['telephone'])){ echo 'validation-thumbnail-visible'; } else{echo 'validation-thumbnail-invisible';} ?>">
                    <img alt="" class="zeleno" src="The Rocket-images/check">
                </span>   
                <span id="notok-telefon-input" class="<?php if(correctTelephone($_POST['telephone'])){ echo 'validation-thumbnail-invisible'; } else{echo 'validation-thumbnail-visible';} ?>">
                    <img alt="" class="crveno" src="The Rocket-images/error">
                    <span id="message-error3" class="validation-error">Phone should be in this format: +XXXX-XXX-XXX
                        </span>
                </span>
                </div>
                
                
                <div>
                <div>
                <label><span class="redstar">*</span>Email:</label>
                </div>
                  <input id="email-input" class="my-input"  type="text" name="email">
                  <span id="ok-email-input" class="<?php if(correctEmail($_POST['email'])){ echo 'validation-thumbnail-visible'; } else{echo 'validation-thumbnail-invisible';} ?>">
                      <img alt="" class="zeleno" src="The Rocket-images/check">
                  </span>
                  <span id="notok-email-input" class="<?php if(correctEmail($_POST['email'])){ echo 'validation-thumbnail-invisible'; } else{echo 'validation-thumbnail-visible';} ?>">
                      <img alt="" class="crveno" src="The Rocket-images/error">
                      <span id="message-error4" class="validation-error"> Email should be in this format: email@email.com
                          
                      </span>
                  </span>
                </div>
                
                <div>
                    <div>
                <label><span class="redstar">*</span>Address:</label>
                    </div>
                <input id="address-input" class="my-input"  type="text" name="address">
                <span id="ok-address-input" class="<?php if(correctAddress($_POST['address'])){ echo 'validation-thumbnail-visible'; } else{echo 'validation-thumbnail-invisible';} ?>">
                    <img alt="" class="zeleno" src="The Rocket-images/check">  
                </span>
                
                <span id="notok-address-input" class="<?php if(correctAddress($_POST['address'])){ echo 'validation-thumbnail-invisible'; } else{echo 'validation-thumbnail-visible';} ?>">
                    <img alt="" class="crveno" src="The Rocket-images/error">
                      <span id="message-error5" class="validation-error"> Invalid address
                          
                      </span>
                    
                </span>
                
                
                </div>
                
                <div>
                <div>
                <label><span class="redstar">*</span>Country:</label>
                </div>
                <select id="country-input" class="my-input"  name="country" >
                <option id="value1" value="BiH" selected>BiH</option>
                <option id="value2" value="USA">USA</option>
                <option id="value3" value="Australia">Australia</option>
              </select>
              

                </div>
                
                <div>
                <div>
                <div>
                    <label><span class="redstar">*</span>City:</label></div>
                    <select id="city-input" class="my-input" name="city" >
                <option id="gradvalue1" value="Sarajevo" selected>Sarajevo</option>
                <option id="gradvalue2" value="Zenica">Zenica</option>
                <option id="gradvalue3" value="Tuzla">Tuzla</option>
                <option id="gradvalue4" value="Washington">Washington</option>
                <option id="gradvalue5" value="New York">New York</option>
                <option id="gradvalue6" value="Los Angeles">Los Angeles</option>
                <option id="gradvalue7" value="Sydney">Sydney</option>
                <option id="gradvalue8" value="Melbourne">Melbourne</option>
                <option id="gradvalue9" value="Canberra">Canberra</option>
              </select>
              <!-- <input type="hidden" name="test_text" id="text_content" value="" />-->
                <span id="ok-city-input" class="<?php print(correctCity($_POST['city'], $_POST['country'])); ?>">
                    <img alt="" class="zeleno" src="The Rocket-images/check">  
                </span>
                
                <span id="notok-city-input" class="<?php print(correctCity($_POST['city'], $_POST['country'])); ?>">
                    <img alt="" class="crveno" src="The Rocket-images/error">
                      <span id="message-error6" class="validation-error"> You must choose the city from selected country.
                          
                      </span>
                    
                </span>
              
                </div>
                
                
                
                <div>
                    <div>
                    <label><span class="redstar">*</span>ZIP code:</label></div>
                    <input id="zip-input" class="my-input" name="zip" onblur="Servis(this)" type="text" >
                    
                    <span id="ok-zip-input" class="validation-thumbnail-invisible">
                    <img alt="" class="zeleno" src="The Rocket-images/check">  
                </span>
                
                <span id="notok-zip-input" class="validation-thumbnail-invisible">
                    <img alt="" class="crveno" src="The Rocket-images/error">
                      <span id="message-error6" class="validation-error"> Invalid ZIP
                          
                      </span>
                    
                </span>
                    
                </div>
                
               <div id="description">
                   <div>
                       <label>Description:</label></div>
                
                    <textarea id="description-input" name="description"></textarea>
             
                </div>
                
            
                 
                <input  type="submit" name="submit" value="Submit">
            </form>
        </div>
        </div>
          </div>
          </div>
        
         <div class="parentFooter">
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
                
            </div>
            
            
        
        
        
         <!--<script type="text/javascript" src="tableFunctions.js"></script>-->
    </body>
</html>
