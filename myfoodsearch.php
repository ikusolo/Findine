<?php session_start(); 
if(!isset($_GET['foodid'])){
  header("Location:finalproject.php");
}
?>
<!DOCTYPE html>
<html lang="en">
        <head>
          <meta name='keyword' content='findine,finedine website,restaurant finder in lagos,restaurant finder in nigeria,restaurant,reservation,eatery,classical restaurants in lagos,food delivery,,desert,dish,cuisine,clasical restaurant,best restaurants in lagos'>
          <meta name='description' content='Finedine is an online restaurant finder where you can order food '>
          <meta name='author' content='Ikuyinminu Solomon'>
          <meta charset="utf-8">
          <meta='viewport' content='width=device-width,initial-scale=1, shrink-to-fit=no'>
          <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
           <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
            <title>Findine | Food search</title>
            <style type='text/css''>
              .rest:hover{
              transform:scale(1);
              border:5px solid #000000;
            }
            .rest{
              border-radius:10px;
            }
            .rest a{
              text-decoration:none;
              color:#000000; 
            }
            .restname{
              text-align:center;
              font-family:castellar;
              font-size:15px;
              display:block;
            }
            </style>



          </head>
          
             <body>
            <div class='container'>
              <?php include "findinenavbar.php" ?>
             
                     <div class='row mt-5' style='background-color: rgb(240,240,240);'>
                       <?php 
                        include_once "finapjtconn.php";
                       $objRest = new Restaurant;
                        $restaurant=$objRest->listmyrest($_GET['foodid']);   
                        $counter=1;
                         foreach ($restaurant as $key => $value) {
                            
                         ?>
                
                    <div class='bg-image col-sm-12 col-md-3  rest ' style='border:1px solid rgb(163,163,163);margin-bottom:20px'>
                      <a href="restinfo.php?restid=<?php echo $value['rest_id'] ?>" ><p><img src='logo/<?php echo $value['rest_logo'];  ?>' class='img-fluid' alt='boulder burger'><hr style='border:1px solid rgb(163,163,163)'><span class='restname'><?php echo $value['rest_name'] ?></span></p></a>
                    

                       <div class="btn-group dropup" style='margin-left:20px '>
                          <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">Quick view <span class="caret"></span></button>
                          
                           <ul class="dropdown-menu" style="font-family:'lucida calligraphy';">
                                  <li><h3>MENU</h3></li>
                                  <?php
                        include_once "finapjtconn.php";

                        $objrestmenu=new Restaurant;

                        $menu=$objrestmenu->listMenu($value['rest_id']);
                         
                        foreach($menu as $key => $menus){
                            
                            ?>
                            <li><?php echo $menus['food_name']?></li>
                            <?php } ?>
                             
                            <li><a href='#' style="color:#0000ff;font-family:verdana ">More</a></li>
                          

                               </ul>
                              
                                 </div>
                    </div>
                    <?php } ?>
                  </div>
                    
                   
               <?php include "findinefooter.php" ?>
             </div>
       
       <script type='text/javascript' src='js/jquery.min.js'></script>
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>