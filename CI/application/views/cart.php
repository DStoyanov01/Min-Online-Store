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
				<h1>Количка</h1>
				
				<?php if(!empty($this->cart->contents())){?>
				
				<?php $this->load->helper('form');?>
				<?php echo form_open('cart/updateCart'); ?>

				<table style="width:100%" border="0">

				<tr>
						  <th>Кличество</th>
						  <th>Име на Продукта</th>
						  <th style="text-align:right">Единична Цена</th>
						  <th style="text-align:right">Общо</th>
				</tr>

				<?php $i = 1; ?>

				<?php foreach ($this->cart->contents() as $items): ?>

						  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

						  <tr>
									 <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
									 <td>
												<?php echo $items['name']; ?>

												<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

														  <p>
																	 <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

																				<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

																	 <?php endforeach; ?>
														  </p>

												<?php endif; ?>

									 </td>
									 <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?> лв.</td>
									 <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?> лв.</td>
						  </tr>

				<?php $i++; ?>

				<?php endforeach; ?>

				<tr>
						  <td colspan="2"> </td>
						  <td class="right"><strong>Total</strong></td>
						  <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?> лв.</td>
				</tr>

				</table>

				<p><?php echo form_submit('', 'Обнови Количката'); ?></p>
				
			<?php echo form_close()?>
			
			<?php echo form_open('cart/sendOrder');?>
			<table style="width: 100%">
				<tr>
					<td>*Име</td>
					<td><?php echo form_error('name'); ?><?php echo form_input(array('name' => 'name', 'value' => set_value('name'))); ?></td>
				</tr>
				<tr>
					<td>*Фамилия</td>
					<td><?php echo form_error('family'); ?><?php echo form_input(array('name' => 'family', 'value' => set_value('family'))); ?></td>
				</tr>
				<tr>
					<td>*Телефон</td>
					<td><?php echo form_error('phone'); ?><?php echo form_input(array('name' => 'phone', 'value' => set_value('phone'))); ?></td>
				</tr>
				<tr>
					<td>*Email</td>
					<td><?php echo form_error('email'); ?><?php echo form_input(array('name' => 'email', 'value' => set_value('email'))); ?></td>
				</tr>
			</table>
			
			<p><?php echo form_submit('', 'Изпрати Поръчката'); ?></p>
			
			<?php echo form_close()?>
				
			<?php 
				}else if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}else{
					echo 'Киличката е празна';
				}
			?>
				
			</content>
			<footer class="after">
				<?php include 'footer.php'?>
			</footer>
			
		</div>
	</body>
</html>	