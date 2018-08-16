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
				
			</article>
			
			<content>
				<div id="map" style="overflow:hidden;height:250px;width:86%;">
					<div id='gmap_canvas' style='height:250px;width:100%;'></div>
					<div>
						<small><a href="http://embedgooglemaps.com">embed google maps</a></small>
					</div>
					<div>
						<small><a href="https://privacypolicygenerator.info">privacy policy generator</a></small>
					</div>
					<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
				</div>
				<div id="info">
					<h2>Данни за Контакти</h2>
					<p>гр. Търговище<br/>
						ул. "Васил Левски" №23<br/>
						<br/>
						тел. 0878180376 и 0878641968
					</p>
					<h3>Форма за контакт</h3>
					<form action="MAILTO:someone@example.com" method="post" enctype="text/plain">
						Име:<br>
						<input type="text" name="name" placeholder="Вашето име"><br>
						Имейл:<br>
						<input type="text" name="mail" placeholder="Вашият имейл"><br>
						Коментар:<br>
						<textarea rows="5" cols="60" placeholder="Вашето запитване/коментар"></textarea><br><br>
						<input type="submit" value="Изпрати запитване">
						<input type="reset" value="Изчисти данните">
					</form>
				</div>
			</content>
			<footer class="after">
				<?php include 'footer.php'?>
			</footer>
			
		</div>
	</body>
</html>	