<?php session_start();
       include_once("finapjtconn.php");
       $searchcust=$_REQUEST['searchcust'];
        //create object of user class
       if(!empty($searchcust)){
            $obj=new Restaurant; 

        $output=$obj->searchcust($searchcust,$_SESSION['id']);
        //  echo "<pre>";
        // var_dump($output);
        // echo "</pre>";

        if(is_array($output)){
        	foreach($output as $key => $value){?>
        		<div class='userbox mt-1' style='background-color:white;width:200px;'>
            <a href="#<?php echo $value['custom_fname'] ?>" style='color:black;text-decoration: none;'>
        	  <?php
             echo $value['custom_fname']." ".$value['custom_lname'];
             ?>

            </a>
        		</div>
        		<?php
        	}
          }
            }
          ?>
        	
        




       

        