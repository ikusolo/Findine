<?php session_start(); ?>
<!doctype html>
<html>
  <head>
    <title>Restaurant Login Page</title>
    <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
    <style type="text/css">
      body{
         background-color: rgb(240,240,240);
      }
      .formborder{
        margin-top: 50px;
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
          <a href='finalproject.php'>Go Back Home</a>
             <div class='formborder' id='custform'>
              <h5>Restaurant Login</h5>
                  <div class='formborder' id='restform'>
                  <form action='' method='post'>
                    <?php

        include_once "finapjtconn.php";
        if(!empty($_POST)){
        $error_msg=array();
        if(empty(trim($_POST['username']))){
          echo "<div style='color:red'>Please enter username</div>";
        }if(trim(empty($_POST['pwd']))){
           echo"<div style='color:red'>Please enter password</div>";
        }else{
          $_SESSION['myname']=$_POST['username'];
           $login=new Restaurant;
           $output=$login->loginRestaurant($_POST['username'],$_POST['pwd']);
           $_SESSION['restpwd']=$_POST['pwd'];
           foreach ($output as $key => $value) {
            if($value=="Invalid username/Password"){
            echo "<div style='color:red'>".$value."</div>";
           }else{
           
           $_SESSION['name']=$value['rest_name'];
           $_SESSION['user']=$value['rest_username'];
           $_SESSION['location']=$value['rest_location'];
           $_SESSION['emailadd']=$value['rest_email'];
           $_SESSION['id']=$value['rest_id'];
           header("Location:finalproject.php");
           
          }
        }
         }
      }

      
    



    ?>
                    <div class='form-group'>
                      
                    <label>Username</label>
                    <input type='text' name='username' class='form-control form' id='username' value="<?php if(!empty($_POST['username'])){echo $_POST['username'];} ?>" required>
                  </div><p id='usern'></p>
                  <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='pwd' class='form-control form' id='password' value="<?php if(!empty($_POST['pwd'])){echo $_POST['pwd'];} ?>" required>
                  </div><p id='pwd'></p>
                  
                  <input type='submit' name='submit' value='Login' class='form-control btn btn-primary mt-3' id='submit'>
                  </form>
                </div>
              </div>
            </div>
                <div class='col-md-3'></div>
            </div>
          </div>
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/jquery.min.js'></script>

       <script type='text/javascript' language='javascript'>
            $(document).ready(function(){
                 $("#submit").click(function(){
                   var username=$("#username").val()
                   var password=$("#password").val()

                   if($username.trim()==''){
                    $('#usern').text("<div style='border:1px solid red'>Please enter Username</div>")
                   }
                   if(password.trim()==''){
                    $('#pwd').text("<div style='border:1px solid red'>Please enter password</div>")
                   }
                   username=$("#username").val()
                   password=$("#password").val()
                 })
               })
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>


  </body>
</html>

