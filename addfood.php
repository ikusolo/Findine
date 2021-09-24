<!doctype html>
<html>
<head>
	<title>Findine|addfood</title>
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
		if(empty($_POST['food'])){
			$error= "<div style='color:red'>Please add a food<div>";
		}else{

			$objfood=new Restaurant;

			$output=$objfood->insertFood($_POST['food'],$_POST['mycat']);
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
					<label>Food name</label>
	<input type="text" class='form-control' name='food'>
</div>
<div class='form-group'>
					<h6>Food categories</h6>
					
					<select name='mycat' id='menu'>
						<option value="">Choose Category</option>
						<?php 
                        include_once "finapjtconn.php";

                            $objcat=new Restaurant;
                             $categories=$objcat->listCategories();

                             foreach ($categories as $key => $value) {

                            
                         ?>

					     
						<option  value="<?php echo $value['category_id'] ?>"><?php echo $value['category_name']  ?></option>
						<?php }?>
					</select>
				</div>
    <input type='submit' name='submit' class='form-group btn btn-info ml-5' value='Add Food'>	
				</form>
</div>
<div class='col-md-3'></div>
</div>
</div>

	
</body>
</html>
