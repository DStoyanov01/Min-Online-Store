
<?php include 'header.php';?>
			<content>
				<div class="slideshow-container">
					<div class="mySlides fade">
						<img src="<?php echo site_url('assets/images/home/slide/IMG_3446.JPG')?>">
					</div>                     
					<div class="mySlides fade">
						<img src="<?php echo site_url('assets/images/home/slide/IMG_3445.JPG')?>">
					</div>                     
					<div class="mySlides fade">
						<img src="<?php echo site_url('assets/images/home/slide/IMG_3439.JPG')?>">
					</div>                     
					<div class="mySlides fade">
						<img src="<?php echo site_url('assets/images/home/slide/IMG_3441.JPG')?>">
					</div>                     
					<div class="mySlides fade">
						<img src="<?php echo site_url('assets/images/home/slide/IMG_3438.JPG')?>">
					</div>

					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
					  
					<div style="text-align:center">
						<span class="dot" onclick="currentSlide(1)"></span> 
						<span class="dot" onclick="currentSlide(2)"></span> 
						<span class="dot" onclick="currentSlide(3)"></span>
						<span class="dot" onclick="currentSlide(4)"></span> 
						<span class="dot" onclick="currentSlide(5)"></span> 
					</div>
				</div>
				<br>

				<span class="addvertisment">
					<img src="<?php echo site_url('assets/images/home/addvertisment/add1.jpg')?>" />
					<img src="<?php echo site_url('assets/images/home/addvertisment/add2.jpg')?>" />
				</span>
				<br/>
				<div class="buttons">
					<div id="tshirts">
						<a href="<?php echo site_url('products/clothes/10')?>">
							<img src="<?php echo site_url('assets/images/home/tshirts.jpg')?>" />
							<p>още Тениски</p>
						</a>
					</div>
					<div id="jeans">
						<a href="<?php echo site_url('products/clothes/7')?>">
							<img src="<?php echo site_url('assets/images/home/jeans.jpg')?>" />
							<p>още Дънки</p>
						</a>
					</div>
					<div id="shirts">
						<a href="<?php echo site_url('products/clothes/11')?>">
							<img src="<?php echo site_url('assets/images/home/shirts.jpg')?>" />
							<p>още Ризи</p>
						</a>
					</div>
					<div id="skirts">
						<a href="<?php echo site_url('products/clothes/12')?>">
							<img src="<?php echo site_url('assets/images/home/skirts.jpg')?>" />
							<p>още Поли</p>
						</a>
					</div>
					<div id="jackets">
						<a href="<?php echo site_url('products/clothes/15')?>">
							<img src="<?php echo site_url('assets/images/home/jackets.jpg')?>" />
							<p>още Якета</p>
						</a>
					</div>
					<div id="bags">
						<a href="<?php echo site_url('products/accesoirs/9')?>">
							<img src="<?php echo site_url('assets/images/home/bags.jpg')?>" />
							<p>още Чанти</p>
						</a>
					</div>
				</div>
				<div class="size-table">
					<br/>
					<br/>
					<br/>
					<p>Таблица с размерите на предлаганите от нас артикули:</p>
					<br \>
					<table>
						<tr>
							<th>РАЗМЕР</th>
							<th>XS</th>
							<th>S</th>
							<th>M</th>
							<th>L</th>
							<th>XL</th>
							<th>XXL</th>
						</tr>
						<tr>
							<td>ГРЪДНА ОБИКОЛКА</td>
							<td>78 - 82 СМ</td>
							<td>83 - 86 СМ</td>
							<td>87 - 90 СМ</td>
							<td>91 - 94 СМ</td>
							<td>95 - 100 СМ</td>
							<td>101 - 105 СМ</td>
						</tr>
						<tr>
							<td>ТАЛИЯ</td>
							<td>60 -64 СМ</td>
							<td>65 - 68 СМ</td>
							<td>69 - 72 СМ</td>
							<td>73 - 76 СМ</td>
							<td>77 - 80 СМ</td>
							<td>81 - 84 СМ</td>
						</tr>
						<tr>
							<td>НИСКА ТАЛИЯ</td>
							<td>80 - 84 СМ</td>
							<td>85 - 89 СМ</td>
							<td>90 - 94 СМ</td>
							<td>95 - 99 СМ</td>
							<td>100 - 105 СМ</td>
							<td>106 - 110 СМ</td>
						</tr>
						<tr>
							<td>ХАНШ</td>
							<td>85 - 90 СМ</td>
							<td>90 - 95 СМ</td>
							<td>96 - 99 СМ</td>
							<td>100 - 104 СМ</td>
							<td>105 - 110 СМ</td>
							<td>111 - 116 СМ</td>
						</tr>
					</table>
				</div>
			</content>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			
			
			<footer>
				<?php include 'footer.php';?>
			</footer>
		</div>
		
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1} 
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none"; 
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block"; 
			  dots[slideIndex-1].className += " active";
			}
		</script>
		
		
	</body>
</html>