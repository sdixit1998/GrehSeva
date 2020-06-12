<?php
	require_once '../config/connect.php';
	if(!isset($_SESSION['Email'])&empty($_SESSION['Email']))
	{
		header('location:login.php');
	}
?>

<?php include='inc/header.php'; ?>
<?php include='inc/nav.php'; ?>

<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="SELECT * FROM CATEGORY";
						$res=mysqli_query($connections,$sql);
						while($r=mysqli_fetch_assoc($res)){
					?>
						<tr>
							<th scope="row"><?php echo $r['id']; ?></th>
							<td><?php echo $r['name']; ?></td>
							<td><a href="editcategory.php?id=<?php echo $r['id']; ?>">Edit</a>|<a href="delcategory.phpid=?id=<?php echo $r['id']; ?>">Delete</a>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section> 
<?php include='inc/footer.php' ?>