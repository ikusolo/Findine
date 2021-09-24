<?php session_start();   ?>

<!doctype html>
<html>
  <head>
    <title>Login Page</title>
    <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <style type="text/css">
      body{
         background-color: rgb(240,240,240);
      }
      .formborder{
        margin-top: 100px;
        background-color:#ffffff;
        padding:20px;
        border-radius:15px ;
      }
      .form{
        padding:20px;
  }
    </style>
      
  
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='col-md-3'></div>
        <div class='col-md-6'>
          <a href='finalproject.php'>Go back Home</a>
          <div class='formborder'>
    <form action='' method='post' >
      <?php 
  include_once "finapjtconn.php";
  if(isset($_POST['submit1'])){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password']))){
      echo "<div style='color:red'>"."Please fill the neccessary input</div>";
    }else{
           $restlogin=new Customers;
           $output=$restlogin->loginCustomer($_POST['email'],$_POST['password']);
           $_SESSION['custpwd']=$_POST['password'];
           

           foreach ($output as $key => $value) {
           if($value=="Invalid email/password"){
            echo "<div style='color:red'>".$value."</div>";
           }else{
           $_SESSION['fname']=$value['custom_fname'];;
           $_SESSION['lname']=$value['custom_lname'];;
           $_SESSION['phone']=$value['custom_phone_num'];;
           $_SESSION['email']=$value['custom_email'];;
           $_SESSION['address']=$value['custom_address'];;
           $_SESSION['custid']=$value['custom_id'];

            header("Location:finalproject.php");

           }
           
           }
         }
      }

    



    ?>

      <div class='form-group'>
      <label>Email Address</label>
      <input type='email' name='email' class='form-control form' id='email' value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>" required>
    </div><p id='emailadd'></p>
    <div class='form-group'>
      <label>Password</label>
      <input type='password' name='password' class='form-control form' id='password' value="<?php if(!empty($_POST['password'])){echo $_POST['password'];} ?>" required>
    </div><p id='pwd'></p>
    
    <input type='submit' name='submit1' value='Login' class='form-control btn btn-primary mt-3' id='sub1'>
    

    </form>
  </div>
  <div class='col-md-3'></div>
</div>
</div>
</div>

  
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>


  </body>
</html>

