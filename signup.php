<?php session_start();
  include_once "finapjtconn.php";
  ?>
<!doctype html>
<html>
  <head>
    <title>Login Page</title>
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
              h5{
                text-align:center;
              }
            </style>
              
          
          </head>
          <body>

            <?php                          
                if($_SERVER["REQUEST_METHOD"]=='POST'){
                  
                  $error_msg=array();
                  if(empty(trim($_POST['firstname']))){
                    $error_msg[]="Please enter Firstname";
                  }if(empty(trim($_POST['lastname']))){
                     $error_msg[]="Please enter Lastname";
                  }if(empty(trim($_POST['email']))){
                    $error_msg[]="Please enter Email Address";
                  }if(empty(trim($_POST['address']))){
                    $error_msg[]="please enter address";
                  }if(empty(trim($_POST['password']))){
                    $error_msg[]="please enter password";
                  }if(empty(trim($_POST['confirmpwd']))){
                    $error_msg[]="please confirm password";
                  }if($_POST['password']!= $_POST['confirmpwd']){
                    $error_msg[]="Password is not matching";
                  }if(empty(trim($_POST['agreement']))){
                    $error_msg[]="please agree to terms & condition";

                }if(empty($error_msg)){
                    $mycustomers=new Customers;
                      $output=$mycustomers->signUp($_POST['firstname'],$_POST['lastname'],$_POST['password'],$_POST['address'],$_POST['email'],$_POST['tel']);
                      header("Location:loginpage.php");
                      }
              }
               ?>
            
                  <div class='container'>
                    <div class='row'>
                      <div class='col-md-3'></div>
                      <div class='col-md-6'>
                        <a href='finalproject.php'>Go Back Home</a>
                           <div class='formborder' id='custform'>
                            <h5>SignUp</h5>
                             <?php
                              if(!empty($error_msg)){
                              foreach ($error_msg as $key=>$value){
                                 echo "<div class='alert alert-danger'>$value</div>";
                               }
                              }
                              
                                      ?>
                          <form action='' method='POST' style='width:450px;padding:20px;'>
                            <div class="form-group" >
                             <label for='firstname'>First name</label>
                             <input type="text" name='firstname' class="form-control" id='firstname' required>
                             </div><p id='fname'></p>

                             <div class="form-group" >
                             <label for='lastname'>Last name</label>
                             <input type="text" name='lastname' class="form-control" id='lastname' required>
                             </div><p id='lname'></p>
                             <div class="form-group" >
                             <label for='email'>Email Address</label>
                             <input type="email" name='email' class="form-control" id='email' required>
                             </div><p id='myemail'></p>
                             <div class="form-group" >
                             <label>Phone Number</label>
                             <input type="tel" name='tel' class="form-control" id='tel' required>
                             </div><p id='mynum'></p>
                             <div class="form-group" >
                             <label for='address'>Address</label>
                             <input type="text" name='address' class="form-control" id='address' required>
                             </div><p id='myaddress'></p>
                             <div class="form-group">
                             <div class="clearfix">
                             <label>Password</label>
                                </div>
                                <input type="password" name='password' class="form-control" id='pwd' required>
                              </div><p id='mypwd'></p>
                              <div class="form-group">
                             <div class="clearfix">
                             <label>Confirm Password</label>
                                </div><p id='mypasswd'></p>
                                <input type="password" name='confirmpwd' class="form-control" id='pwd2' required>
                              </div><p></p>
                              <div><label style='color:black' class='mt-5'><input type='checkbox' name='agreement' id='terms' required>I agree to <a href='#'>Terms & Condition</a></label></div><p id='agree'></p>
                            <input type="submit" name='submit' class="btn btn-primary btn-block" value="SignUp" id='submit'>
                             </form>
              </div>
            </div>
                <div class='col-md-3'></div>
            </div>
          </div>
          <script type='text/javascript' src='js/jquery.min.js'></script>
          <script type='text/javascript' language='javascript'>
            $(document).ready(function(){
                 $("#submit").click(function(){
                  var firstname=$("#firstname").val()
                  var lastname=$("#lastname").val()
                  var email=$("#email").val()
                  var num=$("#tel").val()
                  var address=$("#address").val()
                  var password=$("#pwd").val()
                  var password2=$("#pwd2").val()
                  var terms=$("#terms").prop('checked')

                   if(firstname.trim() ==''){
                    $('#fname').text("<div style='border:1px solid red'>Please enter Firstname</div>")
                   }
                   if(lastname.trim ()==''){
                    $('#lname').text("<div style='border:1px solid red'>Please enter Lastname</div>")
                   }
                   if(email.trim() ==''){
                    $('#email').text("<div style='border:1px solid red'>Please enter email</div>")
                   }
                   if(num.trim() ==''){
                    $('#mynum').text("<div style='border:1px solid red'>Please enter Phone Number</div>")
                   }
                   if(address.trim ()==''){
                    $('#myaddress').text("<div style='border:1px solid red'>Please enter Addresse</div>")
                   }
                   if(password.trim()==''){
                    $('#mypwd').text("<div style='border:1px solid red'>Please enter password</div>")
                   }
                   if(password2.trim() ==''){
                    $('#mypasswd').text("<div style='border:1px solid red'>Please confirm password</div>")
                   }
                   if(!terms){
                    $('#agree').text("<div style='border:1px solid red'>Please agree to terms and condition</div>")
                   }
                    firstname=$("#firstname").val()
                    lastname=$("#lastname").val()
                    email=$("#email").val()
                    num=$("#tel").val()
                    address=$("#address").val()
                    password=$("#pwd").val()
                    password2=$("#pwd2").val()



                 })
            })
          </script>

          
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>


  </body>
</html>

