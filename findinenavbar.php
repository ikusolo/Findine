                     

                            <!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light" id="mynav">

  <a class="navbar-brand" href="finalproject.php" style='font-size:30px;font-family:algerian,serif; '>FINDINE</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
    aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Breadcrumbs -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="waves-effect" href='finalproject.php' style='color:blue'>Home</a></li>
    <li class="breadcrumb-item"><a class="waves-effect" href='finalproject2.php' target='_blank' style='color:blue'>Partner With Us</a></li>
    <li class="breadcrumb-item active"><a class="waves-effect" href='finalproject3.php' target='_blank' style='color:blue'>All restaurant</a></li>
  </ol>
  <!-- Breadcrumbs -->

  <!-- Links -->
  <div class="collapse navbar-collapse" id="basicExampleNav1">

    <!-- Right -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="finalproject3.php" class="nav-link navbar-link-2 waves-effect">
          <i class="fas fa-shopping-cart pl-0"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink3" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
           <?php 
                                    if(isset($_SESSION['custid'])){
                                    include_once "finapjtconn.php";
                                   $objcustomer = new Customers;
                                    $customers=$objcustomer->getMyCustomer($_SESSION['custid']);

                                       
                                    $counter=1;
                                     foreach ($customers as $key => $value) {
                                        if(isset($value['custom_fname'])){
                                         echo $value['custom_fname'];
                                          }
                                      }
                                  }
                                           ?>
                                           <?php 
                                           if(isset($_SESSION['id'])){
                                    include_once "finapjtconn.php";
                                   $objrest = new Restaurant;
                                    $rest=$objrest->getMyRest($_SESSION['id']);
                                     foreach ($rest as $key => $value) {
                                        if(isset($value['rest_name'])){ 
                                            echo $value['rest_name'];
                                             }
                                         }
                                       }
                                        
                                     ?>
                                        
                                        
                                     
                           
                           
          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="admin.php" style="display:none">Dashboard</a>
          <?php 
            if(isset($_SESSION['id'])){
              ?>
              <a class="dropdown-item" href="admin.php">Dashboard</a>
              <a class="dropdown-item"  href="restlogout.php">Logout</a>
              <?php
            }
           ?>
           <?php 
            if(isset($_SESSION['custid'])){
              ?>
              <a class="dropdown-item" href="customeracc.php">Dashboard</a>
              <a class="dropdown-item"  href="customlogout.php">Logout</a>
              <?php
            }
           ?>
          
          
        </div>
      </li>
      <li class="nav-item">
        <a href='#con' style='color:blue' class="nav-link waves-effect">
          Contact
        </a>
      </li>
      <li class="nav-item">
       <a href='restlogin.php' style='color:blue' target='_self' class="nav-link waves-effect">Restaurant Login</a>
      </li>
      ||<li class="nav-item">
      <a href='loginpage.php' style='color:blue' target='_self' class="nav-link waves-effect">
                  Consumer Login</a>
            
           
        
      </li>
      <li class="nav-item pl-2 mb-2 mb-md-0">
        <a href='signup.php'  target='_self' type="button"
          class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign up</a>
      </li>
    </ul>

  </div>
  <!-- Links -->

</nav>
<!-- Navbar -->