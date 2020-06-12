<?php
	require_once '../config/connect.php';
	if(!isset($_SESSION['Email'])&empty($_SESSION['Email']))
	{
		header('location:login.php');
	}
	
	if(isset($_GET) & !empty(isset($_GET))){
		$id=$_GET['id'];
	}else{
		header('location:categories.php');
	}
	
	if(isset($_POST) & !empty($_POST)){
		$id=mysqli_real_escape_string($connection,$_POST['id']);
		$name=mysqli_real_escape_string($connection,$_POST['categoryname']);
		$sql="UPDATE category SET name='$name' WHERE id=$id";
		$res=mysqli_query($connections,$res);
		if($res)
		{
			$smsg= "Category Updated";
		}
		else{
			$fmsg= "Failed to Update Category";
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
					<?php
						$sql="SELECT * FROM CATEGORY WHERE id=$id";
						$res=mysqli_query($connections,$sql);
						$r=mysqli_fetch_assoc($res);
					?>
					<input type="hidden" name='id' value="<?php echo $_GET['id']; ?>">
					<input type="text" class="form-control" name="category-name" id="category-name" placeholder="Category Name" value="<?php echo $r['name']; ?>">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

<?php include='inc/header.php'; ?>
<?php include='inc/nav.php'; ?>