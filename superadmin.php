<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Findine|Superadmin</title>
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
    #rest{
        display:none;
    }
    #category{
        display:none;
    }
    #foodtable{
        display:none;
    }
    
    </style>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-info" id="sidebar-wrapper">
                <a class="navbar-brand " href="finalproject.php" style='font-size:30px;font-family:algerian;color:black; '>FINDINE</a>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='restaurant'>Restaurants</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='categories'>Food Categories</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='food'>Food List</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-info" href="#!" id='customers'>Customers</a>
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
                                <li>
                                    <div style='margin-top:8px'>Admin</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            
                <!-- Page content-->
                <div class='container'>
                  <div class='row' id='rest'>
                      <div class=col-md-12>
                        <h2>Restaurants</h2>
                <table class='table table=bordered' >
                    <thead class='table-info'>
                        <tr>
                            <th>S/N</th>
                            <th>Restaurant Name</th>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once "finapjtconn.php";
                       $objRest = new Restaurant;
                        $restaurant=$objRest->getRestaurant();

                           
                        $counter=1;
                         foreach ($restaurant as $key => $value) {
                            
                         ?>
                        <tr>

                            <td><?php echo $counter++ ?></td>
                            <td><?php echo $value['rest_name'] ?></td>
                            <td><?php echo $value['rest_username'] ?></td>
                            <td><?php echo $value['rest_email'] ?></td>
                            <td><?php echo $value['rest_location'] ?></td>
                            <td><a href="deleterestaurant.php?restid=<?php echo $value['rest_id'];?>&restname=<?php echo $value['rest_name'];?>" class='btn btn-info btn-xs'>DELETE</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <div class='container'>
        <?php 
         include_once "finapjtconn.php";

         $objcat=new Restaurant;
         $categories=$objcat->listCategories();

         ?>
                  <div class='row' id='category'>
                      <div class=col-md-12>
                <table class='table table=bordered' >
                    <a href='addcat.php' class='btn btn-info mb-5 mt-2'>Add Categories</a>
                    <h2>Food categories</h2>
                    <?php if(isset($_GET['msg'])) { echo $_GET['msg'];} ?>
                    <thead class='table-info'>
                        <tr>
                            <th>S/N</th>
                            <th>Food Categories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter=1;
                         foreach ($categories as $key => $value) {
                            
                         ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $value['category_name']; ?></td>
                            <td>
                                <a href="editfoodcategory.php?catid=<?php echo $value['category_id'];?>&catname=<?php echo $value['category_name'];?>" class='btn btn-info btn-xs' style='color:white'>EDIT</a>
                                <a href="deletefoodcategory.php?catid=<?php echo $value['category_id'];?>&catname=<?php echo $value['category_name'];?>" class='btn btn-info btn-xs mt-1'style='color:white'>DELETE</a>
                            </td>
                        </tr>
                        <?php
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class='container'>
                  <div class='row' id='foodtable'>
                      <div class=col-md-12>
                <table class='table table=bordered' >
                    <a href='addfood.php' class='btn btn-info mb-5 mt-2'>Add Food</a>
                    <h2>Food List</h2>
                    <thead class='table-info'>
                        <tr>
                            <th>S/N</th>
                            <th>Food Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once "finapjtconn.php";

                         $objfood=new Restaurant;
                           $food=$objfood->listFood();

                           $counter=1;
                           foreach ($food as $key => $value) {

                             ?>
                        <tr>
                            <td><?php echo $counter++ ;  ?></td>
                            <td><?php echo $value['food_name'] ;?></td>
                            <td>
                                <a href="editfood.php?foodid=<?php echo $value['food_id'];?>&foodname=<?php echo $value['food_name'];?>" class='btn btn-info btn-xs' style='color:white'>EDIT</a>
                                <a href="deletefood.php?foodid=<?php echo $value['food_id'];?>&foodname=<?php echo $value['food_name'];?>" class='btn btn-info btn-xs mt-1'style='color:white'>DELETE</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid" id='cust-table'>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Customers</h2></div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered ">
                    <thead class='table-info'>
                        <tr >
                            <th>S/N</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once "finapjtconn.php";
                       $objcustomer = new Customers;
                        $customers=$objcustomer->getCustomers();

                           
                        $counter=1;
                         foreach ($customers as $key => $value) {
                            
                         ?>
                        <tr>
                            <td><?php echo $counter++;  ?></td>
                            <td><?php echo $value['custom_fname'] ?></td>
                            <td><?php echo $value['custom_lname'] ?></td>
                            <td><?php echo $value['custom_address'] ?></td>
                            <td><?php echo $value['custom_email'] ?></td>
                            <td><?php echo $value['custom_phone_num'] ?></td>
                            <td><a href="deletecustomer.php?customid=<?php echo $value['custom_id'];?>&customfname=<?php echo $value['custom_fname'];?>&customlname=<?php echo $value['custom_lname'];?>" class='btn btn-info btn-xs'>DELETE</a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                
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
                $('#restaurant').click(function(){
                    $("#category").hide()
                    $("#foodtable").hide()
                    $("#cust-table").hide()
                    $("#rest").slideDown('slow')
                    
                })

                $('#categories').click(function(){
                    $("#foodtable").hide()
                    $("#rest").hide()
                    $("#cust-table").hide()
                    $("#category").slideDown('slow')
                    })

                $('#food').click(function(){
                    $("#cust-table").hide()
                    $("#rest").hide()
                    $("#category").hide()
                    $("#foodtable").slideDown()
                    })

                $('#customers').click(function(){                    
                    $("#category").hide()
                    $("#rest").hide()
                    $("#foodtable").hide()
                    $("#cust-table").slideDown('slow')
                })

            
            })
    </script>
           <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
         </body>
</html>
