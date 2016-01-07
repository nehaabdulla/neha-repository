<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
	}

	public function index()
	{
		$this->load->helper('url');
		
		$this->load->view('index');
	}


	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login1');

	}
	
	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function insertreg()
	{
		if(isset($_POST['sub']))
		{
			$this->load->model('Welcome_model');
			$this->Welcome_model->insert($_POST);
			$this->load->view('index1');
		}
		else
		{
		$this->load->view('register');
		}
	}

	public function insertcat()
	{
		
		if(isset($_POST['sub']))
		{
			$this->load->model('Welcome_model');
			$this->Welcome_model->insertcategory($_POST);
			$this->load->view('category');
		}
		
	}

	public function loginuser()
	{
		$this->load->model('Welcome_model');
		$this->Welcome_model->login();
	}

	public function admin()
	{
		$this->load->view('adminhome');
	}

	public function category()
	{
		$this->load->view('category');
	}
	
	public function products()
	{
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->productselectcat();
		$data['subcategory']=$this->Welcome_model->productselectcat();
		$this->load->view('products',$data);
	}

	public function insertpro()
	{
		if(isset($_POST['sub']))
		{
			$data['category']=$this->Welcome_model->productselectcat();
			$data['subcategory']=$this->Welcome_model->productselectcat();
			$this->load->model('Welcome_model');
			$this->Welcome_model->insertproduct($_POST);
			$this->load->view('products',$data);
		}
		else
		{
			$this->load->view('products');
		}
	}
	
	public function subcop()
	{
		$this->load->model('welcome_model');
		$data['subcat']=$this->Welcome_model->select_subc($_POST);
		$this->load->view('subcatdisp',$data);
	}
	
	public function selectcategory()
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

	public function viewcategory()
	{
		$this->load->model('welcome_model');
		$data['viewcat']=$this->Welcome_model->viewcategory();
		$this->load->view('viewcategory',$data);
	}

	public function viewsubcategory()
	{
		$this->load->model('Welcome_model');
		$data['category']=$this->Welcome_model->selectcategory();
		$this->load->view('viewsub',$data);
	}
	
	public function viewtblsub()
	{
		$this->load->model('Welcome_model');
	    $data['subcategory']=$this->Welcome_model->onchangesub();
	    $this->load->view('viewsubselect',$data);
	}

	public function viewproducts()
	{
		$this->load->model('welcome_model');
		$data['subcat']=$this->Welcome_model->viewpro($_POST);
		$this->load->view('subcatdisp',$data);
	}
	
	public function viewprod()
	{
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->viewcategory();
		$this->load->view('viewproduct',$data);
	}

	public function viewtblpro()
	{
		$this->load->model('Welcome_model');
	    $data['products']=$this->Welcome_model->subproviews($_POST);
	    $this->load->view('productview',$data);
	}

	public function editcat()
	{
		$this->load->model('welcome_model');
		$data['viewcat']=$this->Welcome_model->viewcategory();
		$this->load->view('editcategory',$data);
	}
	
	public function edit()
	{
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->editcateg($_POST);
		$this->load->view('editbutton',$data);
	}

	public function updatecat()
	{
		$this->load->model('welcome_model');
		$this->Welcome_model->editbtncat($_POST);
	}

	public function delete()
	{
		$this->load->model('welcome_model');
		$this->Welcome_model->delcat();

	}

	public function editsubcat()
	{
		$this->load->model('Welcome_model');
		$data['category']=$this->Welcome_model->selectcategory();
		$this->load->view('editsub',$data);
	} 

	public function editsub()
	{
		$this->load->model('welcome_model');
		$data['category']=$this->Welcome_model->editsubcat($_POST);
		$this->load->view('editbutton',$data);

	}

	public function updatesub()
	{
		$this->load->model('welcome_model');
		$this->Welcome_model->editbtnsub($_POST);

	}

}

