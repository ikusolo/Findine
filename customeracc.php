<?php session_start();
if(!isset($_SESSION['custid'])){
    header("Location:finalproject.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Findine|customer dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script type='text/javascript' src='js/jquery.min.js'></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <style type='text/css'>
    a{
        text-decoration: none;
    }
    #nav{
        color:#ffffff;
    }
    #pwd{
        display:none;
    }
    #recent{
        display:none;
    }

    #vendor{
        display:none;
    }
    
    #timeline{
        display:none;
    }
    .search-box {
        position: relative;        
        float: right;
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
    .bg-info{
       color:#ffffff;
    }
    
    </style>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-info" id="sidebar-wrapper">
                <a class="navbar-brand" href="finalproject.php" style='font-size:30px;font-family:algerian;color:black; '>FINDINE</a>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='timel'>Timeline</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!"  id='recentorder'>Recent Orders</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='rvendor'>Recent Vendor</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='accset'>Account Setting</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='chpwd'>Change Password</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="customlogout.php">Log Out</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-info border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-info" id="sidebarToggle"><i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-5 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="finalproject.php" id='nav'>Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                    include_once "finapjtconn.php";
                                   $objcustomer = new Customers;
                                    $customers=$objcustomer->getMyCustomer($_SESSION['custid']);

                                       
                                
                                     foreach ($customers as $key => $value) {
                                        if(isset($value['custom_fname'])){ 
                                            echo $value['custom_fname'];
                                             }
                                    }
                                     ?>
                                  </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">My account</a>
                                        <a class="dropdown-item" href="#!">Activity</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="customlogout.php">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <div class='row' id='acc'>
                        <div class='col-md-12'>
                            <h2 >Account Setting</h2>
                            <p>This is your private area. Please keep your information up to date.</p>
                            <h3>Personal Information</h3>
                                             <?php                          
                                if(isset($_POST['submit'])){
                                  
                                  $error_msg=array();
                                  if(empty(trim($_POST['firstname']))){
                                    $error_msg[]="Please enter Firstname";
                                  }if(empty(trim($_POST['lastname']))){
                                     $error_msg[]="Please enter Lastname";
                                  }if(empty(trim($_POST['email']))){
                                    $error_msg[]="Please enter Email Address";
                                  }if(empty(trim($_POST['address']))){
                                    $error_msg[]="please enter address";
                                  }if(empty($error_msg)){
                                    include_once "finapjtconn.php";
                                    $mycustomers=new Customers;
                                      $output=$mycustomers->updateCustomer($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['tel'],$_POST['address'],$_SESSION['custid']);
                                      //header("Location:admin.php");
                                      echo $output;
                                      }
                              }
                               ?>
                            <form action='' method='POST'>
                                <?php
                              if(!empty($error_msg)){
                              foreach ($error_msg as $key=>$value){
                                 echo "<div class='alert alert-danger'>$value</div>";
                               }
                              }
                              
                                      ?>
                                      <?php 
                                    include_once "finapjtconn.php";
                                   $objcustomer = new Customers;
                                    $customers=$objcustomer->getMyCustomer($_SESSION['custid']);
                                     foreach ($customers as $key => $value) {
                                        
                                     ?>
                                <label for="fname">Firstname</label>
                                <input type='text' required name='firstname' class='form-control' id='fname' value="<?php 
                                if(isset($value['custom_fname'])){
                                    echo $value['custom_fname'];
                                }
                                ?>">
                                <label for="lname">Lastname</label>
                                <input type='text' required name='lastname' class='form-control' id='lname' value="<?php 
                                if(isset($value['custom_lname'])){
                                    echo $value['custom_lname'];
                                }
                                ?>">
                                <label for="emailaddress">Email Address</label>
                                <input type='email' required name='email' class='form-control' id='emailaddress' value="<?php 
                                if(isset($value['custom_email'])){
                                    echo $value['custom_email'];
                                }
                                ?>">
                                 <label for="address">Home Address</label>
                                <input type='text' required name='address' class='form-control' id='address' value="<?php 
                                if(isset($value['custom_address'])){
                                    echo $value['custom_address'];
                                }
                                ?>">
                                <label for="telephone">Phone Number</label>
                                <input type='tel' required name='tel' class='form-control' id='telephone' value="<?php 
                                if(isset($value['custom_phone_num'])){
                                    echo $value['custom_phone_num'];
                                }
                                ?>">
                                <input type='submit' required name='submit' class='form-control btn-info mt-5' value='SAVE CHANGES'>
                                <?php }?>

                        
                            </form>
                        </div>
                    </div>
                    <!--change password-->
                    <div class='row' id='pwd'>
                        <div class='col-md-12'>
                            <h2>Change Password</h2>
                             <?php 
                            if(isset($_POST['mysubmit'])){
                                      $myerror_msg=array();
                                      if(empty(trim($_POST['currentpassword']))){
                                        $myerror_msg[]="Please enter your current password";
                                      }if(empty(trim($_POST['newpassword']))){
                                         $myerror_msg[]="Please enter newpassword";
                                      }if(empty(trim($_POST['confirmpassword']))){
                                         $myerror_msg[]="Please confirm your newpassword";
                                      }if($_POST['newpassword'] != $_POST['confirmpassword']){
                                         $myerror_msg[]="The newpassword doesn't match please try again!";
                                      }if($_POST['currentpassword']!=$_SESSION['custpwd']){
                                         $myerror_msg[]="Your current password is incorrect please check again!";
                                      }if(empty($myerror_msg)){
                                         $mypwd=new Customers;
                                          $pass=$mypwd->updatecustpwd($_POST['newpassword'],$_SESSION['custid']);
                                             echo $pass;
                                      }
                                  }

                               
                                 ?>
                            <form action='' method='POST'>
                                 <?php
                              if(!empty($myerror_msg)){
                              foreach ($myerror_msg as $key=>$value){
                                 echo  "<div class='alert alert-danger' role='alert'>$value<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                               }
                              }
                              ?> 
                                <label for='password'>Current Password</label>
                                <input type='password' name='currentpassword' class='form-control' id='password' required>
                                <label for='password1'>New Password</label>
                                <input type='password' name='newpassword' class='form-control' id='password1' required>
                                <label for='password2'>Confirm Password</label>
                                <input type='password' name='confirmpassword' class='form-control' id='password2' required>
                                <input type='submit' name='mysubmit' class='form-control btn-info mt-5' value='SAVE CHANGES'>
                        
                            </form>
                        </div>
                    </div>
                    <!--recent order-->
                    <div class='row' id='recent'>
                        <div class='col-md-12'>
                            <!-- <h2>Recent Orders</h2>
                            <p>Your recent purchases</p>
                            <h3>You haven't ordered anything yet</h3>
                            <p>You will be able to see your previous orders in this page</p> -->

                            <?php
                            include_once "finapjtconn.php";
                            $obj= new Restaurant;
                            $output=$obj->recentorder($_SESSION['custid']);

                            ?>
                            <?php
                            foreach ($output as $key => $value) {
                            
                            ?>
                            <div style="font-size: 25px;color:blue">You ordered <?php echo $value['total_qty']; ?> <?php echo $value['food_name']; ?> from <?php echo $value['rest_name']; ?> on <?php echo $value['order_date']; ?> </div>
                            <?php
                        }
                            ?>
                            
                        </div>
                    </div>
                    <!--timeline-->
                    <div class='row' id='timeline'>
                        <div class='col-md-12'>
                             <?php
                            include_once "finapjtconn.php";
                            $obj1= new Restaurant;
                            $output=$obj1->recentorder($_SESSION['custid']);

                            ?>
                            <?php
                            foreach ($output as $key => $value) {
                            
                            ?>
                            <div style="font-size: 30px"> You Just Visited <?php echo $value['rest_name']; ?> on <?php echo $value['order_date']; ?>  </div>
                            <?php
                        }
                            ?>
                            
                        </div>
                    </div>
                    <!--recent vendor-->
                    <div class='row' id='vendor'>
                    <div class='col-md-12'>


                    
                           <?php
                            include_once "finapjtconn.php";
                            $obj1= new Restaurant;
                            $output=$obj1->recentorder($_SESSION['custid']);

                            ?>
                            <?php
                            foreach ($output as $key => $value) {
                            
                            ?>
                            <div style="font-size: 30px"> <?php echo $value['rest_name']; ?> </div>
                            <?php
                        }
                            ?>
                            
                        </div>
                         </div>
 

                </div>

            </div>
        
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <div class='container-fluid'>
        <?php include "findinefooter.php" ?>
        </div>
           
       <script type='text/javascript' language='javascript'>
            $(document).ready(function(){
                $('#accset').click(function(){
                   $("#pwd").hide('slow')
                   $("#recent").hide('slow')
                   $("#timeline").hide('slow')
                   $("#vendor").hide('slow')
                    $("#acc").slideDown('slow')
                })

                $('#chpwd').click(function(){
                    $("#acc").hide('slow')
                    $("#recent").hide('slow')
                    $("#timeline").hide('slow')
                    $("#vendor").hide('slow')
                    $("#pwd").slideDown('slow')
                })

                $('#recentorder').click(function(){
                    $("#acc").hide('slow')
                    $("#pwd").hide('slow')
                    $("#timeline").hide('slow')
                    $("#vendor").hide('slow')
                    $("#recent").slideDown('slow')
                })

                $('#rvendor').click(function(){
                    $("#acc").hide('slow')
                    $("#pwd").hide('slow')
                    $("#recent").hide('slow')
                    $("#timeline").hide('slow')
                    $("#vendor").slideDown('slow')
                })

                $('#timel').click(function(){
                    $("#acc").hide('slow')
                    $("#pwd").hide('slow')
                    $("#recent").hide('slow')
                    $("#vendor").hide('slow')
                    $("#timeline").slideDown('slow')
                })
              })
    </script>
           <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>

           
         </body>
</html>
