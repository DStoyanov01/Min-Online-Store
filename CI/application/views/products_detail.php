<?php include 'header.php';?>

			<article>
				<div id="discount">
					<a href="#">
						<p>ПРОМОЦИИ</p>
						<div>
							<img src="<?php echo site_url('assets/images/discount1.png')?>" />
							<img src="<?php echo site_url('assets/images/discount2.png')?>" />
							<img src="<?php echo site_url('assets/images/discount3.png')?>" />
							<img src="<?php echo site_url('assets/images/discount4.png')?>" />
						</div>
					</a>
				</div>
				<div id="free-delivery">
					<p>БЕЗПЛАТНА ДОСТАВКА</p>
					<img src="<?php echo site_url('assets/images/free-delivery.png')?>" />
					<text>При покупка над 50лв</text>
				</div>
				<div>
					<p>АДРЕС</p>
					<h2 id="addres">
						Магазин "ЕЛИКА"
						гр. Търговище
						ул. Васил Левски 23 / до ГУМ /
					</h2>	
				</div>
				<div style='overflow:hidden;height:250px;width:100%;'>
					<div id='gmap_canvas' style='height:250px;width:100%;'></div>
					<div>
						<small><a href="http://embedgooglemaps.com">embed google maps</a></small>
					</div>
					<div>
						<small><a href="https://privacypolicygenerator.info">privacy policy generator</a></small>
					</div>
					<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
				</div>
			</article>
			
			<content>
				<br/>
				<br/>
				<h2><?php echo $item['title']?></h2>
				<div class="pic">
					<img src="<?php echo site_url('assets/images/products/'.$item['category_id'].'/item_'.$item['id'].'.jpg')?>" />
				</div>
				<div class="info">
					<fieldset>
						<legend>Информация:</legend>
						<text>Артикул №: <?php echo $item['id']?></text>
						<p>Състав:</p>
						<text>98% памук ; 2% ликра</text>
						<p>Информация: </p>
						<span>Дамски  дънки от състарен  деним с родео ефект  - модел бойфренд .Тези дамски дънки сe  закопчават с цип, имат щампирани цветя, отдолу са разръфани.</span>
						<p>Произход: </p>
						<text>Турция</text>
					</fieldset>
					
					<form name="order-item" method="" action="">
						<p>Размер: </p>
						<select name="size">
							<option value="XS">XS</option>
							<option value="S">S</option>
							<option value="M">M</option>
							<option value="L">L</option>
						</select>
						<p>Количество:</p>
						<input type="number" min="0" max="99" step="1" value="1"/><br/><br/>
						<h3>Цена: <?php echo number_format($item['price'], 2, ',', ' ')?> лв.</h3>
						<button type="submit">Добави в кошницата</button>
					</form>
					
				</div>
			</content>	
					
			<footer>
				<?php include 'footer.php'?>
			</footer>
			
			<script type='text/javascript'> <!-- m a p -->
				function init_map()
				{
					var myOptions = {
						zoom:18,
						center:new google.maps.LatLng(43.24923995860254,26.573455710485412),
						mapTypeId: google.maps.MapTypeId.ROADMAP
						};
					map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
					marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(43.24923995860254,26.573455710485412)});
					infowindow = new google.maps.InfoWindow({content:'<strong>AddressMap </strong><br>Bulgaria, Targovishte, Vasil Levski 19<br>'});
					google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
					infowindow.open(map,marker);
				}
				google.maps.event.addDomListener(window, 'load', init_map);
			</script>
		</div>
	</body>
</html>		