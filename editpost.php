<?php 
	require('conf/db.php');
	require('conf/conf.php');
	
	if(isset($_POST['submit'])){

		$updateid=mysqli_real_escape_string($conn,$_POST['updateid']);
		$title =mysqli_real_escape_string($conn,$_POST['title']);
		$body =mysqli_real_escape_string($conn, $_POST['body']);
		$author =mysqli_real_escape_string($conn, $_POST['author']);

		$query ="UPDATE post SET title='$title',author='$author',
		body='$body'   WHERE id = $updateid" ;
		
		if(mysqli_query($conn,$query)){
			header('Location:'.ROOT_URL.'main.php');
		} else {
			echo mysqli_error($conn);
		}
	}

	$id = mysqli_real_escape_string($conn,$_GET['id']);
	$query = 'SELECT * FROM post WHERE id = '.$id;
	
	$result =mysqli_query($conn,$query);

	$post =mysqli_fetch_assoc($result);
	
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
		<div class="container">
			<h1>Add Post</h1>
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
  <label  class="col-form-label" for="inputDefault">Title</label>
  <input name="title" value="<?php echo $post['title']; ?>" type="text" class="form-control" id="inputDefault">
				</div>
				<div class="form-group">
  <label class="col-form-label" for="inputDefault">Author</label>
  <input  name="author" type="text" value="<?php echo $post['author']; ?>" class="form-control" id="inputDefault">
				</div>
    			<div class="form-group">
      <label for="exampleTextarea">What's on your mind?</label>
      <textarea name='body' class="form-control" id="exampleTextarea" rows="3" spellcheck="false"><?php echo $post['body']; ?></textarea>
    </div>
    			<input type="hidden" name="updateid" value="<?php echo $post['id']; ?>">
    			<button name="submit" value="Submit" type="submit" class="btn btn-primary">Submit</button>
				</form>
				
		</div>

	</body>
</html> 