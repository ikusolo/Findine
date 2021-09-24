<?php 
       include_once("finapjtconn.php");
       $searchmenu=$_REQUEST['searchfood'];
        //create object of user class
       if(!empty($searchmenu)){
            $obj=new Restaurant; 

        $output=$obj->searchFood($searchmenu);
        //  echo "<pre>";
        // var_dump($output);
        // echo "</pre>";

        if(is_array($output)){
        	foreach($output as $key => $value){?>
        		<div class='userbox mt-1' style='background-color:white;width:200px;'>
            <a href="myfoodsearch.php?foodid=<?php echo $value['food_id'] ?>" style='color:black;text-decoration: none;'>
        	  <?php echo $value['food_name']?>

            </a>
        		</div>
        		<?php
        	}
          }
            }
          ?>
        	
        




       

        