<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->helper('url','form');
	}

	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->helper('url');
		
		$this->load->view('index');
	}


	

	public function login()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('login1');

	}
	
	public function about()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('about');
	}

	public function contact()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('contact');
	}

	public function insertreg()
	{
		header('Access-Control-Allow-Origin: *');
		if(isset($_POST['submt']))
		{
			$this->load->model('Welcome_model');
			$this->Welcome_model->insert($_POST);
			$this->load->view('homepage');
		}
		else
		{
		$this->load->view('register');
		}
	}

	public function insertcat()
	{
		header('Access-Control-Allow-Origin: *');
		if(isset($_POST['sub']))
		{
			$this->load->model('Welcome_model');
			$this->Welcome_model->insertcategory($_POST);
			$this->load->view('category');
		}
		
	}

	public function loginuser()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Welcome_model');
		$this->Welcome_model->login();
	}

	public function admin()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('adminhome');
	}

	public function category()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->view('category');
		}
		else
		{
			$this->load->view('index');
		}
		
	}
	
	public function products()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['category']=$this->Welcome_model->productselectcat();
			$data['subcategory']=$this->Welcome_model->productselectcat();
			$this->load->view('products',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}

	public function insertpro()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", 
		'max_height' => "768",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());


		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('products', $error);
		}		
	
		if(isset($_POST['submitt']))
		{
			
			$this->Welcome_model->insertproduct($_POST);
			$this->load->view('products');
		}
	}
	else
	{
		$this->load->view('index');
	}
		

	}
	 
	
	
	
	public function subcop()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['subcat']=$this->Welcome_model->select_subc($_POST);
		$this->load->view('subcatdisp',$data);
	}
	
	public function selectcategory()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
		if(isset($_POST['sub']))
		{
			$this->load->model('Welcome_model');
			$this->Welcome_model->insertsubcat();
			$data['category']=$this->Welcome_model->selectcategory();
			$this->load->view('subcategory',$data);
		}
		else
		{
			$data['category']=$this->Welcome_model->selectcategory();
			$this->load->view('subcategory',$data);
		} 
		}
		else
		{
			$this->load->view('index');
		}
	}

	public function viewcategory()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['viewcat']=$this->Welcome_model->viewcategory();
			$this->load->view('viewcategory',$data);
		}
		else
		{
			$this->load->view('index');
		}

		
	}

	public function viewsubcategory()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('Welcome_model');
			$data['category']=$this->Welcome_model->selectcategory();
			$this->load->view('viewsub',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}	
	
	public function viewtblsub()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Welcome_model');
	    $data['subcategory']=$this->Welcome_model->onchangesub();
	    $this->load->view('viewsubselect',$data);
	}

	public function viewproducts()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['subcat']=$this->Welcome_model->viewpro($_POST);
		$this->load->view('subcatdisp',$data);
	}
	
	public function viewprod()
	{

		header('Access-Control-Allow-Origin: *');

		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['category']=$this->Welcome_model->viewcategory();
			$this->load->view('viewproduct',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}

	public function viewtblpro()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Welcome_model');
	    $data['products']=$this->Welcome_model->subproviews($_POST);
	    $this->load->view('productview',$data);
	}

	public function editcat()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['viewcat']=$this->Welcome_model->viewcategory();
			$this->load->view('editcategory',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}
	
	public function edit()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->editcateg($_POST);
		$this->load->view('editbutton',$data);
	}

	public function updatecat()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$this->Welcome_model->editbtncat($_POST);
	}

	public function delete()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$this->Welcome_model->delcat();

	}

	public function editsubcat()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('Welcome_model');
			$data['category']=$this->Welcome_model->selectcategory();
			$this->load->view('editsub',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	} 

	public function editsub()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->editsubcat($_POST);
		$this->load->view('editbutton',$data);

	}

	public function updatesub()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$this->Welcome_model->editbtnsub($_POST);

	}

	public function deletesubcategory()
	{
		header('Access-Control-Allow-Origin: *');
		$this->Welcome_model-> m_delsubcategory();
	}

	

	public function editproduct()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('Welcome_model');
			$data['category']=$this->Welcome_model->viewcategory();
			$this->load->view('editproducts',$data);
		}
		else
		{
			$this->load->view('index');		
		}
		
	}
	
	public function productsedit()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['products']=$this->Welcome_model->editpro($_POST);
		$this->load->view('productview',$data);
	}

	public function updateproduct()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$this->Welcome_model->editbtnpro();

	}

	public function delproduct()
	{
		header('Access-Control-Allow-Origin: *');
		$this->Welcome_model-> m_delproduct();
	}

	public function viewcusto()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['viewcust']=$this->Welcome_model->viewcustomer();
			$this->load->view('viewcustomer',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}

	public function suspendcusto()
	{
		header('Access-Control-Allow-Origin: *');
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$data['suspendcust']=$this->Welcome_model->viewcus();
			$this->load->view('suspendcustomer',$data);
		}
		else
		{
			$this->load->view('index');
		}
		
	}

	public function onclicksuspend()
	{
		header('Access-Control-Allow-Origin: *');
	
		$ses=$this->session->userdata();
		if(isset($ses['id']))
		{
			$this->load->model('welcome_model');
			$this->Welcome_model->suspendcust();
			$this->load->view('suspendcustomer',$data);
		}
		else
		{
			$this->load->view('index');
		}

		
	}

	public function showcustcat()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['custcat']=$this->Welcome_model->customercat();
		$this->load->view('showcategory',$data);

	}

	public function showcustsubs()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['subcatss']=$this->Welcome_model->customersub($_POST);
		$this->load->view('subcatencode',$data);
	}
	public function showproductpic()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['picss']=$this->Welcome_model->prodpic($_POST);
		$this->load->view('picsencode',$data);
	}

	public function purchaseproduct()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['pro']=$this->Welcome_model->purchased($_POST);
		$this->load->view('purchaseencode',$data);
	}

	public function detailofproducts()
	{
		header('Access-Control-Allow-Origin: *');
	
		$this->load->model('welcome_model');
		$data['details']=$this->Welcome_model->purchasedet($_POST);
		$this->load->view('purchaseddetails',$data);
	}
	
	public function logout()
	{
		header('Access-Control-Allow-Origin: *');
		$this->session->unset_userdata('$sess');
		session_destroy();
		redirect();
	}

	public function blank()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->view('a');
	}
	public function proddisplay()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['detaied']=$this->Welcome_model->showallprods();
		$this->load->view('allprodencode',$data);
	}
	public function preview1()
	{
		header('Access-Control-Allow-Origin: *');
		$dat['id']=$this->input->post('a');
		$dat['name']=$this->input->post('b');
		$dat['price']=$this->input->post('c');
		$dat['desc']=$this->input->post('d');
		$dat['img']=$this->input->post('e');
		$dat['quantity']=$this->input->post('f');
		
       

		$this->load->view('preview',$dat);
	}

	public function showdetails()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('welcome_model');
		$data['pd']=$this->Welcome_model->viewproductdesc();
		$this->load->view('descencode',$data);
       //print_r($data);
	}
}

