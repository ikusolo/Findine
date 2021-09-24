<?php 
/***********************/
/****author:Ikuyiminu Solomon**/
include "dbconstant.php";

class Customers{
	//member variable;

	public $firstname;
	public $lastname;
	public $password;
	public $address;
	public $email;
	public $phonenumber;
	


	function __construct(){
		$this->conn=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		if($this->conn->error) {
            die("Connection Failed:".$this->conn->error);
        }
	}
	function signUp($firstname,$lastname,$password,$address,$email,$phonenumber){
		$pwd=md5($password);
		$query="INSERT INTO customers(custom_fname,custom_lname,custom_pwd,custom_address,custom_email,custom_phone_num)VALUES('$firstname','$lastname','$pwd','$address','$email','$phonenumber')";
		$result=$this->conn->query($query);
		if($result){
			return $this->conn->insert_id;
            
        }else{
        	return $this->conn->error;
        }

	}
	function loginCustomer($email,$password){
		$pwd=md5($password);
		$query="SELECT * FROM customers WHERE custom_email='$email' AND custom_pwd='$pwd'";
		$result=$this->conn->query($query);
			if($result->num_rows>0){
			return  $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$msg['error']= "Invalid email/password";

			
		}

		return $msg;



	}
	function getCustomers(){
		//write the sql query
		$sql="SELECT *  FROM customers ORDER BY custom_fname";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function deleteCustomer($customid){
		//write sql query
		$sql="DELETE FROM customers WHERE custom_id='$customid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete user ";
		}
	}
	 function updateCustomer($fname,$lname,$email,$tel,$add,$custid){
		//write sql query
		$sql="UPDATE customers SET custom_fname='$fname',custom_lname='$lname',custom_email='$email',custom_phone_num='$tel',custom_address='$add' WHERE custom_id='$custid'";
        //run the query
        $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	return "<div class='alert alert-success' role='alert'>Successfully Updated kindly refresh the page!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }elseif($this->conn->affected_rows == 0){
           return "<div class='alert alert-info' role='alert'>No changes was made<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
        	return "<div class='alert alert-danger' role='alert'>Could not update details<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";;
        }


	}
	
	function getMyCustomer($custid){
		//write the sql query
		$sql="SELECT *  FROM customers WHERE custom_id='$custid'";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			return error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
		}
		return $rows;
	}
	function updatecustpwd($pwd,$custid){
		$mypwd=md5($pwd);
		$sql="UPDATE customers SET custom_pwd='$mypwd' WHERE custom_id='$custid'";
		 $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	 return "<div class='alert alert-success' role='alert'>Password was successfully updated kindly refresh the page<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }elseif($this->conn->affected_rows == 0){
            return "<div class='alert alert-info' role='alert'>No changes was made<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
        	return "<div class='alert alert-danger' role='alert'>could not update password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
	}
	
	
  }
  ?>




   <?php

       class Restaurant{
	//member variable;

	
	public $restname;
	public $location;
	public $restusername;
	public $restpassword;
	public $restemail;
	public $conn;






       function __construct(){
		$this->conn=new Mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
		if($this->conn->connect_error) {
            die("Connection Failed:".$this->conn->connect_error);
        }
	}



	function restSignUp($restname,$location,$username,$password,$email){
          if(isset($_POST['submit'])){
        $filename=$_FILES['companylogo']['name'];
        $filetype=$_FILES['companylogo']['type'];
        $filetempname=$_FILES['companylogo']['tmp_name'];
        $fileerror=$_FILES['companylogo']['error'];
        $filesize=$_FILES['companylogo']['size'];


       
        if($fileerror>0){
          $error= "<div class='alert alert-danger'>You did not select any file for upload</div>";
          return $error;
          
        }if($filesize > 2097152){
          $error= "<div class='alert alert-danger'>Resume should be less than 2mb</div>";
          return $error;
          }else{
        //check for the right file extention

        $extension=array("jpg","png","gif","jpeg");
        $file_ext=explode(".",$filename);
        $ext=end($file_ext);
        $ext=strtolower($ext);
        if(!in_array($ext,$extension)){
            $error ="<div class='alert alert-danger'>File extension not allowed</div>";
            return $error;
            
          }
        }
        if(empty($error)){
          $newlogo=rand().time().".".$ext;
          $destination="logo/".$newlogo;

          move_uploaded_file($filetempname,$destination);

          
        }
     
        }

                                
      

		$pwd=md5($password);
		$query="INSERT INTO restaurant(rest_name,rest_location,rest_username,rest_pwd,rest_email,rest_logo)VALUES('$restname','$location','$username','$pwd','$email','$newlogo')";
		$result=$this->conn->query($query);
		if($result){
            $rest_id=$this->conn->insert_id;
            return $rest_id;
        }else{
        	return "Not successsfully registered".$this->conn->error;
        }
    }
        

	
	 function loginRestaurant($username,$password){
		$pwd=md5($password);
		$query="SELECT * FROM restaurant WHERE rest_username='$username' AND rest_pwd='$pwd'";
		$result=$this->conn->query($query);
		if($result->num_rows>0){
			return  $result->fetch_all(MYSQLI_ASSOC);
		}else{
			$msg['error']= "Invalid username/Password";
		}

		return $msg;



	}
	
	function insertOrder($amt){
		$sql="INSERT INTO orders(total_amt)VALUES('$amt')";
		$result=$this->conn->query($sql);

		if($result){
			return true;
        }else{
        	return $this->conn->error;
        }
        

	}

	function insertFoodCategory($catname){
		$sql="INSERT INTO food_category(category_name)VALUES('$catname')";
		$result=$this->conn->query($sql);
		if($result){
			return "<div class='alert-success'>Category added successfully</div>";
		}else{
        	return $this->conn->error;
        }
     

	}

	function listCategories(){
		//write the sql query
		$sql="SELECT *  FROM food_category ORDER BY category_name";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function getRestaurant(){
		//write the sql query
		$sql="SELECT *  FROM restaurant ORDER BY rest_name";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function gettopRestaurant(){
		//write the sql query
		$sql="SELECT *  FROM restaurant ORDER BY rest_name LIMIT 8";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}

	function insertFood($foodname,$catid){
		$sql="INSERT INTO food(food_name,food_category_id)VALUES('$foodname','$catid')";
		$result=$this->conn->query($sql);
		if($result){
			return "<div class='alert-success'>Food added successfully</div>";
		}else{
        	return $this->conn->error;
        }
     

	}


	function listFood(){
		//write the sql query
		$sql="SELECT *  FROM food ORDER BY food_name";
		//execute run the query
		$result=$this->conn->query($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;



 }


    function updateCategory($catid,$catname){
		//write sql query
		$sql="UPDATE food_category SET category_name='$catname' WHERE category_id='$catid'";
        //run the query
        $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	return "category details was successfully updated";
        }elseif($this->conn->affected_rows == 0){
            return "No changes was made";
        }else{
        	return "could not update category details";
        }


	}

	function updateFood($foodid,$foodname){
		//write sql query
		$sql="UPDATE food SET food_name='$foodname' WHERE food_id='$foodid'";
        //run the query
        $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	return "food details was successfully updated";
        }elseif($this->conn->affected_rows == 0){
            return "No changes was made";
        }else{
        	return "could not update category details";
        }


	}


	function deleteFoodCategory($catid){
		//write sql query
		$sql="DELETE FROM food_category WHERE category_id='$catid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete category details";
		}
	}

	function deleterestMenu($restfoodid){
		//write sql query
		$sql="DELETE FROM restaurant_food WHERE restaurant_food_id ='$restfoodid'";
		$result=$this->conn->query($sql);
		var_dump($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return $this->conn->error;
		}
	}
	function deleteFood($restid){
		//write sql query
		$sql="DELETE FROM food WHERE food_id ='$restid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete food ";
		}
	}

	function deleteRestaurant($restid){
		//write sql query
		$sql="DELETE FROM restaurant WHERE rest_id='$restid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete restaurant ";
          }
    }

    function insertrestFood($foodrestid,$restfoodid,$foodprice,$fooddescription,$catid){


        if(isset($_POST['submit'])){
        $filename=$_FILES['foodpic']['name'];
        $filetype=$_FILES['foodpic']['type'];
        $filetempname=$_FILES['foodpic']['tmp_name'];
        $fileerror=$_FILES['foodpic']['error'];
        $filesize=$_FILES['foodpic']['size'];


       
        if($fileerror>0){
          $error= "<div class='alert alert-danger'>You did not select any file for upload</div>";
          return $error;
          
        }if($filesize > 2097152){
          $error= "<div class='alert alert-danger'>Resume should be less than 2mb</div>";
          return $error;
          }else{
        //check for the right file extention

        $extension=array("jpg","png","gif","jpeg");
        $file_ext=explode(".",$filename);
        $ext=end($file_ext);
        $ext=strtolower($ext);
        if(!in_array($ext, $extension)){
            $error ="<div class='alert alert-danger'>File extension not allowed</div>";
            return $error;
            
          }
        }
        if(empty($error)){
          $newpic=rand().time().".".$ext;
          $destination="foodpic/".$newpic;

          move_uploaded_file($filetempname,$destination);

          
        }
     
        }


    	$sql="INSERT INTO restaurant_food(food_rest_id,food_pic,food_price,food_description,restfood_catid,rest_food_id)VALUES('$foodrestid','$newpic','$foodprice','$fooddescription','$catid','$restfoodid')";
		$result=$this->conn->query($sql);
		//var_dump($sql);
		if($result){
			return "Food added successfully";
		}else{
        	//return $this->conn->error;
        }
     

	}

	 function myFood($catid){
		$sql="SELECT * FROM food WHERE food_category_id = '$catid'";
		$result=$this->conn->query($sql);
		$rows=array();

		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;
		}
		return $rows;
      }
      function listMenu($restid){
      	$sql="SELECT * FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_rest_id='$restid' ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;

		}
		return $rows;
      }
      function listcatMenu($restid){
      	$sql="SELECT DISTINCT category_id,category_name FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_rest_id='$restid' ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;

		}
		return $rows;
      }
      function getmyRestaurant($restid){
		//write the sql query
		$sql="SELECT *  FROM restaurant WHERE rest_id = '$restid'";
		//execute run the query
		$result=$this->conn->query($sql);
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function listcatFood($catid){
      	$sql="SELECT DISTINCT category_name FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_rest_id='$restid' ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;

		}
		return $rows;
      }
      function listmyMenu($restid){
      	$sql="SELECT * FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_rest_id='$restid' ORDER BY category_id ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;

		}
		return $rows;
      }
      function searchFood($searchmenu){
      		//write query to search first 
      		$sql="SELECT DISTINCT food_id,food_name FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_name LIKE '%$searchmenu%' OR category_name LIKE '%$searchmenu%' OR rest_name LIKE '%$searchmenu%' LIMIT 5 ";
      		$result=$this->conn->query($sql);
      		if($this->conn->affected_rows>0){
      			return $result->fetch_all(MYSQLI_ASSOC);
      		}else{
      			//return $this->conn->error;
      		}
      	}
      	function listmyrest($foodid){
      	$sql="SELECT * FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_id='$foodid' ORDER BY food_id ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;

		}
		return $rows;
      }
      function order($restid,$custid,$foodid,$totalamt,$qty){
		$query="INSERT INTO orders SET order_rest_id='$restid',order_custom_id='$custid',order_food_id='$foodid',total_amt='$totalamt',total_qty='$qty'";
		$result=$this->conn->query($query);
		if($result){
			return $this->conn->insert_id;
        }else{
        	return "Not successsfully added".$this->conn->error;
        }


	}
	function listorder($restid){
      	$sql="SELECT * FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id JOIN food ON orders.order_food_id=food.food_id WHERE order_rest_id='$restid' ORDER BY order_date";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;


		}
		return $rows;
      }
      function listcustorder($custid){
      	$sql="SELECT * FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id JOIN food ON orders.order_food_id=food.food_id WHERE order_custom_id='$custid' ORDER BY order_date DESC LIMIT 1  ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}else{
			//return $this->conn->error;


		}
		return $rows;
      }
      public function Paystack($email,$amount){
		$url="https://api.paystack.co/transaction/initialize";
		$callbackurl = "http://localhost/Findine/finalproject3.php";
        $reference="MJ".time().rand();
		$fields=array(
			"email"=>$email,
			"amount"=>$amount,
			"reference"=>$reference,
			"callback_url"=>$callbackurl,


		);

		$fields_string=http_build_query($fields);

		$ch=curl_init();

		// set curl option options
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,TRUE);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(
			"Authorization:Bearer sk_test_faf0af125f809904cb2eb10be6d4287a57e1e204",
			"Cache-Control:no-cache",));
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);

		//step 3 execute curl

		$response=curl_exec($ch);
           if(curl_error($ch)){
           	echo curl_error($ch);
           	exit;
           }
           // step 4 close call session

           curl_close($ch);

           //step 5 convert json to object

           $result=json_decode($response);

           return $result;


	}
	public function insertTransDetails($orderid,$custid,$amount,$paymentmode){
         $sql="INSERT INTO payment(pay_order_id,pay_custom_id,amount,payment_type)VALUES('$orderid','$custid','$amount','$paymentmode')";
         $result=$this->conn->query($sql);
            //var_dump($sql);
         if($this->conn->affected_rows==1){
         	return TRUE;
         }else{
         	return FALSE;
         }
	}
	function recentorder($custid){
		$sql="SELECT * FROM orders JOIN restaurant ON orders.order_rest_id=restaurant.rest_id JOIN food ON orders.order_food_id=food.food_id  WHERE order_custom_id=$custid";
		//var_dump($sql);
		$result=$this->conn->query($sql);
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             	
             }
		}else{
			return error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

		}
		return $rows;
		
	}
	function deleteOrder($orderid){
		//write sql query
		$sql="DELETE FROM orders WHERE order_id='$orderid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete order ";
          }
    }
    function deleterestOrder($orderid){
		//write sql query
		$sql="DELETE FROM orders WHERE order_id='$orderid'";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows == 1){
			return "Deleted Successfully";
		}else{
			return "Could not delete order ";
          }
    }
    function updateRest($restname,$restusername,$restemail,$location,$restid){
		//write sql query
		$sql="UPDATE restaurant SET rest_name='$restname',rest_username='$restusername',rest_email='$restemail',rest_location='$location' WHERE rest_id='$restid'";
        //run the query
        //var_dump($sql);
        $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	return "<div class='alert alert-success' role='alert'>Successfully Updated kindly refresh the page!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }elseif($this->conn->affected_rows == 0){
            return "<div class='alert alert-info' role='alert'>No changes was made
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            </div>";
        }else{
        	return "<div class='alert alert-danger' role='alert'>could not update details!
        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        	</button></div>";
        }


	}
	function getMyRest($restid){
		//write the sql query
		$sql="SELECT * FROM restaurant WHERE rest_id='$restid'";
		//execute run the query
		$result=$this->conn->query($sql);
		//var_dump($sql);
		$rows=array();
		if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
             	$rows[]=$row;
             }
		}
		return $rows;
	}
	function adminfood($restid){
      	$sql="SELECT food_name FROM restaurant_food JOIN food ON restaurant_food.rest_food_id=food.food_id WHERE food_rest_id='$restid'  ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             return $result->num_rows;
		}else{
			return 0;
		}	
		return $rows;
        }
      function adminorders($restid){
      	$sql="SELECT order_rest_id FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id JOIN food ON orders.order_food_id=food.food_id WHERE order_rest_id='$restid'  ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             return $result->num_rows;
		}else{
			return 0;
			
		}	
		return $rows;
}
       function admincust($restid){
      	$sql="SELECT DISTINCT order_custom_id FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id JOIN food ON orders.order_food_id=food.food_id WHERE order_rest_id='$restid'  ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
      	$rows=array();
        if($result->num_rows>0){
             return $result->num_rows;
		}else{
			return 0;
		}	
		return $rows;
}
         function adminamt($restid){
      	$sql="SELECT  sum(total_amt) FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id JOIN food ON orders.order_food_id=food.food_id WHERE order_rest_id='$restid'  ";
      	//var_dump($sql);
      	$result=$this->conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
		}else{
			return 0;
		}	
		return $row;
       }
       function updatelogo($restid){

    	if(isset($_POST['submit1'])){
        $filename=$_FILES['mylogo']['name'];
        $filetype=$_FILES['mylogo']['type'];
        $filetempname=$_FILES['mylogo']['tmp_name'];
        $fileerror=$_FILES['mylogo']['error'];
        $filesize=$_FILES['mylogo']['size'];


       
        if($fileerror>0){
          $error= "<div class='alert alert-danger'>You did not select any file for upload
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          </div>";
          return $error;
          
        }if($filesize > 2097152){
          $error= "<div class='alert alert-danger'>Resume should be less than 2mb
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          </div>";
          return $error;
          }else{
        //check for the right file extention

        $extension=array("jpg","png","gif","jpeg");
        $file_ext=explode(".",$filename);
        $ext=end($file_ext);
        $ext=strtolower($ext);
        if(!in_array($ext, $extension)){
            $error ="<div class='alert alert-danger'>File extension not allowed,upload any of these (jpg,png,gif,jpeg)
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            </div>";
            return $error;
            
          }
        }
        if(empty($error)){
          $newlogo=rand().time().".".$ext;
          $destination="logo/".$newlogo;

          move_uploaded_file($filetempname,$destination);

          
        }
     
        

		//write sql query
		$sql="UPDATE restaurant SET rest_logo='$newlogo' WHERE rest_id='$restid'";
        //run the query
        //var_dump($sql);
        $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	 return "<div class='alert alert-success' role='alert'>logo details was successfully updated kindly refresh the page<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }elseif($this->conn->affected_rows == 0){
            return "<div class='alert alert-info' role='alert'>No changes was made<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
        	return "<div class='alert alert-success' role='alert'>could not update logo <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }

  }
	}
	function updaterestpwd($pwd,$restid){
		$mypwd=md5($pwd);
		$sql="UPDATE restaurant SET rest_pwd='$mypwd' WHERE rest_id='$restid'";
		 $result=$this->conn->query($sql);
        if($this->conn->affected_rows == 1){
        	 return "<div class='alert alert-success' role='alert'>Password was successfully updated kindly refresh the page<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }elseif($this->conn->affected_rows == 0){
            return "<div class='alert alert-info' role='alert'>No changes was made<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }else{
        	return "<div class='alert alert-danger' role='alert'>could not update password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
	}
	function searchRest($searchrest){
      		//write query to search first 
      		$sql="SELECT * FROM `restaurant` WHERE  rest_name LIKE '%$searchrest%'";
      		$result=$this->conn->query($sql);
      		if($this->conn->affected_rows>0){
      			return $result->fetch_all(MYSQLI_ASSOC);
      		}else{
      			//return $this->conn->error;
      		}
      	}
      	function searchrestFood($searchmenu,$restid){
      		//write query to search first 
      		$sql="SELECT DISTINCT food_id,food_name FROM `restaurant_food` JOIN food ON restaurant_food.rest_food_id=food.food_id JOIN food_category ON restaurant_food.restfood_catid=food_category.category_id JOIN restaurant ON restaurant_food.food_rest_id=restaurant.rest_id WHERE food_name LIKE '%$searchmenu%' AND food_rest_id=$restid  LIMIT 5 ";
      		//var_dump($sql);
      		$result=$this->conn->query($sql);
      		if($this->conn->affected_rows>0){
      			return $result->fetch_all(MYSQLI_ASSOC);
      		}else{
      			//return $this->conn->error;
      		}
      	}
      	function searchcust($searchcust,$restid){
      		//write query to search first 
      		$sql="SELECT custom_fname,custom_lname FROM orders JOIN customers ON orders.order_custom_id=customers.custom_id  WHERE custom_fname LIKE '%$searchcust%' AND order_rest_id=$restid  LIMIT 5 ";
      		//var_dump($sql);
      		$result=$this->conn->query($sql);
      		if($this->conn->affected_rows>0){
      			return $result->fetch_all(MYSQLI_ASSOC);
      		}else{
      			//return $this->conn->error;
      		}
      	}

}

 ?>







