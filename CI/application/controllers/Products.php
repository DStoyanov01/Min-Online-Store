<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_manager');
		$this->load->model('Product_manager');
		$this->load->helper('url_helper');
		$this->load->library('cart');
	}

	public function index(){
		
		redirect('products/clothes', 'location', 301);
	}
	
	function clothes($cat_id = 7){
		
		
		$items = $this->Product_manager->getByCategory($cat_id);
		$this->data['main_category'] = $this->Category_manager->getById($cat_id);
		$this->data['items'] = $items;
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
		$this->load->view('products', $this->data);
	}
	
	function accesoirs($cat_id = 9){
		
		$items = $this->Product_manager->getByCategory($cat_id);
		$this->data['main_category'] = $this->Category_manager->getById($cat_id);
		$this->data['items'] = $items;
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
		$this->load->view('products', $this->data);
	}
	
	function detailView($id=0){
		if($id == 0){
			redirect('404');
		}
		
		// $this->data['main_category'] = $this->Category_manager->getById($cat_id);
		$this->data['controller'] = $this->router->fetch_class();
		$this->data['whole_tree'] = $this->Category_manager->getWholeTree();
		$this->data['item'] = $this->Product_manager->getOneArr($id);
		$this->data['cart_total'] = number_format($this->cart->total(), 2, '.', ' ');
		
		$this->load->view('products_detail', $this->data);
	}
	
	function add(){
		
		$data['categories'] = $this->Category_manager->getSecondaryCategories();
		// echo'<pre>';
		// var_dump($data['base_categories']);
		// echo'<pre>';
		// exit();
		$this->load->view('add_product', $data);
	}
	
	public function insertOne(){
		
		// echo'<pre>';
		// print_r($_POST);
		// echo'<pre>';
		// exit();
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('category_id', 'Category id', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->add();
			// $this->load->view('add_category');
		}
		else
		{
			$id = $this->Product_manager->insertOne($_POST);
			
			if($id != false){
				// success
				$this->load->view('form_success');
			}else{
				// fail
				$data['categories'] = $this->Category_manager->getSecondaryCategories();
				$this->load->view('add_product', $data);
			}
		}
	}
	
	public function view($cat_id){
		
		$data['drehi'] = $this->Category_manager->getByParentId(1);
		$data['chanti'] = $this->Category_manager->getByParentId(2);
		$data['items'] = $this->Product_manager->getByCategory($cat_id);
		$current_cat_arr = $this->Category_manager->getById($cat_id);
		$data['title'] = $current_cat_arr['title'];
		
		$this->load->view('cat_items', $data);
	}
	
	function insertToDB(){
		exit('allready executed');
		$products = array(
			7 => array(
				array(
					'title' => 'Дамски дънки 13217',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 3216',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 250',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки Z 1315',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 5158',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 5138',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 16F50',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 16F60',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки JK 227',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки ГАРДЪН',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки Т 9022',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 9045',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки H220',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 8022',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки Н330',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 6766',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки А 2589',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки Т 902',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки YS 063',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки DR 254',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки DA 566',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 6668',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки 5637',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки VF 613',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки ZV 101',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки С 12043',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки Y040',
					'price' => rand(28,40)
				),
				array(
					'title' => 'Дамски дънки СТРАТФОРД',
					'price' => rand(28,40)
				)
			),
			8 => array(
				array(
					'title' => 'Дамски панталон 5010',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 3052',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 3696',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон СКАЙ 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон СКАЙ',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон моника',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон моника',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон A-3',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон 2935',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон лайф',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Дамски панталон лайф',
					'price' => rand(20,40)
				),
			),
			10 => array(
				array(
					'title' => 'Дамска блуза ТАНИНА',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза КАПРИ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза РЕЙНА',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза МАРВИН',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза ДЕНИЗ А-2',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза АДМИРАЛ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза БЮТИФЪЛ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза ЛОНДОН B-1',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза БЕЛВЮ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза ВИОЛА',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза 5050',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза ФЕНСИ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза РОДЕО',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Блуза МАРГАРЕТ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза БУТИКА',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза ФЛАУЪР',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза КУУЛ',
					'price' => rand(10,30)
				),
				array(
					'title' => 'Дамска блуза КАПРИ',
					'price' => rand(10,30)
				),
			),
			11 => array(
				array(
					'title' => 'Дамска риза ТОМИ B-11',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза АЛЕКСА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза АЛЕКСА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза АЛЕКСА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза ФРЕНД зелена',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза АЛЕКСИС1',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза АЙЛИН А-3',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза БЕЛЛА А-7',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза ЛАУРА В-7',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза БЕЛЛА А-2',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза БЕТИ Д - 00',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза КАНДИ А-5',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза ЛАУРА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза СТОУН',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза КАРИЗМА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза ДЕНС',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза РАМОНА',
					'price' => rand(10,40)
				),
				array(
					'title' => 'Дамска риза ДЕНДИ',
					'price' => rand(10,40)
				),
			),
			12 => array(
				array(
					'title' => 'Права пола МАРГАРЕТ',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола права 1300',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола права 1300',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола БАЛИЗА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола БАЛИЗА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола ФИОРЕ А-1',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола ФЛАЙ А-1',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола ЛЕЙЛА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола МАЙРА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола ЖАДОРЕ 14576',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола МЕЛИНДА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Права пола РОМА',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола МИКАЕЛА А-2',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола ЛАМАЯ',
					'price' => rand(20,40)
				),
				array(
					'title' => 'Пола ШЕЛИ',
					'price' => rand(20,40)
				),
			),
			13 => array(
				array(
					'title' => 'Сако с удължен гръб 1200 ПЕТРОЛ Б - 11',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако МОНТЕ КАРЛО',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако МОНТЕ КАРЛО',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако БАЛИЗА',
					'price' => rand(30,40)
				),
				array(
					'title' => 'ДДамско сако R БАЛИЗА',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ФИОРЕ А -2',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако БАЛИЗА марсала',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ВАЛЕРИЯ А-6',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ВАЛЕРИЯ А -4',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ВАЛЕРИЯ А -3',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ВИОЛЕТА В-1',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ЛЕО А - 1',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ЛЕО А - 1',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако МАРИНА А - 1',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако МАРИНА А - 2',
					'price' => rand(30,40)
				),
				array(
					'title' => 'Дамско сако ФЕЕРИЯ',
					'price' => rand(30,40)
				),
			),
			15 => array(
				array(
					'title' => 'Дамско яке 556',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 556',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 556',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 556',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 15707',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 15705',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке D 229',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Дамско яке 1273 каки',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Яке ЛАДОННА',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Яке ЛАДОННА',
					'price' => rand(45,55)
				),
				array(
					'title' => 'Яке ЛАДОННА',
					'price' => rand(45,55)
				),
			),
			9 => array(
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта МИЛАНО',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F 1029',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F 1029',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта клъч РАМОНА',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта БРИЗ',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта 9046 - 2',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта 1291',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F296',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F8066',
					'price' => rand(20,45)
				),
				array(
					'title' => 'Чанта F8066',
					'price' => rand(20,45)
				),
			),
			14 => array(
				array(
					'title' => 'Шал КАСИ',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал СОФИ',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал ДЕНДИ',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал 1205',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал - яка 03',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал 02 А',
					'price' => rand(5,15)
				),
				array(
					'title' => 'Шал 01 B',
					'price' => rand(5,15)
				),
			)
		);
		
		$images = array();
		
		foreach($products as $key=>$value){
			foreach($value as $rec){
				$insert_arr = array(
					'category_id' => $key,
					'title' => $rec['title'],
					'description' => $rec['title'],
					'price' => $rec['price'],
					'old_price' => round($rec['price']+($rec['price']*0.5)),
				);
				
				$id = $this->Product_manager->insertOne($insert_arr);
				
				$images[$key][] = $id;
			}
		}
		
		echo '<pre>';
		print_r($images);
		echo '</pre>';
		exit();
	}
}