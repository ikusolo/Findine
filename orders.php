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
        <title>Orders</title>
        <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script type='text/javascript' src='js/jquery.min.js'></script>


        
    </head>
    <?php
  
  if($_SERVER["REQUEST_METHOD"]=='POST'){
    #create instance of payment class
  include_once "finapjtconn.php";
    $payobj=new Restaurant;
   
  #make reference to initialize method
    $output=$payobj->Paystack($_SESSION['email'],$_GET['myprice']);
    // echo "<pre>";
    // var_dump($output);
    // echo "</pre>";

    //echo $output->data->authorization_url;
    $firstleg=$output->data->authorization_url;
    $reference=$output->data->reference;
    $paymentmode="Paystack";
    $email=$_SESSION['email'];
    $amount=$_GET['myprice'];

    if(!empty($firstleg)){
      //insert transaction details
      $payobj->insertTransDetails($_SESSION['orderid'],$_SESSION['custid'],$amount,$paymentmode);
        }
    header("Location:$firstleg");
    exit;
    }else{
        if(empty($_GET['myprice'])){
            $mymsg="<div class='alert alert-info' style='text-align:center'>Please Make an Order </div>";
        }
    }

   ?>
  
   

   
    <body>
    <div class="container"> 
    <?php include_once "findinenavbar.php" ?>   
    <?php
       if(isset($mymsg)){
        echo $mymsg;
       }
     ?> 
    <div class="container-fluid cust_table">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                </div>
                <table class="table table-striped table-hover table-bordered ">
                    <thead class='table-info'>
                        <tr>
                            <th>S/N</th>
                            <th>Order Id</th>
                            <th>Food</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "finapjtconn.php";
                        $obj=new Restaurant;
                        $output=$obj->listcustorder($_SESSION['custid'])

                        ?>
                        <?php
                        $counter=1;
                        foreach ($output as $key => $value) {
                           ?>
                        

                         
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $value['order_id'] ; ?></td>
                            <td><?php echo $value['food_name'] ; ?></td>
                            <td>&#8358;<?php echo $value['total_amt'] ; ?></td>                            
                            <td><?php echo $value['total_qty'] ; ?></td>

                            <td>
                               
                                
                                <a href="deleteorder.php?orderid=<?php echo $value['order_id']; ?>" class="btn btn-info" name="delete" id='delete'>Delete</a>
                                
                            </td>
                            <?php
                        }
                            ?>
                        </tr>
                    </tbody>
                </table>
                
            </div>
           <form method="POST" action="">
            <input type="submit" name="checkout" class="btn btn-info btn-block" value="CONTINUE TO CHECKOUT">
         </form>  
        </div> 
    </div>  
    <?php include_once "findinefooter.php"  ?>    
</div>
    </body>
    </html>
