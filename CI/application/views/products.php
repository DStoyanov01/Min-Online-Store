
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
				<div style="overflow:hidden;height:250px;width:100%;">
					<div id="gmap_canvas" style="height:250px;width:100%;"></div>
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
				<p style="margin-left: 25%;font-size: 2.5em; font-family: calibri;"><?php echo $main_category['title']?></p>
				<div class="jeans">
				<?php
					foreach($items as $item){
						echo '
					<div>
						<a href="'.site_url('products/detailView/'.$item['id']).'"/><img src="'.site_url('assets/images/products/'.$item['category_id'].'/item_'.$item['id'].'.jpg').'" /></a>
						<p id="jeans-name">'.$item['title'].'</p>
						<p id="price">'.number_format($item['price'], 2, ',', ' ').' лв.</p>
						<a class="add" href="javascript:;" data-id="'.$item['id'].'">Добави в кошницата</a>
					</div>';
					}
				?>
				
				</div>
			</content>
			
			<footer>
				<?php include 'footer.php';?>
			</footer>
			
			
			
		
			
			
		</div>
		
	</body>
</html>	