<?php
include_once "finapjtconn.php";
$food=$_REQUEST['restfood'];
          $objFood=new Restaurant;

          $Food=$objFood->myFood($food);

          ?>
          <?php
          
          foreach($Food as $key => $value){
                  ?>
     <option value="<?php echo $value['food_id'] ?>"><?php echo $value['food_name']?></option>
 <?php 
}
?>


