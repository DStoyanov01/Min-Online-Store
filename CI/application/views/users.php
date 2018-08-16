<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Users List</title>

</head>
<body>

<div id="container">
	<h1><?php=$title?></h1>

	<div id="body">
		<?php
		echo '<pre>';
		print_r($users);
		echo '</pre>';
		
		foreach($users as $user){
			echo 'Username: '.$user['username'].'<br>';
			echo 'Name: '.$user['name'].'<br>';
		}
		?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>