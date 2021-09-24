<?php session_start();?>
<!doctype html>
<html>
<head>
	<title>Findine|addmenu</title>
	<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
	<style type="text/css">
	body{
		background-color: rgb(240,240,240);
	}
	.formborder{
        margin-top: 20px;
        background-color:#ffffff;
        padding:20px;
        border-radius:15px ;
      }
	</style>
</head>
<body>
	<?php
	if(isset($_POST['submit'])){
		include_once "finapjtconn.php";

	  $restfood=new Restaurant;

	$output=$restfood->insertrestFood($_SESSION['id'],$_POST['myfood'],$_POST['price'],$_POST['description'],$_POST['mycat']);
	header("Location:admin.php?msg=$output");
	exit;
	}

	 ?>
	
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'></div>
			<div class='col-md-6 formborder'>
				<form action='' method='POST' enctype="multipart/form-data">
					
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
				<div class='form-group'>
					<h6>Food </h6>
					<select name='myfood' id='food'>
						<option value="">Choose Food</option>
						option
					</select>						
						</div>
				<label>Price</label>
				<div class='form-group'>
				<input type='text' name='price' placeholder="Enter Price In Number"></div>
				<label>Description</label>
				<div class='form-group'>
					<textarea name="description" cols='10' rows='3'></textarea>
				</div>
				<label>Food Picture</label>
				<div class='form-group'>
				<input type='file' name='foodpic'>
			   </div>
			   <div class='form-group'>
                  <input type='submit' name='submit' class='form-group btn btn-info ml-5' value='Add Menu'>
                </div>	

				</form>
				</div>
				<div class='col-md-3'></div>
				</div>
				</div>
				<script type='text/javascript' src='js/jquery.min.js'></script>
				    <script type='text/javascript' language='javascript'>
				    	$(document).ready(function(){
				    		$("#menu").change(function(){
				              var myfood=$(this).val();

				              //alert(myfood);
				              $.ajax({
				                type:"POST",
				                url:"foodcase.php",
				                data:"restfood="+ myfood,
				                success:function(response){
				                	$('#food').html(response);
				                     },
				                error:function(errors){
				                	console.log(errors);
				                }
				              });
				    		});
				    		});
				    	</script>

	
				</body>
				</html>
