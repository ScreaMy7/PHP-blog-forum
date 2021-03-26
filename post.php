<?php 
	require('conf/db.php');
	require('conf/conf.php');

	if(isset($_POST['delete'])){

		$deleteid=mysqli_real_escape_string($conn,$_POST['deleteid']);
		
		$query ="DELETE FROM post WHERE id =$deleteid" ;
		
		if(mysqli_query($conn,$query)){
			header('Location:'.ROOT_URL.'main.php');
		} else {
			echo mysqli_error($conn);
		}
	}


	//get id
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	$query = 'SELECT * FROM post WHERE id='.$id;

	$result =mysqli_query($conn,$query);

	$post =mysqli_fetch_assoc($result );
	
	mysqli_free_result($result);

	mysqli_close($conn);
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>BLOG</title>
		<link rel="stylesheet" type="text/css" href="conf/bootstrap.min.css">
	</head>
	<body>
		<?php include('navbar.php'); ?>
		<div class='container'>
			<h1>Posts</h1>
				<a href="<?php echo ROOT_URL."main.php"; ?>" class="btn btn-default">Back</a>
				<h3><?php echo $post['title']; ?></h3>
				<small>Created on <?php echo $post['created_at']; ?>
				<?php echo $post['author']; ?>
				</small>
				<p> <?php echo $post ['body']; ?></p>
				<hr>
				<form class="pull-right" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="deleteid" value="<?php echo $post['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				</form>
				<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>

				</div>
			
		</div>

	</body>
	</html>