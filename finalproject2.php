<?php session_start();
  include_once "finapjtconn.php";
 include_once "dbconstant.php"; 
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
            <title>Finedine|Partner with us</title>
            <style type='text/css''>
              #wrapper{
                background-image:url('picture/rrr.jpg');
                background-size:contain;
                background-attachment: fixed; 
              }
              .overlay{
                background-color:rgba(0,0,0,0.7);
               height:inherit;
              }
            
            label{
              color:#000000;
            }
            #signupform{
              border:1px solid #ffffff;
              background-color:#ffffff;
              border-radius:10px;
              padding:30px;
              margin-left:20px;
            }
            #partner{
              font-family:lucida console,serif;
            }
            #findine{
              font-size:45px;
              font-family:algerian,serif;
              color:#ffffff;
            }
            #signupcomment{
              font-size:65px ;
              color:#ffffff;
              display:inline-block;
            }
            #signupcomment2{
              font-size:50px;
              color:#ffffff;
            }
            #formhead{
              color:#0000ff;
              text-align:center;
            }
                        
                        </style>



          </head>
          <body>
             
                <?php 
                if(isset($_POST['submit'])){
                  
                  $error_msg=array();
                  if(empty(trim($_POST['restaurantname']))){
                    $error_msg[]="Please enter Firstname";
                  }if(empty(trim($_POST['myusername']))){
                     $error_msg[]="Please enter Lastname";
                  }if(empty(trim($_POST['emailaddress']))){
                    $error_msg[]="Please enter Email Address";
                  }if(empty(trim($_POST['location']))){
                    $error_msg[]="please enter address";
                  }if(empty(trim($_POST['password']))){
                    $error_msg[]="please enter password";
                  }if(empty(trim($_POST['agreement']))){
                    $error_msg[]="please agree to terms & condition";
                   }if(empty(trim($_POST['confirmpassword']))){
                    $error_msg[]="please confirm password";
                  }if($_POST['password']!= $_POST['confirmpassword']){
                    $error_msg[]="Password is not matching";
                  }if(empty($error_msg)){ 
                    $myrestaurant=new Restaurant;         
                   $output= $myrestaurant->restSignUp($_POST['restaurantname'],$_POST['location'],$_POST['myusername'],$_POST['password'],$_POST['emailaddress']);
                
                  $_SESSION['id']=$output;

                   //echo $_SESSION['id'];
                 

                    header("Location:restlogin.php?");
                    exit;
                    }

                }
              ?>
          <div class='container-fluid'>
            <!--navbar-->
              <?php include "findinenavbar.php";?>

            <div class='row' id='wrapper'> 
              
              <div class='col-md-6 '>
                <div class="overlay">
                          <p id='findine' class='mt-5 ml-5'>FINDINE</p>
                        
                           <p id='signupcomment' class='mt-5 ml-5'>Reach new<br> customers, get<br> more sales</p>
                           <p id='signupcomment2' class='mt-5 ml-5'>Join FINDINE, Lagos<br> largest Ordering platform.</p>
                         </div>
                         </div>
                         <div class='col-md-6'>
                          <div class="overlay">
                           <div class='mt-5 mb-5' id='signupform'>
                            <?php
                              if(isset($error_msg)){
                              foreach ($error_msg as $key=>$value){
                                 echo "<div class='alert alert-danger'>$value</div>";
                                }
                                 }
                                    ?>
                                    
                                    

                               <form action="" method="POST" enctype='multipart/form-data'>
                                <h2 id='formhead'>JOIN US TODAY!</h2>

                                <label class="mt-2" for='business'>Business Name</label>
                               <div> <input type='text' name='restaurantname' placeholder='Enter Business Name' class='form-control' id='business' required></div>

                               <label class="mt-2" for='username'>Owner Username:</label>
                                <div><input type='text' name='myusername' placeholder='Enter UserName' class=' form-control' id='username' required></div>

                                <label class="mt-2" for='password'>Password:</label>
                                <div><input type='Password' name='password' placeholder='Enter Password' class=' form-control' id='password' required></div>

                                <label class="mt-2" for='password'>Confirm Password:</label>
                                <div><input type='Password' name='confirmpassword' placeholder='Enter Password' class=' form-control' id='password2' required></div>

                                <label class="mt-2" for='emailaddress'>Email Address</label>
                                <div><input type='email' name='emailaddress' placeholder='Enter Email Address' class=' form-control' id='emailaddress' required></div>

                                <label class="mt-2" for='location'>Location:</label>
                                <div><input type='text' name='location' placeholder='Enter Location' class='form-control' id='location' required></div>
                               
                                


                                <label class="mt-2">Company Logo:</label>
                                <div><input type="file" name="companylogo" class='form-control' id='logo'></div>
                                

                                <div><label style='color:#000000' class='mt-5'><input type='checkbox' name='agreement'  id='terms' required>I agree to <a href='#'>Terms & Condition</a></label></div>

                                <input type='reset' name='reset' value='Clear' class='mt-5'>
                                <input type='submit' name='submit' value='Register'>

                                
                              </form>
                             </div>zz
                           </div>
                         </div>
                       
                     </div>
                             
              
                        
                          
                             
                               
            <div class='row'>
              <div class='col-md-7 offset-3 mt-5'>
                <h1 id='partner'>BENEFITS OF BEING OUR PARTNER</h1>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-3 offset-2'>
                <img src='picture/sale.jpg' style='width:150px'>
                <h4>Additional Revenue Stream</h4>
                <p>Get More Order</p>
              </div>
              <div class='col-md-3 offset-2'>
                <img src='picture/people.jpg' style='width:150px'>
                <h4>New Customers</h4>
                <p>More Visibilities Through The Platform</p>
              </div>
            </div>
          <?php include "findinefooter.php" ?>
       </div>

           <script type='text/javascript' src='js/jquery.min.js'></script>
          <script type='text/javascript' language='javascript'> 
            // $(document).ready(function(){
            //      $("#submit").click(function(){
            //       var business=$("#business").val()
            //       var username=$("#username").val()
            //       var email=$("#emailaddress").val()
            //       var Location=$("#location").val()
            //       var password=$("#password").val()
            //       var password2=$("#password2").val()
            //       var terms=$("#terms").prop('checked')

            //        if(business.trim() ==''){
            //         $('#bname').text("<div style='border:1px solid red'>Please Business name</div>")
            //        }
            //        if(username.trim()==''){
            //         $('#usern').text("<div style='border:1px solid red'>Please enter Username</div>")
            //        }
            //        if(email.trim()==''){
            //         $('#emailadd').text("<div style='border:1px solid red'>Please enter email</div>")
            //        }
            //        if(location.trim()==''){
            //         $('#locate').text("<div style='border:1px solid red'>Please enter Location</div>")
            //        }
            //        if(password.trim()==''){
            //         $('#pwd').text("<div style='border:1px solid red'>Please enter password</div>")
            //        }
            //        if($password2.trim()==''){
            //         $('#pwd2').text("<div style='border:1px solid red'>Please confirm password</div>")
            //        }
            //        if(!terms){
            //         $('#agree').text("<div style='border:1px solid red'>Please agree to terms and condition</div>")
            //        }
            //         business=$("#business").val()
            //         username=$("#username").val()
            //         email=$("#emailaddress").val()
            //         Location=$("#location").val()
            //         password=$("#password").val()
            //         password2=$("#password2").val()



            //      })
            // })
          </script>
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>