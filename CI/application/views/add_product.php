<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Users List</title>

</head>
<body>

<?php
echo '<pre>';
print_r($categories);
echo '</pre>';
?>

<form name="add_category" action="./insertOne" method="POST">
<h5>Category ID</h5>
<select name="category_id">
	<?php
	if($categories and !empty($categories)){
		foreach($categories as $key=>$value){
			echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
		}
	}
	?>
</select>

<h5>Заглавие</h5>
<input type="text" name="title" value="" size="50" />

<h5>Пояснителен текст</h5>
<textarea name="description"></textarea>

<h5>Price</h5>
<input type="text" name="price" value="" size="50" />

<h5>OLD Price</h5>
<input type="text" name="old_price" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>


<div id="container">
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>