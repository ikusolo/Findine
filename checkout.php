<?php session_start();
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
           <script type='text/javascript' src='js/jquery.min.js'></script>
           <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <title>Findine|checkout</title>
            <style>
              
            </style>
          </head>
          <body>
            <?php
            include_once "finapjtconn.php";
            if(isset($_POST['submit'])){
              if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['add']) ){
                $error="fill required input";
              }else{
                $obj=new restaurant;
                $output=$obj->order($_GET['restid'],$_SESSION['custid'],$_GET['foodid'],$_POST['price'],$_POST['qty']);
                $_SESSION['orderid']=$output;
                $myprice=$_POST['price'];

                $msg="<div class='alert alert-success'>Order received successfully</div>";
                header("Location:orders.php?myprice=$myprice");
              }
            }




            ?>
            

  <!--Main layout-->
  <main class=" pt-4 ">
    <?php include "findinenavbar.php"; ?>
    <div class="container wow fadeIn">

      <!-- Heading -->
      <?php if(isset($_SESSION['custid'])){ 
        ?>
      <h2 class="my-5 h2 text-center">Checkout form</h2>
       <?php 
                if(isset($error)){
                echo $error;
              }
                 ?>
                  <?php 
                if(isset($msg)){
                echo $msg;
              }
                 ?>

      <!--Grid row-->
      <div class="row">
        <div class="col-md-2 mb-4"></div>

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->

            <form class="card-body" action="" method="POST">

              <!--Grid row-->
              <div class="row">
               

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">

                    <?php 
                    
                                    include_once "finapjtconn.php";
                                   $objcustomer = new Customers;
                                    $customers=$objcustomer->getMyCustomer($_SESSION['custid']);

                                       
                                    $counter=1;
                                     foreach ($customers as $key => $value) {
                                        
                                     ?>
                    <input type="text" name='fname' id="firstName" class="form-control" value="<?php 
                                if(isset($value['custom_fname'])){
                                    echo $value['custom_fname'];
                                }
                                ?>">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" name='lname' id="lastName" class="form-control" value="<?php 
                                if(isset($value['custom_lname'])){
                                    echo $value['custom_lname'];
                                }
                                ?>">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" name='email' id="email" class="form-control" placeholder="youremail@example.com" value="<?php 
                                if(isset($value['custom_email'])){
                                    echo $value['custom_email'];
                                }
                                ?>">
                <label for="email" >Email</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" name='add' id="address" class="form-control" placeholder="1234 Main St" value="<?php 
                                if(isset($value['custom_address'])){
                                    echo $value['custom_address'];
                                }
                                ?>">
                <label for="address" >Address</label>
              <?php } ?>
              </div>
              <div class="md-form mb-5">
                <input type='text' name='foodname' disabled value="<?php
                if(isset($_GET['foodname'] )){

                 echo $_GET['foodname'] ;
               }

                 ?>">
                <label for="address" >Food</label>
              </div>
              <div class="md-form mb-5">
                <span>&#8358;</span><input type='text'  id='price' name='price' value="<?php
                if(isset($_GET['foodprice'] )){

                 echo $_GET['foodprice'] ;
               }

                 ?>">
                <label for="address" >Total Price</label>
              </div>
              <div class="md-form mb-5">
                <input type='text' name='qty' style='width:50px' id='qty'>
                <label for="address" >quantity</label>
              </div>

            

              
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">VIEW CART</button>


            </form>
            

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->


      </div>
      <!--Grid row-->
      <?php } else{
              echo "<div class='alert alert-info text-center'>PLEASE SIGNUP/LOGIN AS A CONSUMER TO ORDER</div>";
            }

            ?>

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <?php include "findinefooter.php";?>
          <script type='text/javascript' language='javascript'>
            $(document).ready(function(){
              $("#qty").keyup(function(){
                var price=$("#price").val()
                var qty=$("#qty").val()
                if(isNaN(qty)){
                   $("#price").val(price);
                   alert("enter a number");
                }
                if(qty==0){
                  $("#price").val(price);
                }else{
                var multiply=price * qty;
                $("#price").val(multiply);
                }
              })
            })            
          </script>
</body>
</html>