<?php session_start(); 
if(!isset($_GET['restid'])){
 header("Location:finalproject3.php");
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
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

            <title>Findine | Restinfo</title>
            <style type='text/css''>
              .srest{
                width:350px;
                height:300px;
              }
              .search-box {
        position: relative;        
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
    .search-box input:focus {
        border-color: #3FBAE4;
    }
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    .pizz{
      height:100px;
      border:0px solid rgb(100,100,100);
    }
    .ffo{
      text-align:center;
      padding:10px;
    }
    
    .menu{
      height:100px;
      width:100px;
    }
    .rest{
      color:rgb(100,100,100);
    }
    table{
      height:500px;
      position:sticky;
      top:0;
    }
    .border-end{
      position:sticky;
      top:0;
    }
    #myinfo{
       position:sticky;
      top:0;

    }
    @media screen and (min-width:300px) and (max-width:500px){
      #hori{
        margin-top:150px;
      }
      .cart{
        margin-top:0px
      }
      .pizz{
        width:300px;
        margin-left:20px;
      }
      
    }
            </style>



          </head>
          <body>

            <div class='container'>
              <?php include "findinenavbar.php"  ?>
              <!-- body content-->
              <?php 
                        include_once "finapjtconn.php";
                       $objRest = new Restaurant;
                        $restaurant=$objRest->getmyRestaurant($_GET['restid']);
                         foreach ($restaurant as $key => $value) {
                            
                         ?>
              <div class='row'>
                <div class='col-md-6'>
                  <img src="logo/<?php echo $value['rest_logo'];  ?>" class='img-fluid srest'>
                </div>
                
                <div class='col-md-6'>

                  <h1 class='mt-1 rest'><?php echo $value['rest_name'] ?></h1>
                  <h2 class='mt-5 rest'><?php echo $value['rest_location'] ?></h2>
                  
                </div>

              </div>
              <?php  }?>
              <div class='row'>
                <div class='col-md-12'>
                  <p class='badge-info mt-5' style='text-align:center;padding:15px'>Delivered by Us</p>
                </div>
              </div>

              <div class='row '>
                <div class='col-md-10'>
                  <h1><a href='#' style='color:rgb(132,210,230);'><i style="font-size:30px" class="fa">&#xf0f5;</i>Menu</a></h1>
                </div>
                <div class='col-md-2'>
                  <h1><a href='#' style='color:rgb(132,210,230);'><i class="fas fa-exclamation-circle"></i>Info</a></h1>
                </div>
              </div>
              <div class='row mt-5'>
                <div class='col-md-2'>
                  <div class="border-end bg-light" id="sidebar-wrapper"><h2 style='text-align: center'>Categories</h2>
                  <div class="list-group list-group-flush">
                     <?php
                        include_once "finapjtconn.php";

                        $objrestmenu=new Restaurant;

                        $menu=$objrestmenu->listcatMenu($_GET['restid']);
                        ?>
                        <?php
                         
                        foreach($menu as $key => $menus){
                            
                            ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-light" href="#<?php echo $menus['category_id'];  ?>" ><?php echo $menus['category_name'];  ?></a><?php }?>
                </div>
                </div>
              </div>

              <div class='col-md-5'>
                <div class="search-box table">
                                <a href='#'><i class="material-icons">&#xE8B6;</i></a>
                                <input type="text" class="form-control" placeholder="Search menu&hellip;">
                    </div>
                    <div class='badge-info ffo' id='pizza'>MENU</div>
                    <?php
                        include_once "finapjtconn.php";

                        $objmymenu=new Restaurant;

                        $food=$objmymenu->listmyMenu($_GET['restid']);
                        ?>
                        <?php
                         
                        foreach($food as $key => $foods){
                            
                            ?> 
                    <div class='row mt-3 pizz' id="<?php echo $foods['restfood_catid']  ?>">

                      <div class='col-md-3'>
                        <img src="foodpic/<?php echo $foods['food_pic'];?>" alt='foodimage' class='img-fluid menu'>
                      </div>
                       <div class='col-md-7'>
                         <h6 style='margin-left:2px;color:rgb(100,100,100);'><?php echo $foods['food_name']  ?></h6>
                         <p style='font-size:14px;color:rgb(100,100,100); '><?php echo $foods['food_description']  ?></p>
                       </div> 
                        <div class='col-md-2'>
                          <p style='color:rgb(140,140,140); '>&#8358;<?php echo $foods['food_price']  ?></p>
                          <a href="checkout.php?foodname=<?php echo $foods['food_name'] ?>&foodprice=<?php echo $foods['food_price'] ?>&restid=<?php echo $foods['rest_id'] ?>&foodid=<?php echo $foods['rest_food_id'] ?>"><i style='font-size:24px;margin-left:10px;' class='fas cart'>&#xf217;</i></a>
                        </div>
                        
                    </div> 
                      <hr id='hori'>
                    <?php } ?>
                  </div> 
                  <div class='col-md-5' id="myinfo">
                    <table class='table table-hover table-bordered'>
                      <tr>
                        <td>Minimum Order amount</td>
                        <td>&#8358;500</td>
                      </tr>
                      <tr>
                        <td>Payment Type</td>
                        <td>Card/Cash/Bank Transfer</td>
                      </tr>
                      <tr>
                        <td>Working Hours</td>
                        <td>8:AM-10PM Everyday</td>
                      </tr>
                      <tr>
                        <td>Service Charge</td>
                        <td>&#8358;100 including VAT</td>
                      </tr>
                      <tr>
                        <td>Pre-Order</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <td>Cuisines</td>
                        <td>Burger,Pizza,Desert....</td>
                      </tr>
                    </table>
                  </div>
                </div>
               <?php include "findinefooter.php"; ?>
             </div>
       
       <script type='text/javascript' src='js/jquery.min.js'></script>
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>