<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Category_manager');
		$this->load->model('Product_manager');
		$this->load->helper('url_helper');
		$this->load->library('cart');
		
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['cart_items'] = $this->cart->contents();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
	}
	
	public function index()
	{
		
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['cart_items'] = $this->cart->contents();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
		$this->load->view('cart', $this->data);
	}
	
	function addToCart($id, $qty = 1){
		
		$ajax_result['success'] = false;
		
		// взимаме продукт
		$item = $this->Product_manager->getOneArr($id);
		if($item){
			// масив който ще се вкара в количката
			$data = array(
				'id'      => $item['id'],
				'qty'     => $qty,
				'price'   => floatval($item['price']),
				'name'    => $item['title']
			);
			
			// взимаме съдържанието на количката
			$cart_content = $this->cart->contents();
			// проверяваме дали не е празно
			if(empty($cart_content)){
				// добавяме продукта в количката
				$this->cart->insert($data);
			}else{
				// проверяваме дали този продукт вече не е добавен в количката
				$update = false;
				foreach($cart_content as $cart_item){
					if($cart_item['id'] == $item['id']){
						$data = array(
							'rowid' => $cart_item['rowid'],
							'qty'   => $cart_item['qty']+$qty
						);
						$update = true;
						break;
					}
				}
				
				// ако продукта е добавен в количката обновяваме количката
				if($update){
					$this->cart->update($data);
				}else{
					$this->cart->insert($data);
				}
			}
			
			// връщаме резултата към view-то
			$ajax_result['success'] = true;
			$ajax_result['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		}
		
		// AJAX
		if($this->input->is_ajax_request()){
			error_reporting (0);
			echo json_encode($ajax_result);
		}
		else{
			echo 'NON AJAX MODE :<br /><br /><pre>';
			print_r($ajax_result);
			echo '</pre>';
		}	
	}
	
	function updateCart(){
		
		$this->cart->update($_POST);
		
		redirect('cart');
	}
	
	function sendOrder(){
		
		$this->load->helper(array('form', 'url'));

      $this->load->library('form_validation');
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Име',
				'rules' => 'required'
			),
			array(
				'field' => 'family',
				'label' => 'Фамилия',
				'rules' => 'required'
			),
			array(
				'field' => 'phone',
				'label' => 'Телефон',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('cart', $this->data);
			// redirect('cart');
		}
		else
		{
			// извикване на библиотеката за email
			$this->load->library('email');
			
			// получаване на параметрите изпратени по POST
			$mail   = $this->input->post('mail', true);
			$name   = $this->input->post('name', true);
			$family = $this->input->post('family', true);
			$phone  = $this->input->post('phone', true);
			
			// изграждане на съдържанието на email-а описвайки поръчаните артикули
			$mail_message = '
			<table>
				<tr>
					<th>Количество</th>
					<th>Име на артикула</th>
					<th style="text-align:right">Единична Цена</th>
					<th style="text-align:right">Общо</th>
				</tr>
			';
			
			foreach ($this->cart->contents() as $items){
				$mail_message .='
				<tr>
					<td>'.$items['qty'].'</td>
					<td>'.$items['name'].'</td>
					<td>'.$items['price'].'</td>
					<td>'.$items['subtotal'].'</td>
				</tr>
				';
			}
			
			$mail_message .= '
				<tr>
					<td colspan="2"> </td>
					<td class="right"><strong>Total</strong></td>
					<td class="right">'.$this->cart->format_number($this->cart->total(), 2, '.', ' ').'</td>
				</tr>
			</table>
			';
			
			// конфигуриране на email-а
			$config['mailtype'] = 'html';
			
			// инициализиране на email-а
			$this->email->initialize($config);
			
			// попълване на данните за изпращача и получателя
			$this->email->from($mail, $name.' '.$family);
			$this->email->to('taner.ahmedov84@gmail.com');
			
			// попълване на заглавието и съдържанието на email-а
			$this->email->subject('Поръчка');
			$this->email->message($mail_message);
			
			// изпращане на email-а
			$this->email->send();
			
			// изтриване на количката.
			$this->cart->destroy();
			
			$this->load->library('session');
			
			// поздравително съобщени.
			$this->session->set_flashdata('message', 'Вашата поръчка е изпратена успешно');
			
			redirect('cart');
			// $this->load->view('cart', $this->data);
		}
	}
}
