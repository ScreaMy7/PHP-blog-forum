<?php 
	require('conf/db.php');
	require('conf/conf.php');
	$query = 'SELECT * FROM post ORDER BY created_at DESC';

	$result =mysqli_query($conn,$query);

	$posts =mysqli_fetch_all($result,MYSQLI_ASSOC);
	
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
		<div class='container' class="d-flex w-100 justify-content-between">
			<h1>Posts</h1>
				<?php foreach($posts as $post): ?>
				<div class='well'>
				<h3 ><?php echo $post['title']; ?></h3>
				<small>Created on <?php echo $post['created_at']; ?>
				<?php echo $post['author']; ?>
				</small>
				<p><<?php echo $post ['body']; ?></p>
				<a class='btn btn-default' href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id'];?>">Read More</a>
				</div>
			<?php endforeach; ?>
		</div>

	</body>
</html>