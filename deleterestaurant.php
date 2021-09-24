<!doctype html>
<?php
if(!isset($_GET['restid'])){
	header("Location:superadmin.php");
}
?>

<html>
<head>
	<title>Findine|delete restaurant</title>
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
                   	$output=$obj->deleteRestaurant($_GET['restid']);
                   	header("Location:superadmin.php?message=$output");
                   }
				 ?>
				 <?php
				 if(isset($_GET['restid'])){


				?>
				<h3>Are you sure you want to delete <?php if(isset($_GET['restname'])){
					echo "<div style='font-size:35px'>".$_GET['restname']."</div>";
				} ?> from the Restaurant list</h3>
	              <form action='' method='post'>
			         <div class='form-group'>
            <button type='submit' name='submit'class='btn btn-danger form-control'>Yes,Delete it</button>
        </div>
		</form>
	<?php } ?>
	<a href="superadmin.php" class="btn btn-primary form-control">No don't delete</a>
	</div>
	<div class='col-md-3'></div>
</div>
</div>
</body>
</html>