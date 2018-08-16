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
print_r($base_categories);
echo '</pre>';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div id="map-canvas"></div>
<script type='text/javascript'>
			function initialize() {
				var myLatlng = new google.maps.LatLng(43.565529, -80.197645);
				var mapOptions = {
				  zoom: 8,
				  center: myLatlng,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

				//=====Initialise Default Marker    
				var marker = new google.maps.Marker({
				  position: myLatlng,
				  map: map,
				  title: 'marker'
				//=====You can even customize the icons here
				});

				//=====Initialise InfoWindow
				var infowindow = new google.maps.InfoWindow({
				content: "<B>Skyway Dr</B>"
				});

				//=====Eventlistener for InfoWindow
				google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
				});
			}

				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
<form name="add_category" action="./insertOne" method="POST">
<h5>Parent ID</h5>
<select name="parent_id">
	<?php
	echo '<option value="0">Основна категория</option>';
	if($base_categories and !empty($base_categories)){
		foreach($base_categories as $key=>$value){
			echo '<option value="'.$value['id'].'">'.$value['title'].'</option>';
		}
	}
	?>
</select>

<h5>Заглавие</h5>
<input type="text" name="title" value="" size="50" />

<h5>Пояснителен текст</h5>
<textarea name="description"></textarea>

<div><input type="submit" value="Submit" /></div>

</form>


<div id="container">
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>