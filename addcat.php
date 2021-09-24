<!doctype html>
<html>
<head>
	<title>Findine|addcat</title>
	<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
	<style type="text/css">
	body{
		background-color: rgb(240,240,240);
	}
	.formborder{
        margin-top: 100px;
        background-color:#ffffff;
        padding:20px;
        border-radius:15px ;
      }
		
	</style>
</head>
<body>
	<?php 
	include_once "finapjtconn.php";

	if(!empty($_POST)){
		$error='';
		if(empty($_POST['category'])){
			$error= "<div style='color:red'>Please input a category<div>";
		}else{

			$obj=new Restaurant;

			$output=$obj->insertFoodCategory($_POST['category']);
			header("Location:superadmin.php");
		}
	}

	 ?>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'></div>
			<div class='col-md-6 formborder'>
				<form action='' method='POST'>
					<?php if(isset($error)){
						echo $error;
					} ?>
				<div class='form-group'>
	<input type="text" class='form-control' name='category'>
</div>
    <input type='submit' name='submit' class='form-group btn btn-info ml-5' value='Add Category'>	
				</form>
</div>
<div class='col-md-3'></div>
</div>
</div>

	
</body>
</html>
