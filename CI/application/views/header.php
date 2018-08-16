<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<title>Онлайн магазин за дамско облекло - ЕЛИКА</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/IndexStyle.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/header+nav.css')?>" />
		<?php if($controller == 'products'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/header+nav+article.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/footer.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/Clothes-GridStyle.css')?>" />
		<?php }else if($controller == 'contacts' or $controller == 'about' or $controller == 'cart'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/header+nav+article.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/footer.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/contacts-pageStyle.css')?>" />
		<?php }else if($controller == 'terms'){?>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/header+nav+article.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/footer.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/delivery-paymentStyle.css')?>" />
		<?php }?>
		<script src="<?php echo site_url('assets/js/jquery-3.1.0.min.js')?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBAyPPoq7m0vQpsndWbrzhmqWd6_Q2s9sw"></script>
		<script type="text/javascript">
			
			
			function initialize() {
				var myLatlng = new google.maps.LatLng(43.24923995860254,26.573455710485412);
				var mapOptions = {
				  zoom: 18,
				  center: myLatlng,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById('gmap_canvas'), mapOptions);

				//=====Initialise Default Marker    
				var marker = new google.maps.Marker({
				  position: myLatlng,
				  map: map,
				  title: 'marker'
				//=====You can even customize the icons here
				});

				//=====Initialise InfoWindow
				var infowindow = new google.maps.InfoWindow({
				content: "<strong>AddressMap </strong><br>Bulgaria, Targovishte, Vasil Levski 19<br>"
				});

				//=====Eventlistener for InfoWindow
				google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
				});
			}

				google.maps.event.addDomListener(window, 'load', initialize);
			
			</script>
			
			<script type="text/javascript" >
				
				function addToCart(item_id){
					
					// var item_id = $(this).data('id');
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('cart/addToCart')?>/"+item_id,
						dataType: 'json',
						jsonp : "callback",
						async: true,
						cache: false, 
						success: function( result ) {
							console.log(result);
							$('#cart_total').text(result.cart_total+' лв.');
						}
					});
				}
				
				$(document).on('click', '.add', function(){
					
					var item_id = $(this).data('id');
					console.log(item_id);
					addToCart(item_id);
					
				});
				
				$(document).ready(function(){
					
				});
				
			</script>
	</head>
	
	<body>
		
		<div class="wrapper">
		
			<div class="header">
				<div id="Logo">
					<a href="<?php echo site_url()?>">
						<h3>Онлайн магазин за модно дамско облекло</h3>
						<p>ELIKA</p>
					</a>
				</div>
				<div class="list">
					<ul>
						<li id="work-time">
							0878 64 19 68<br/>
							понеделник - петък: 10:00 - 19:00<br/>
							събота: 10:00 - 17:00
						</li>
						<li id="basket">
							
							<span>
								<p>
									<a href="<?echo site_url('cart')?>">Пазарска кошница</a>
									<span  id="cart_total" ><?php echo $cart_total?> лв.</span>
								</p>
							</span>
						</li>
					</ul>
				</div>
			</div>
			
			<nav>
			
				<ul>
				<?php
				foreach($whole_tree as $cat){
					if(!empty($cat['childs'])){
						$item_cat = 'clothes';
						if($cat['id'] == 2){
								$item_cat = 'accesoirs';
						}
						
						echo '<li><a href="'.site_url('products/'.$item_cat).'">'.mb_strtoupper($cat['title']).'</a><ul>';
						foreach($cat['childs'] as $child){
							
							echo '<li><a href="'.site_url('products/'.$item_cat.'/'.$child['id']).'">'.$child['title'].'</a></li>';
						}
						echo '</ul></li>';
					}
				}
				?>
				<!--
					<li><a href="#">ДРЕХИ</a>
						<ul>
							<li><a href="#">Дънки</a></li>
							<li><a href="#">Панталони</a></li>
							<li><a href="#">Блузи и топове</a></li>
							<li><a href="#">Ризи</a></li>
							<li><a href="#">Поли</a></li>
							<li><a href="#">Якета</a></li>
							<li><a href="#">Сака</a></li>
						</ul>
					</li>
					<li><a href="#">АКСЕСОАРИ</a>
						<ul>
							<li><a href="#">Чанти</a></li>
							<li><a href="#">Шалове</a></li>
						</ul>
					</li>
				-->
					<li><a href="<?php echo site_url('contacts')?>">КОНТАКТИ</a></li>
					<!--<li><a href="#">ПОРЪЧКА</a></li>-->
					<li><a href="<?php echo site_url('terms')?>">ДОСТАВКА И ПЛАЩАНЕ</a></li>
					<li><a href="<?php echo site_url('about')?>">ЗА НАС</a></li>
				</ul>
			</nav>