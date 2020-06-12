<?php
	require_once '../config/connect.php';
	if(!isset($_SESSION['Email'])&empty($_SESSION['Email']))
	{
		header('location:login.php');
	}
	
	if(isset($_POST) & !empty($_POST)){
		$name=mysqli_real_escape_string($connection,$_POST['categoryname']);
		$sql="INSERT INTO category(name) VALUES ('$name')";
		$res=mysqli_query($connections,$res);
		if($res)
		{
			$smsg= "Category Added";
		}
		else{
			$fmsg= "Failed to Add Category";
		}
	}
?>

<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){?><div class= "alert alert-danger" role="alert"><?php echo $fmsg;?></div><?php } ?>
		<?php if(isset($smsg)){?><div class= "alert alert-success" role="alert"><?php echo $smsg;?></div><?php } ?>
			<form method="post">
				<div class="form-group">
					<label for="ProductName">Category Name</label>
					<input type="text" class="form-control" name="category-name" id="category-name" placeholder="Category Name">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

<?php include='inc/header.php'; ?>
<?php include='inc/nav.php'; ?>