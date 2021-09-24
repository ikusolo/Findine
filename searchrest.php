<?php 
       include_once("finapjtconn.php");
       $searchrest=$_REQUEST['searchrest'];
        //create object of user class
       if(!empty($searchrest)){
          $obj = new Restaurant;
          $myrestaurant=$obj->searchRest($searchrest);
          //foreach ($myrestaurant as $key => $value) {
           //var_dump($myrestaurant);
        //   //}                        
        //  echo "<pre>";
        // var_dump($myrestaurant);
        // echo "</pre>";

        if(is_array($myrestaurant)){
        	foreach($myrestaurant as $key => $value){?>
        		<div class='userbox mt-1' style='background-color:white;width:200px;'>
            <a href="#<?php echo $value['rest_id'] ?>" style='color:#0000ff;text-decoration: none;'>
        	  <?php echo $value['rest_name']?>

            </a>
        		</div>
        		<?php
        	}
          }
            }
          ?>
        	
        




       

        