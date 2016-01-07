<?php
class Welcome_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	function insert() 
	{
		$data=array
		(
			'fnm'=>$this->input->post('fname'),
			'lnm'=>$this->input->post('lname'),
			'addrs'=>$this->input->post('address'),
			'mbnum'=>$this->input->post('mno'),
			'email'=>$this->input->post('email'),
			'pasword'=>$this->input->post('pass')
			);
		
		$this->db->query("call csp_reg_log(?,?,?,?,?,?)",$data);
	}

	function login()
	{
		$data['vchr_email']=$this->input->post('email');
		$data['vchr_password']=$this->input->post('pass');
		$this->db->select('*');
		$this->db->from('tbl_login');
		$where=$this->db->where($data);
		$query=$this->db->get();
		if($query->result()==NULL)
		{
			echo "invalid username or password";
		}
		else
		{
		foreach($query->result() as $row){
		
			$role=$row->fk_int_user_role_id;
			if($role==2)
			{
				$this->load->view('homepage');
			}
			else 
			{
			$this->load->view('adminhome');
			}
		}

		}

	}
	
	function insertcategory()
	{
		$data['vchr_cat_name']=$this->input->post('cat');
		$this->db->query("call csp_insert_category(?)",$data);
	}

	function selectcategory()
	{
		$query=$this->db->query('select * from tbl_category');
		return $query->result();
	}

	function insertsubcat()
	{
		$data=array(
			'vchr_sub_name'=>$this->input->post('subcat'),
			'fk_int_cat_id'=>$this->input->post('fk_int_cat_id')	
		);
		$this->db->query("call csp_insert_sub_category(?,?)",$data);
	}

	function insertproduct()
	{
		$data=array(
			'vchr_product_name'=>$this->input->post('productname'),
			'int_price'=>$this->input->post('price'),
			'vchr_desc'=>$this->input->post('desc'),
			'int_quantity'=>$this->input->post('quan'),
			'fk_int_sub_id'=>$this->input->post('sel2'),
		);
		$this->db->query("call csp_insert_product(?,?,?,?,?)",$data);
	}

	function productselectcat()
	{
		$query=$this->db->query('select * from tbl_category');
		return $query->result();
		$q=$this->db->query('select * from tbl_sub_category  ');
	 	return $q->result();
	}

	function select_subc()
	{
		$data['fk_int_cat_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}

	function viewcategory()
	{
		$query=$this->db->query('select * from tbl_category');
		return $query->result();
	}

	function viewsub()
	{
		$query=$this->db->query('select * from tbl_sub_category');
		return $query->result();
	}

	function onchangesub()
	{
		$data['fk_int_cat_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}

	function viewpro()
	{
		$data['fk_int_cat_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}
	
	function subproviews()
	{
		$data['fk_int_sub_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_product');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}

	function editcateg()
	{
		$data['pk_int_cat_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}
	
	function editbtncat()
	{
		$data['cat']=$this->input->post('didd');
		$data['name']=$this->input->post('cat'); 
		// echo $this->input->post('didd');

		$this->db->query('call csp_update_category(?,?)',$data);
	}

	function delcat()
	{
		$data['pk_int_cat_id']=$this->input->post('name');
		$this->db->query('call csp_delete_category(?)',$data);
		// $this->db->delete('tbl_category');
		// $where=$this->db->where($data);
		//echo "success";
	}

	function editsubcat()
	{
		$data['pk_int_sub_id']=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$where=$this->db->where($data);
		$query=$this->db->get();
		return $query->result();
	}
	
	function editbtnsub()
	{
		$data['cat']=$this->input->post('did');
		$data['name']=$this->input->post('subcat'); 
		// echo $this->input->post('didd');

		$this->db->query('call csp_update_sub_category(?,?)',$data);
	}


	
	
}

