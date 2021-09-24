<!doctype html>
<?php 
if(!isset($_GET['catid'])){
	header("Location:superadmin.php");
}


 ?>
<html>
<head>
	<title>Findine|foodcategory</title>
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

	if(isset($_POST['submit'])){
		$error='';
		if(empty($_POST['category'])){
			$error= "<div style='color:red'>Please input a category<div>";
		}else{


			$obj=new Restaurant;

			$output=$obj->updateCategory($_GET['catid'],$_POST['category']);
			header("Location:superadmin.php?msg=$output");
			exit;
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
	<input type="text" class='form-control' name='category' value="
	<?php 
	if(isset($_GET['catname'])) {
	 echo $_GET['catname'];
	} 
	?>"
	>
</div>
    <input type='submit' name='submit' class='form-group btn btn-info ml-5' value='Save Changes'>	
				</form>
</div>
<div class='col-md-3'></div>
</div>
</div>

	
</body>
</html>
