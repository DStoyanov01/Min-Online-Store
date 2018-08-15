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
echo '<pre>';
print_r($categories);
echo '<br>Main Categories<br>';
print_r($main_categories);
echo '<br>Secondary Categories<br>';
$cat1 = array();
$cat2 = array();
foreach($secondary_categories as $key=>$value){
	if($value['parent_id'] == 1){
		$cat1[] = $value;
	}else{
		$cat2[] = $value;
	}
}
print_r($secondary_categories);
echo '<br>Подкатегории на Дрехи<br>';
print_r($cat1);
echo '<br>Подкатегории на Чанти<br>';
print_r($cat2);
print_r($drehi);
print_r($chanti);
echo '</pre>';

foreach($main_categories as $main_cat){
	echo '<a href="category/mycategory/'.$main_cat['id'].'">'.$main_cat['title'].'</a><br>';
}

?>




<div id="container">
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>