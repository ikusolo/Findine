<!doctype html>
<?php
// if(!isset($_GET['oderid'])){
// 	header("Location:finalproject.php");
// }
?>
<html>
<head>
	<title>Findine|Delete food</title>
	<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'></div>
			<div class='col-md-6'> 
				<?php
				include_once "finapjtconn.php";
                   if(isset($_POST['submit'])){
                   	//create object of cartegory class

                   	$obj=new Restaurant;
                   	//reference delete method
                   	$output=$obj->deleteOrder($_GET['orderid']);
                   	header("Location:orders.php?message=$output");
                   }
				 ?>
				 <?php
				 if(isset($_GET['orderid'])){


				?>
				<h3>Are you sure you want to delete this order</h3>
	              <form action='' method='post'>
			         <div class='form-group'>
            <button type='submit' name='submit'class='btn btn-danger form-control'>Yes,Delete it</button>
        </div>
		</form>
	<?php } ?>
	<a href="orders.php" class="btn btn-primary form-control">No don't delete</a>
	</div>
	<div class='col-md-3'></div>
</div>
</div>
</body>
</html>