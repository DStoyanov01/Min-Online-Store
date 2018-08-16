<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php$title?></title>

</head>
<body>

<?php
foreach($drehi as $value){
	echo '<a href="products/view/'.$value['id'].'">'.$value['title'].'</a><br>'
}
?>

<div id="container">
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>