<?php
var_dump($_REQUEST);
// verify transaction
include_once "finapjtconn.php";
$obj=new Restaurant;
$output=$obj->verifyPaystack($_REQUEST['reference']);

// echo "<pre>";
// print_r($output);
// echo "</pre>";

//update payment transaction 

if($output->data->status=='success'){
	$updatetrans=$obj->updateTransaction('Paystack');
	// echo "<pre>";
	// 	var_dump($updatetrans);
	// 	echo "</pre>";

	if($updatetrans){
		//header("Location:finalproject.php")
		echo "<div> Your subscription payment was successfull</div>";
	}

}

 ?>