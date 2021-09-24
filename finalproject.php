<?php session_start(); ?>
 <!DOCTYPE html>
<html lang="en">
        <head>
          <meta name='keyword' content='findine,finedine website,restaurant finder in lagos,restaurant finder in nigeria,restaurant,reservation,eatery,classical restaurants in lagos,food delivery,,desert,dish,cuisine,clasical restaurant,best restaurants in lagos'>
          <meta name='description' content='Finedine is an online restaurant finder where you can order food'>
          <meta name='author' content='Ikuyinminu Solomon'>
	        <meta charset="utf-8">
	        <meta='viewport' content='width=device-width,initial-scale=1, shrink-to-fit=no'>
	        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
           <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
           <script type='text/javascript' src='js/jquery.min.js'></script>
           <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <title>Findine</title>
            <style type='text/css''>
            div{
              border:0em solid #00ffff;
                }
            .search-box {
            position: relative;        
              }
            .search-box input {
            height: 3.125em;
            border-radius: 1.25em;
            padding-left: 2.188em;
            border-color: #ddd;
            box-shadow: none;
             }
            .search-box input:focus {
            border-color: #3FBAE4;
             }
            .search-box i {
            color: #D90026;
            position: absolute;
            font-size: 1.2em;
            top: 0.813em;
            left: 0.625em; 
              }
            .myimg{
              background-image:url('picture/bbb.jpg');
              background-size:cover;
              height:31.25em;
            }
            .navbar-brand{
              margin-left:0.625em;
              
            }
            #finedine{
              font-family:algerian,serif;
              font-size:6.25em;
              text-align: center;
              color:#ffffff;
            }
            #intro{
              font-family:Arial;
              font-size:2.188em;
              text-align: center;
              color:#ffffff;
            }
            
            .menu{
              font-size:2.5em;
              font-family:'Lucida Console',serif;
              text-align:center;
            }
            #foodmenu{
              background-image:url('picture/big.jpg');
              height:18.75em;
              background-size:cover;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu1{
              background-image:url('picture/pizza1.jpg');
              background-size:cover;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu2{
              background-image:url('picture/desert.jpg');
              background-size:cover;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu3{
              background-image:url('picture/swallow.jpg');
              height:18.75em;
              background-size:cover;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu4{
              background-image:url('picture/jollof.jpg');
              background-size:cover;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu5{
              background-image:url('picture/cocktails.png');
              background-size:cover;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu6{
              background-image:url('picture/fruit.jpg');
              background-size:contain;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            #foodmenu7{
              background-image:url('picture/drink.jpg');
              background-size:cover;
              height:18.75em;
              border-radius:0.625em;
              margin-bottom:0.625em;
              color:#ffffff;
            }
            .box:hover{
             transform:scale(1.1); 
            }
            .restname{
              text-align:center;
              font-family:castellar;
              font-size:1.25em;
              display:block;
            }
            .rest:hover{
              transform:scale(1);
              border:0.3125em solid #000000;
            }
            .rest{
              border-radius:0.625em;
            }
            .rest a{
              text-decoration:none;
              color:#000000; 
            }
            #partner a:hover{
              color:#ffffff;
            }
            
            
            @media screen and (min-width:300px) and (max-width:500px){
              
              #finedine{
                font-size:1.875em;
              }
              .menu{
                font-size:1.25em;
                margin-top:4.375em;
              }
              .dropup{
                margin-left:1.875em ;
              }
              #intro{
              font-size:1.25em;
            }
              

            }
            @media screen and (min-width:500px) and (max-width:1035px){
             
              #mynav li a{
                margin-right:0.3125em; 
              }
            }
          </style>
              </head>
                  <body>
                        

                    <div class='container-fluid'>
                      <?php include "findinenavbar.php";?>
                      <div class='row bg-image myimg'>
                       <div class='col-md-12'>
                        <div class='row'>
                        <div class='col-md-10 offset-1'>
                          <p id='finedine'>FINDINE</p>
                           <p id='intro'>DISCOVER THE BEST FOOD AND DRINKS FROM YOUR FAVOURITE RESTAURANTS</p>
                         </div>
                          <div class='col-md-1'></div>
                       </div>
                         <div class='row'>
                        <div class='col-md-10 offset-1'>
                           <div class="search-box table">
                                <a href='myfoodsearch.php'><i class="material-icons">&#xE8B6;</i></a>
                                <input type="search" name='search' id='search' class="form-control" placeholder="Search menu&hellip;">
                            </div>
                            <div id="searchresult"></div>
                           
                       </div>
                       <div class='col-md-1'></div>

                      </div>
                     </div>
                   </div>
                     <div class='row' style='background-color: rgb(240,240,240);'>
                      <div class='col-md-12'>
                        <p class='menu mt-5' id='cui'>WHAT'S ON THE MENU?</p>
                      </div>
                     </div>
                     <div class='row' style='padding:50px'>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu' class='box'>Burger</p>
                       </a>  
                       </div>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu1' class='box'>Pizza</p></a>  
                       </div>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu2' class='box'>Deserts</p></a></div>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu6' class='box'>Fruits</p></a> 
                       </div>
                     </div>
                     <div class='row' style='padding:50px'>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu3' class='box'>Swallow</p></a>  
                       </div>
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu4' class='box'>Rice</p></a>  
                       </div> 
                       <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu5' class='box'>Cocktails</p></a></div>
                        <div class='bg-image col-sm-12 col-md-3' ><a href='finalproject3.php' style='text-decoration:none;'><p id='foodmenu7' class='box'>Soft drinks</p></a>
                       </div>  

                   </div>
                   <div class='row'>
                    <div class='col-md-12'>
                      <p class='menu mt-5'>TOP RESTAURANTS</p>
                    </div>
                   </div>
                   <div class='row' style='background-color: rgb(240,240,240);padding:50px'>
                    <?php 
                        include_once "finapjtconn.php";
                       $objRest = new Restaurant;
                        $restaurant=$objRest->gettopRestaurant();

                           
                        $counter=1;
                         foreach ($restaurant as $key => $value) {
                            
                         ?>
                    <div class='bg-image col-sm-12 col-md-3  rest ' style='border:1px solid rgb(163,163,163);margin-bottom:20px'>
                      <a href="restinfo.php?restid=<?php echo $value['rest_id'] ?>" ><p><img src='logo/<?php echo $value['rest_logo'];  ?>' class='img-fluid' alt='<?php echo $value['rest_name'] ?>'><hr style='border:1px solid rgb(163,163,163)'><span class='restname'><?php echo $value['rest_name'] ?></span></p></a>

                          <div class="btn-group dropup" >
                          <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">Quick view <span class="caret"></span></button>
                          
                           <ul class="dropdown-menu" style="font-family:'lucida calligraphy',serif;">
                                  <li><h3>MENU</h3></li>
                                  <?php
                        include_once "finapjtconn.php";

                        $objrestmenu=new Restaurant;

                        $menu=$objrestmenu->listMenu($value['rest_id']);
                         
                        foreach($menu as $key => $menus){
                            
                            ?>
                            <li><?php echo $menus['food_name']?></li>
                            <?php } ?>
                            <li><a href='restinfo.php?restid=<?php echo $value['rest_id'] ?>' style="color:blue;font-family:verdana ">More</a></li>
                               </ul></div>
                                 
                    </div>
                    <?php } ?>
                    
                
                  </div>
    
                 
                 
                 <div class='row'>
                  <div class='col-md-12'>
                    <p class='menu mt-5'>WORK WITH FINDINE</p>
                 </div>
               </div>
                 <div class='row'>
                  <div class='col-md-2'></div>
                  <div class='col-md-4'>
                  
                    <div class="card">
                      <div class="card-body">
                        <h1 class="card-title" style='font-family:gabriola,serif;'>BECOME A PARTNER</h1>
                        <p class="card-text">Work With <b>FINDINE</b> And Reach More Customers Than Ever.We Take Orders Through Our Platform Then You Deliver</p>
                        <a href="finalproject2.php" class="btn btn-primary">Partner With Us</a>
                      </div>
                    </div>
                  
                  
                
                                     
                 </div>
                 <div class='col-md-4'>
                  <div style='border-radius:5px;border:1px solid  rgb(223,223,223); '>
                   <h1 style='text-align:center;color:#000000;font-family:gabriola,serif; '>BENEFITS OF PARTNERSHIP</h1>
                   <ul>
                     <li>We Make Ordering Process Easier</li>
                     <li>Efficient Customer And Order Management</li>
                     <li>Better Customer Data</li>
                     <li>Conveneience Of Mobile Ordering</li>
                     <li>Reach More Customers</li>
                     <li>Move ahead of competition</li>
                      
                     
                   </ul>
                 </div>
                 </div>
                 <div class='col-md-2'></div>
               </div>
               <?php include "findinefooter.php" ?>
             </div>

<script type='text/javascript' language='javascript'>
     $(document).ready(function(){
             $('#search').keypress(function(){
          var searchvalue=$(this).val();
          //alert(searchvalue);

          //use jquery ajax method to send the value to server script search.php
                 $.ajax({
                  type:"POST",
                  url:"mysearch.php",
                  data:"searchfood="+ searchvalue,
                  success:function(response){
                    $('#searchresult').html(response);
                  },
                  error:function(error){
                    console.log(error);
                  }

                 })
        })

             })
      </script>
               
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>