<?php 
	require('conf/db.php');
	require('conf/conf.php');
	
	if(isset($_POST['submit'])){
		
		$title =mysqli_real_escape_string($conn,$_POST['title']);
		$body =mysqli_real_escape_string($conn, $_POST['body']);
		$author =mysqli_real_escape_string($conn, $_POST['author']);

		$query ="INSERT INTO post(title, author, body) VALUES ('$title', '$author', '$body')";
		
		if(mysqli_query($conn,$query)){
			header('Location:'.ROOT_URL.'main.php');
		} else {
			echo "Something went wrong .try again!!   ".mysqli_error($conn);
		}
	}
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
  <input name="title" type="text" class="form-control" id="inputDefault">
				</div>
				<div class="form-group">
  <label class="col-form-label" for="inputDefault">Author</label>
  <input  name="author" type="text" class="form-control" id="inputDefault">
				</div>
    			<div class="form-group">
      <label for="exampleTextarea">What's on your mind?</label>
      <textarea name='body' class="form-control" id="exampleTextarea" rows="3" spellcheck="false"></textarea>
    </div>
    			<button name="submit" value="Submit" type="submit" class="btn btn-primary">Submit</button>
				</form>
				
		</div>

	</body>
</html>