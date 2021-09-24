<?php session_start();?>
<?php 
if(!isset($_SESSION['id'])){
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
        <title>Findine|Admin Dashboard</title>
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
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px;        
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
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
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
    table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }
    #business{
        display:none;
    }
    #activity{
        display:none;
    }
    .active{
        text-align:center; 
    }
    .food{
        display:none;
    }
    #pwd{
        display:none;
    }
    .bg-info{
       color:#ffffff;
    }
    .dash{
        width:270px;
        height:270px;
        text-align:center;
        color:#ffffff;
        font-size: 25px
    }
    .dash:hover{
        transform: scale(1.1);
    }
    #mylogo{
       display:none; 
    }
    
    </style>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-info" id="sidebar-wrapper">
                <a class="navbar-brand " href="finalproject.php" style='font-size:30px;font-family:algerian;color:black; '>FINDINE</a>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='dash'>Restaurant Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='ord'>Customer Orders</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#" id='food'>Food Menu</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='busi'>Account Settings</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='chpwd'>Change Password</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='logo'>Change Logo</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="restlogout.php">Log Out</a>
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
                                   $objrest = new Restaurant;
                                    $rest=$objrest->getMyRest($_SESSION['id']);
                                     foreach ($rest as $key => $value) {
                                        if(isset($value['rest_name'])){ 
                                            echo $value['rest_name'];
                                             }
                                         }
                                        
                                     ?>
                                        
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">My account</a>
                                        <a class="dropdown-item" href="#!">Activity</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="restlogout.php">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            
                <!-- Page content-->
              <?php include "admintable.php" ?>

              <!-- form acc set -->
              <div class='container'>
                  <div class='row' id='business'>
                      <div class=col-md-12> 
                        <h2 >Account Setting</h2>
                            <p>This is your business area. Please keep your information up to date.</p>
                            <h3>Business Information</h3>
                            <?php 
                                    if(isset($_POST['submit'])){
                                      $error_msg=array();
                                      if(empty(trim($_POST['Restaurantname']))){
                                        $error_msg[]="Please enter Firstname";
                                      }if(empty(trim($_POST['Username']))){
                                         $error_msg[]="Please enter Lastname";
                                      }if(empty(trim($_POST['email']))){
                                        $error_msg[]="Please enter Email Address";
                                      }if(empty(trim($_POST['Location']))){
                                      $error_msg[]="please enter address";
                                      }if(empty($error_msg)){
                                        $myrestaurant=new Restaurant;         
                                       $output= $myrestaurant->updateRest($_POST['Restaurantname'],$_POST['Username'],$_POST['email'],$_POST['Location'],$_SESSION['id']);
                                      
                                       
                                        }
                                        echo $output;

                                    }
                                  ?>
                               <form action="" method="POST" enctype='multipart/form-data'>
                                 <?php
                              if(!empty($error_msg)){
                              foreach ($error_msg as $key=>$value){
                                 echo "<div class='alert alert-danger'>$value</div>";
                               }
                              }
                              
                                      ?>
                                       <?php 
                                   $objrest = new Restaurant;
                                    $rest=$objrest->getMyRest($_SESSION['id']);
                                     foreach ($rest as $key => $value) {
                                        
                                     ?>
                               <label class="mt-2" for='business'>Business Name</label>
                               <div><input type='text' required name='Restaurantname' placeholder='Enter Business Name'class='form-control' id='businessname' value="<?php 
                                if(isset($value['rest_name'])){
                                    echo $value['rest_name'];
                                }
                                ?>" required ></div>
                               <label class="mt-2" for='username'>Owner Username:</label>
                                <div><input type='text' required name='Username' placeholder='Enter UserName' class=' form-control' id='username' value="<?php 
                                if(isset($value['rest_username'])){
                                    echo $value['rest_username'];
                                }
                                ?>" required></div>
                                <label class="mt-2" for='emailaddress'>Email Address</label>
                                <div><input type='email' required name='email' placeholder='Enter Email Address' class=' form-control' id='emailaddress' value="<?php 
                                if(isset($value['rest_email'])){
                                    echo $value['rest_email'];
                                }
                                ?>"  required></div>
                                <label class="mt-2" for='location'>Location:</label>
                                <div><input type='text' required name='Location' placeholder='Enter Location' class='form-control' id='location' value="<?php 
                                if(isset($value['rest_location'])){
                                    echo $value['rest_location'];
                                }
                                ?>" required></div>

                                <input type='submit' name='submit' class='form-control btn-info mt-5' value='SAVE CHANGES'>
                            <?php } ?>
                              </form>
                       </div>      
                  </div>
              </div>
                    <!--customer details-->

          
   
     <!--products-->
     <a href='addmenu.php' class='btn-info btn-lg food'>Add To Menu</a>
     <div class="container-fluid food">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Foodmenu</h2></div>
                        <div class="col-sm-4">
                            <div class="search-box table">
                                <form method="POST" action="">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;" id='search'>
                            </form>
                            </div>
                            <div id="searchresult"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered ">
                    <thead class='table-info'>
                        <tr >
                            <th>S/N</th>
                            <th>Foodname</th>
                            <th>Food Price</th>
                            <th>Food Picture</th>
                            <th>Food category</th>
                            <th>Food description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once "finapjtconn.php";

                        $objrestmenu=new Restaurant;

                        $menu=$objrestmenu->listMenu($_SESSION['id']);
                         
                        ?>
                        <?php 
                        $counter=1;
                        foreach($menu as $key => $menus){
                            
                            ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td id="<?php echo $menus['food_id'] ; ?>"><?php echo $menus['food_name'] ; ?></td>
                            <td>&#8358;<?php echo $menus['food_price'];  ?></td>
                            <td><img style='width:100px;height:90px' src="foodpic/<?php echo $menus['food_pic'];?>" alt='foodimage'></td>
                            <td><?php echo $menus['category_name'];  ?></td>
                            <td><?php echo $menus['food_description'];  ?></td>
                            <td>
                                <a href="deleterestmenu.php?restid=<?php echo $menus['restaurant_food_id'];?>&restname=<?php echo $menus['food_name']  ;?>" class='btn btn-info btn-xs mt-1'style='color:white'>DELETE</a></td>
                        </tr>
                    <?php
                     }
                    ?>
                    
                    </tbody>
                </table>
                
            </div>
        </div> 
    </div>
    <!--change logo-->
    <div class="container-fluid" id="mylogo">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php
        include_once "finapjtconn.php";
        $obj=new Restaurant;

        $output=$obj->updatelogo($_SESSION['id']);
        echo $output;

        ?>
    <form action="" method="POST" enctype='multipart/form-data'>
     <?php 
     include_once "finapjtconn.php";
       $objrest = new Restaurant;
        $rest=$objrest->getMyRest($_SESSION['id']);
         foreach ($rest as $key => $value) {
            
         ?>
     <div ><img style="height: 200px;width: 200px" src="logo/<?php echo $value['rest_logo'] ?>" class="img fluid"></div><?php } ?>

     <label class="mt-2"> Change Logo:</label>
      <input type="file" name="mylogo" class='form-control' id='thelogo'>
      <input type='submit' name='submit1' class='form-control btn-info mt-5' value='SAVE CHANGES'>
  </form>
</div>
<div class="col-md-3"></div>
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
                                      }if($_POST['currentpassword']!=$_SESSION['restpwd']){
                                         $myerror_msg[]="Your current password is incorrect please check again!";
                                      }if(empty($myerror_msg)){
                                         $mypwd=new Restaurant;
                                          $pass=$mypwd->updaterestpwd($_POST['newpassword'],$_SESSION['id']);
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
                                <input type='password' required name='currentpassword' class='form-control' id='password'>
                                <label for='password1'>New Password</label>
                                <input type='password' required name='newpassword' class='form-control' id='password1'>
                                <label for='password2'>Confirm Password</label>
                                <input type='password' required name='confirmpassword' class='form-control' id='password2'>
                                <input type='submit' name='mysubmit' class='form-control btn-info mt-5' value='SAVE CHANGES'>
                        
                            </form>
                        </div>
                    </div>
        
                   <!--dashboard-->
                   <div class='row' id='dashboard'>
                     
                    <div class='col-md-3' >

                        <div class='bg-success dash'>
                        <p>Total Revenue</p>
                         <?php 
                        include_once "finapjtconn.php";

                        $objrest=new Restaurant;

                        $adminamt=$objrest->adminamt($_SESSION['id']);
                        foreach ($adminamt as $key => $value) {  
                        ?>
                        <p>&#8358;<?php echo $value?><?php  if(empty($value)){
                        echo 0;
                    } ?></p>
                        
                    <?php
                     } ?>
                    </div>
                     
                    </div>
                    <div class='col-md-3'>
                        <div class='bg-primary dash'>
                            <p>Total Customers</p>
                            <?php 
                        include_once "finapjtconn.php";

                        $objrest=new Restaurant;

                        $admincust=$objrest->admincust($_SESSION['id']);
                         echo "<p>$admincust</p>";
                         ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class='bg-warning dash'>
                            <p>Total Orders</p>
                            <?php 
                        include_once "finapjtconn.php";

                        $objrest=new Restaurant;

                        $adminorders=$objrest->adminorders($_SESSION['id']);
                         echo "<p>$adminorders</p>";
                         ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class='bg-danger dash'>
                            <p>Menu</p> 
                            <?php 
                        include_once "finapjtconn.php";

                        $objrest=new Restaurant;

                        $adminfood=$objrest->adminfood($_SESSION['id']);
                         echo "<p>$adminfood</p>";
                         
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

                $('#search').keypress(function(){
          var searchvalue=$(this).val();
          var searchname=$(this).val();
          //alert(searchvalue);

          //use jquery ajax method to send the value to server script search.php
                 $.ajax({
                  type:"POST",
                  url:"searchrestfood.php",
                  data:"searchfood="+ searchvalue,
                  success:function(response){
                    $('#searchresult').html(response);
                  },
                  error:function(error){
                    console.log(error);
                  }

                 })
        })

          $('#custsearch').keypress(function(){
          var searchvalue=$(this).val();
          //alert(searchvalue);

          //use jquery ajax method to send the value to server script search.php
                 $.ajax({
                  type:"POST",
                  url:"searchcust.php",
                  data:"searchcust="+ searchvalue,
                  success:function(response){
                    $('#custresult').html(response);
                  },
                  error:function(error){
                    console.log(error);
                  }

                 })
        })






                $('#ord').click(function(){
                    $("#business").hide('slow')
                    $(".food").hide('slow')
                    $("#pwd").hide('slow')
                    $("#dashboard").hide('slow')
                    $("#mylogo").hide('slow')
                    $(".cust_table").slideDown('slow')
                })

                $('#busi').click(function(){
                    $(".cust_table").hide('slow')
                    $(".food").hide('slow')
                    $("#pwd").hide('slow')
                    $("#dashboard").hide('slow')
                    $("#mylogo").hide('slow')
                    $("#business").slideDown('slow')
                })

                $('#food').click(function(){                    
                    $("#business").hide('slow')                   
                    $(".cust_table").hide('slow')
                    $("#pwd").hide('slow')
                    $("#dashboard").hide('slow')
                    $("#mylogo").hide('slow')
                    $(".food").slideDown('slow')
                })
                $('#chpwd').click(function(){                    
                    $("#business").hide('slow')
                    $(".cust_table").hide('slow')
                    $(".food").hide('slow')
                    $("#dashboard").hide('slow')
                    $("#mylogo").hide('slow')
                    $("#pwd").slideDown('slow')
                })
                $('#dash').click(function(){                    
                    $("#business").hide('slow')
                    $(".cust_table").hide('slow')
                    $(".food").hide('slow')
                    $("#pwd").hide('slow')
                    $("#mylogo").hide('slow')
                    $("#dashboard").slideDown('slow')
                })
                $('#logo').click(function(){                    
                    $("#business").hide('slow')
                    $(".cust_table").hide('slow')
                    $(".food").hide('slow')
                    $("#pwd").hide('slow')
                    $("#dashboard").hide('slow')
                    $("#mylogo").slideDown('slow')
                })
            })
    </script>
           <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
         </body>
</html>
