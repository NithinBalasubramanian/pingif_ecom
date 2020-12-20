<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('email');
        $this->load->library('email');
    }
	public function index()
	{
		// if($this->session->userdata('user_vendor_id')){
			if($this->session->userdata('id')){
			$this->load->view('vendor/index');
		}else{
			$this->load->view('vendor/login');
		}
    }
    public function View_front($foldername,$filename,$edit_id=FALSE)
	{
		if($edit_id != FALSE)
		{
			$data['edit_id']=$edit_id;
			$this->load->view('admin/'.$foldername.'/'.$filename.'',$data);
		}
		else{
			$this->load->view('admin/'.$foldername.'/'.$filename);
		}
	}
	public function View_vendor($foldername,$filename,$edit_id=FALSE)
	{
		if($this->session->userdata('id')){
			if($edit_id != FALSE)
			{
				$data['edit_id']=$edit_id;
				$this->load->view('vendor/'.$foldername.'/'.$filename.'',$data);
			}
			else{
				$this->load->view('vendor/'.$foldername.'/'.$filename);
			}
		}else{
			redirect('vendor');
		}
	}
	public function Add_product_vendor($tablename,$folder,$pagename,$nextpage)
	{
		$data=array();
		if($_FILES["img"]["name"]){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
            $config['upload_path']='./assets/vendor/img/products'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('img')) {
               $error = array('error' => $this->upload->display_errors());
            } 
            else {
                $data = array('img' => $this->upload->data());
			}
			$data['img']=$imgname;
		}
        $files = $_FILES;
        $images = array();
        $cpt = count($_FILES['sub_images']['name']);
            for($i=0; $i<$cpt; $i++){
            $fileExt = pathinfo($_FILES["sub_images"]["name"][$i], PATHINFO_EXTENSION);
            $_FILES['userfile']['name']= time().'_'.$i.'_sub.'.$fileExt;
            $_FILES['userfile']['type']= $files['sub_images']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['sub_images']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['sub_images']['error'][$i];
            $_FILES['userfile']['size']= $files['sub_images']['size'][$i];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $images[] = $_FILES['userfile']['name'];
        }
        $fileName = implode(',',$images);
        $data['sub_images']=$fileName;
        $data['primary_color']=$this->input->post('primary_color');
		$data['category_id']=$this->input->post('category_id');
        $data['brand_id']=$this->input->post('brand_id');
		$data['sub_category_id']=$this->input->post('sub_category_id');
		$data['product']=$this->input->post('product');
		$data['tags']=$this->input->post('tags');
		$data['model']=$this->input->post('model');
		$data['quantity']=$this->input->post('quantity');
		$data['price']=$this->input->post('price');
		$data['discount']=$this->input->post('discount');
		$data['final_price']=$this->input->post('final_price');
		$data['description']=$this->input->post('description');
		$data['status']='0';
		$data['todays_deal']='0';
		$data['express']='0';
        $data['date']=date("d-m-Y");
		$data['product_by']='vendor';
		$ven_data=$this->session->userdata('user_vendor_id');
		$data['added_by']=$ven_data['user_id'];
		$product_id=$this->Admin_model->create('products',$data);
		$data1=array();
		$colors=$this->input->post('color');
		for($i=0;$i<count($colors);$i++){
			$data1['color']=$colors[$i];
			$data1['product_id']=$product_id;
			if($_FILES["sub_img"]["name"][$i]){
				$fileExt = pathinfo($_FILES["sub_img"]["name"][$i], PATHINFO_EXTENSION);
				$imgname_sub=time().'_a.'.$fileExt;
					$config['upload_path']='./assets/vendor/img/sub_products'; 
					$config['allowed_types']='png|jpg|jpeg';
					$config['encrypt_name']=FALSE;
					$config['file_name']=$imgname;
					$this->load->library('upload',$config);
					if (!$this->upload->do_upload('img')) {
					   $error = array('error' => $this->upload->display_errors());
					} 
					else {
						$data = array('img' => $this->upload->data());
					}
					$data1['sub_img']=$imgname_sub;
				}
				$this->Admin_model->create('product_sub',$data1);
		}
		redirect('View_vendor/'.$folder.'/'.$pagename.'');
	}
    public function set_upload_options()
    {
        $config = array();
        $config['upload_path']='./assets/vendor/img/sub_products'; 
        $config['allowed_types']='png|jpg|jpeg';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }
	public function vendor_register()
	{
		$this->load->helper('string');
		$vendor_id=random_string('alnum',6);
		$data_detail=array();
		$data_ven=array();
		$data_detail['vendor_id']=$vendor_id;
		$data_ven['vendor_id']=$vendor_id;
		$data_detail['f_name']=$this->input->post('fname');
		$data_detail['l_name']=$this->input->post('lname');
		$data_ven['name']=$this->input->post('fname');
		$data_detail['contact']=$this->input->post('contact');
		$data_detail['sec_contact']=$this->input->post('sec_contact');
		$data_detail['email']=$this->input->post('email');
		$data_ven['email']=$this->input->post('email');
		$data_ven['password']=sha1($this->input->post('password'));
		$data_detail['com_name']=$this->input->post('com_name');
		$data_detail['off_contact']=$this->input->post('off_contact');
		$data_detail['description']=$this->input->post('description');
		$data_detail['registration_num']=$this->input->post('registration_num');
		$data_detail['agree']=$this->input->post('agree');
		$fileExt = pathinfo($_FILES["trade"]["name"], PATHINFO_EXTENSION);
		$tradename=time().'_doc.'.$fileExt;
            $config['upload_path']='./assets/vendor/uploads'; 
            $config['allowed_types']='png|jpg|jpeg|doc|docx|pdf';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$tradename;
            $this->load->library('upload',$config);
            $this->upload->do_upload('trade');
			$data_detail['trade']=$tradename;
		$fileExt1 = pathinfo($_FILES["id"]["name"], PATHINFO_EXTENSION);
		$idname=time().'_doc1.'.$fileExt1;
			$config['upload_path']='./assets/vendor/uploads'; 
			$config['allowed_types']='png|jpg|jpeg|doc|docx|pdf';
			$config['encrypt_name']=FALSE;
			$config['file_name']=$idname;
			$this->load->library('upload',$config);
			$this->upload->do_upload('id');
			$data_detail['national_id']=$idname;
		$fileExt2 = pathinfo($_FILES["tax"]["name"], PATHINFO_EXTENSION);
		$taxname=time().'_doc2.'.$fileExt2;
			$config['upload_path']='./assets/vendor/uploads'; 
			$config['allowed_types']='png|jpg|jpeg|doc|docx|pdf';
			$config['encrypt_name']=FALSE;
			$config['file_name']=$taxname;
			$this->load->library('upload',$config);
			$this->upload->do_upload('tax');
			$data_detail['tax_certificate']=$taxname;
			$data_ven['verify']='0';
			$data_ven['date_created']=date('Y-m-d');
			$vendor_detail_id = $this->Admin_model->create('vendor_details',$data_detail);
			$data_ven['vendor_detail_id']=$vendor_detail_id;
			$insert = $this->Admin_model->create('vendor',$data_ven);
			if($insert){
				$this->session->set_flashdata("msg_pos","Register Successfully Please Wait for Veification.");
				redirect('View/front/vendor_login');
			}else{
				redirect('View/front/vendor_register');
			}
			
	}
	
	public function vendor_login()
	{
		$email = $this->input->post('user_name');
		
		$password = $this->input->post('password');
		$check = $this->Admin_model->table_column('shop','user_name',$email,'password',$password);
		if(count($check) > 0)
		{
			foreach($check as $row)
			{

				$this->session->set_userdata('id',$row['id']);
				$this->session->set_userdata('type','shop');
				redirect('vendor/index');
			}
		}
			else{
				$this->session->set_flashdata('msg','Incorrect Email or Password');
				redirect('vendor/index');
			}
		
	}
	public function vendor_reset($folder=FALSE,$file=FALSE)
	{
		$email=$this->input->post('email');
		$val_check=$this->Admin_model->table_column('vendor','email',$email);
		if(count($val_check) > 0){
			foreach($val_check as $row){
				$where['id']=$row['id'];
				$name=$row['name'];
				$this->load->helper('string');
				$verify_otp=random_string('alnum',6);
				$data['password']=$verify_otp;
				$this->Admin_model->edit('vendor',$data,$where);
				$url=''.base_url().'View/front/vendor_reset_pass/'.$verify_otp.'';
				$subject="Reset Account Link";
			$from_email ="nithinmigo1@gmail.com";
			$to_email = $email;
			//Load email library
	        $email_config = Array(
			    'smtp_crypto'=>'ssl', //add this one
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'nithinmigo1@gmail.com',
				'smtp_pass' => '711015Nithin@1',
				'mailtype'  => 'html',
				'starttls'  => true,
				'newline'   => "\r\n",
				'charset' => 'utf-8',
				'wordwrap' => TRUE,
				
			);
			
			$message='<h1>'.$url.'</h1>';
			$this->load->library('email', $email_config);
			$this->email->set_newline("\r\n");
			
			// $this->email->initialize($config);
            $this->email->from('nithinmigo1@gmail.com','nithin');
            $this->email->to($to_email); 
            $this->email->subject($subject);

           $this->email->message($message);  
			//Send mail
		//Send mail
			if($this->email->send()){
				$this->session->set_flashdata("msg_pos"," Email Send Successfully.");
			}else{
				$this->session->set_flashdata("msg","Error to send Email.");
			}
				redirect('View/front/vendor_login');
			}
		}else{
			$this->session->set_flashdata('msg','Email is not registered');
			redirect('View/'.$folder.'/'.$file.'');
		}
	}
	public function vendor_reset_pass($folder=FALSE,$page=FALSE)
	{
		$password=sha1($this->input->post('password'));
		$old_pass=$this->input->post('o_password');
		$val_check=$this->Admin_model->table_column('vendor','password',$old_pass);
		if(count($val_check) > 0){
			foreach($val_check as $row){
				$where['id']=$row['id'];
				$data['password']=$password;
				$this->Admin_model->edit('vendor',$data,$where);
				$this->session->set_flashdata("msg_pos","Password changed Successfully.");
				redirect('View/front/vendor_login');
			}
		}
	}
	public function logout()
	{
		// $this->session->unset_userdata('user_vendor_id');
		$this->session->unset_userdata('id');
		redirect('vendor/index');
	}
	public function Edit_product_vendor($tablename,$folder,$edit_id,$pagename,$nextpage)
	{
		$where['id']=$edit_id;
		if($_FILES["img"]["name"]){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
            $config['upload_path']='./assets/vendor/img/products'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('img')) {
               $error = array('error' => $this->upload->display_errors());
            } 
            else {
                $data = array('img' => $this->upload->data());
			}
			$data['img']=$imgname;
		}
		$data['category_id']=$this->input->post('category_id');
		$data['sub_category_id']=$this->input->post('sub_category_id');
		$data['product']=$this->input->post('product');
		$data['tags']=$this->input->post('tags');
		$data['model']=$this->input->post('model');
		$data['quantity']=$this->input->post('quantity');
		$data['price']=$this->input->post('price');
		$data['discount']=$this->input->post('discount');
		$data['final_price']=$this->input->post('final_price');
		$data['description']=$this->input->post('description');
		$data['status']='1';
		$data['todays_deal']='0';
		$data['express']='0';
		// $data['product_by']='admin';
		// $data['added_by']=$this->session->userdata('user_id');
		$edit=$this->Admin_model->edit('products',$data,$where);
		if(isset($edit)){
			redirect('View_vendor/'.$folder.'/'.$pagename.'');
		}
		else{
			redirect('View_vendor/'.$folder.'/'.$pagename.'');
		}
	}
	public function Delete($tablename,$foldername,$filename,$delete_id)
	{
		$where['id']=$delete_id;
		$insert=$this->Admin_model->delete($tablename,$delete_id);
		if(isset($insert))
		{
			redirect('View_vendor/'.$foldername.'/'.$filename);
		}
		else{
			redirect('View_vendor/'.$foldername.'/'.$filename);
		}
	}
    public function sub_cat()
	{
		$category=$this->input->post('category');
		$output='';
		$output.='<option>Select Sub Category</option>';
		$val=$this->Admin_model->table_column('sub_category','category_id',$category);
		foreach($val as $val_row){
			$output.='<option value='.$val_row['id'].'>'.$val_row['sub_category'].'</option>';
		}
		echo $output;
	}
    public function brand()
    {
        $brand = $this->input->post('brand');
        $output='';
        $output.='<option>Select Brand</option>';
        $val = $this->Admin_model->table_column('brands','category_id',$brand);
        foreach($val as $row)
        {
            $output.='<option value='.$row['id'].'>'.$row['brands'].'</option>';
        }
        echo $output;
	}
	public function Insert_Vendor($tablename, $folder, $current_page, $page)
	{
		if($_FILES["img"]["name"] != ''){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
		
            $config['upload_path']='./assets/admin/img'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
			$this->load->library('upload',$config);
			$this->upload->do_upload('img');
		}
			// if($_FILES["banner1"]["name"] !=''){
			// $fileExt = pathinfo($_FILES["banner1"]["name"], PATHINFO_EXTENSION);
			// $imgname=time().'_a.'.$fileExt;
			// 	$config['upload_path']='./assets/admin/img/category'; 
			// 	$config['allowed_types']='png|jpg|jpeg';
			// 	$config['encrypt_name']=FALSE;
			// 	$config['file_name']=$imgname;
			// 	$this->load->library('upload',$config);
			// 	$this->upload->do_upload('banner1');
			// }
			// if($_FILES["banner2"]["name"] !=''){
			// 	$fileExt = pathinfo($_FILES["banner2"]["name"], PATHINFO_EXTENSION);
			// 	$imgname1=time().'_a1.'.$fileExt;
			// 		$config['upload_path']='./assets/admin/img/category'; 
			// 		$config['allowed_types']='png|jpg|jpeg';
			// 		$config['encrypt_name']=FALSE;
			// 		$config['file_name']=$imgname1;
			// 		$this->load->library('upload',$config);
			// 		$this->upload->do_upload('banner2');
			// 	}
			// if($tablename == 'shop')
			// {
			// 	$this->load->helper('string');
			// 	$user_id = random_string('alnum,8');
			// 	$check = 'TRUE';
			// 	while($check == 'TRUE')
			// 	{
			// 		$val = $this->Admin_model->table_column('shop','user_id',$user_id);
			// 		if(count($val) > 0)
			// 		{
			// 			$user_id = random_string('alnum,8');
			// 		}
			// 		else{
			// 			$check == 'FALSE';
			// 		}
			// 	}
			// }
				$customer_id  = $this->session->userdata('id');
				$shop_id = $this->session->userdata('id');
		$columns = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if($columns[$i]!="id")
						{
						   if($columns[$i]=="date_created") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}
							else if($columns[$i]=="customer_id")
							{
								$cus = $customer_id;
								$data[$columns[$i]] = $cus;
							}
							else if($columns[$i]=="shop_id")
							{
								$shop = $shop_id;
								$data[$columns[$i]] = $shop;
							}
							else if($columns[$i]=="status"||$columns[$i]=="verify")  {
								$data[$columns[$i]] = '1';
							}
							else if($columns[$i] == "img"){
								$img = $imgname;
								$data[$columns[$i]] = $img;
							}
							// else if($columns[$i] == "banner1"){
							// 	$img=$imgname;
							// 	$data[$columns[$i]] = $img;
							// }
							// else if($columns[$i]=="banner2"){
							// 	$img1=$imgname1;
							// 	$data[$columns[$i]] = $img1;
							// }
							// else if($columns[$i]=="user_id"){
							// 	$user = $user_id;
							// 	$data[$columns[$i]]=$user;
							// }
							else {
							$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
					// if($this->input->post('password')){
					//     $data['password']=sha1($this->input->post('password'));
					// }
					$insert = $this->Admin_model->create($tablename,$data);
					if(isset($insert)){
						redirect('View_vendor/'.$folder.'/'.$page.'');
					} else {
						redirect('View_vendor/'.$folder.'/'.$current_page.'');
					}
	}
	public function del()
	{
		
		$id = $this->input->post('id');
		$tablename = $this->input->post('table');
		$where['id']=$this->input->post('id');
		$ins = $this->Admin_model->table_column($tablename,'id',$id);
			foreach($ins as $row)
			{
				$status = $row['status'];
				
				if($status == '1')
				{
					$data['status']=0;
				}
				else{
					$data['status']=1;
				}
			}
		$this->Admin_model->edit($tablename,$data,$where);
	}
	public function per_delete()
	{
		$id = $this->input->post('id');
		$tablename = $this->input->post('table');
		$this->Admin_model->delete($tablename,$id);
	}
	public function Update_all($tablename, $folder, $edit_id, $current_page, $page)
        {
			if($_FILES["img"]["name"] != ''){
				$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
				$imgname=time().'_a.'.$fileExt;
				$config['upload_path']='./assets/admin/img'; 
				$config['allowed_types']='png|jpg|jpeg';
				$config['encrypt_name']=FALSE;
				$config['file_name']=$imgname;
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('img')) {
				$error = array('error' => $this->upload->display_errors());
				} 
				else {
					$data = array('img' => $this->upload->data());
				}
			}

			// if($_FILES["banner1"]["name"]){
			// 	$fileExt = pathinfo($_FILES["banner1"]["name"], PATHINFO_EXTENSION);
			// 	$imgname=time().'_a.'.$fileExt;
			// 		$config['upload_path']='./assets/admin/img/category'; 
			// 		$config['allowed_types']='png|jpg|jpeg';
			// 		$config['encrypt_name']=FALSE;
			// 		$config['file_name']=$imgname;
			// 		$this->load->library('upload',$config);
			// 		$this->upload->do_upload('banner1');
			// 	}
			// if($_FILES["banner2"]["name"]){
			// 		$fileExt = pathinfo($_FILES["banner2"]["name"], PATHINFO_EXTENSION);
			// 		$imgname1=time().'_a1.'.$fileExt;
			// 			$config['upload_path']='./assets/admin/img/category'; 
			// 			$config['allowed_types']='png|jpg|jpeg';
			// 			$config['encrypt_name']=FALSE;
			// 			$config['file_name']=$imgname1;
			// 			$this->load->library('upload',$config);
			// 			$this->upload->do_upload('banner2');
			// 		}
			// $data=array(
			// 	'img'=>$imgname,
			// );
			// $where['id']=$edit_id;
			// $this->Admin_model->edit('shop',$data,$where);

			$where = array();
					$columns = $fields['columns'] = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if(($columns[$i]!="id")&&($columns[$i]!="status")&&($columns[$i]!="date_created")&&($columns[$i]!="customer_id"))
						{
							if($columns[$i]=="date_modified") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}else if($columns[$i] == "img"){
								if($_FILES["img"]["name"]){
								$img = $imgname;
								$data[$columns[$i]] = $img;
								}
							}
							else if($columns[$i] == "banner1"){
								if($_FILES["banner1"]["name"]){
									$img=$imgname;
									$data[$columns[$i]] = $img;
								}
							}
							else if($columns[$i] == "banner2"){
								if($_FILES["banner2"]["name"]){
									$img1=$imgname1;
									$data[$columns[$i]] = $img1;
								}
							}
							 else{
								$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
				
				
						$where['id'] = $edit_id;
						$update_all = $this->Admin_model->edit($tablename,$data,$where);
					
					
					if(isset($update_all)){
						redirect('View_vendor/'.$folder.'/'.$page.'');
					} else {
						redirect('View_vendor/'.$folder.'/'.$current_page.'');
					}
		}
		public function category()
		{
			$output="";
			$category_id = $this->input->post('category_id');
			$cat = $this->Admin_model->table_column('shop_sub_category','category_id',$category_id);
			$output.='<option>Select Sub Category</option>';
			if(count($cat) > 0)
			{
				foreach($cat as $row)
				{
					$output.='<option value="'.$row['id'].'">'.$row['sub_category'].'</option>';
				}
			}
			echo $output;
		}
		
		public function customer_no()
		{
			$data=array();
			$cus_no = $this->input->post('id');
			$no = $this->Admin_model->table_column('shop_cus','id',$cus_no);
			if(count($no) > 0)
			{
				foreach($no as $row)
				{
					$data['contact'] = $row['contact'];
				}
			}
			echo json_encode($data);
		}
		public function rate()
		{
			$data=array();
			$pro = $this->input->post('id');
			$rate = $this->Admin_model->table_column('shop_products','id',$pro);
			if(count($rate) > 0)
			{
				foreach($rate as $row)
				{
					$data['sell_price'] = $row['sell_price'];
				}
			}
			echo json_encode($data);
		}
		public function supplier_no()
		{
			$output="";
			$sup_no = $this->input->post('sup_no');
			$user_id = $this->session->userdata('id');
			$ins = $this->Admin_model->table_column_like('supplier','contact',$sup_no,'customer_id',$user_id);
			if(count($ins) > 0)
			{
				$output.='<option>'.count($ins).' Results Found</option>';
				foreach($ins as $ins_row)
				{
					$output.='<option value="'.$ins_row['id'].'">'.$ins_row['name'].'</option>';
				}
			}
			else{
				$output.='No Results Found';
			}
			echo $output;
		}
		public function cus_invoice()
		{
			$output="";
			$cus_id = $this->input->post('id');
			$user_id = $this->session->userdata('id');
			$cus = $this->Admin_model->table_column_like('shop_cus','contact',$cus_id,'customer_id',$user_id);
			if(count($cus) > 0)
			{
				$output.='<option>'.count($cus).' Results Found</option>';
				foreach($cus as $cus_row)
				{
					$output.='<option value="'.$cus_row['id'].'">'.$cus_row['name'].'</option>';
				}
			}
			else{
				$output.='<option>No Results Found</option>';
			}
			echo $output;
		}
		public function suplier_name()
		{
			$data=array();
			$sup_name = $this->input->post('sup_name');
			$ins = $this->Admin_model->table_column('supplier','id',$sup_name);
			if(count($ins) > 0)
			{
				foreach($ins as $row)
				{
					$data['contact'] = $row['contact'];
				}
			}
			echo json_encode($data);
		}
		public function pro_search()
		{
			$output="";
			$search = $this->input->post('search');
			$user_id = $this->session->userdata('id');
			$ins = $this->Admin_model->table_column_like('shop_products','product',$search,'customer_id',$user_id);
			if(count($ins) > 0)
			{
				$output.='<option>'.count($ins).'Records Found</option>';
				foreach($ins as $row)
				{
					$output.='<option value="'.$row['id'].'">'.$row['product'].'</option>';
				}
			}
			else{
				$output.="<option>No Records Found</option>";
			}
			echo $output;
		}
		public function pro_rate()
		{
			$data=array();
			$pro = $this->input->post('pro');
			$rate = $this->Admin_model->table_column('shop_products','id',$pro);
			if(count($rate) > 0)
			{
				foreach($rate as $row)
				{
					$data['rate'] = $row['sell_price'];
				}
			}
			echo json_encode($data);
		}
		public function supplier_invoice($folder,$file)
		{
			$shop_id = $this->session->userdata('id');
			$invoice_no = $this->input->post('invoice_no');
			$date = $this->input->post('date');
			$data=array(
				'grand_total' => $this->input->post('grand_total'),
				'payment_type'=> $this->input->post('payment_type'),
				'delivery_type'=>$this->input->post('delivery_type'),
				'shop_id'=>$shop_id,
				'invoice_no'=>$invoice_no,
				'date'=>$date,
			);
			$supplier = $this->input->post('supplier');
			
			if($this->input->post('supplier')=='new')
			{
				$data_sup=array(
					'contact'=>$this->input->post('contact'),
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'address'=>$this->input->post('address'),
					'customer_id'=>$shop_id,
					'status'=>'1',
				);
				$sup_id = $this->Admin_model->create('supplier',$data_sup);
				$data['sup_id'] = $sup_id;
			}
			else{
				$data['sup_id']=$this->input->post('supplier_id');
			}
			$product = $this->input->post('product');
			$rate = $this->input->post('rate');
			$qua = $this->input->post('qua');
			$total = $this->input->post('total');
			for($i=0;$i<count($rate);$i++)
			{
				$data_sup=array(
					'product_id'=>$product[$i],
					'rate'=>$rate[$i],
					'qua'=>$qua[$i],
					'total'=>$total[$i],
					'invoice_no'=>$invoice_no,
				);
				
				$this->Admin_model->create('shop_suplier_data',$data_sup);
			}
			$this->Admin_model->create('shop_suplier_invoice',$data);
			redirect('Vendor/bill/'.$folder.'/purchase_bill/'.$invoice_no.'');
		}
		public function bill($folder,$file,$invoice_no)
		{
			$data=array();
			$data['invoice']=$invoice_no;
			$this->load->view('vendor/'.$folder.'/'.$file.'',$data);
		}
		public function invoice_add($folder,$file)
		{
			$invoice_no = $this->input->post('invoice_no');
			$date = $this->input->post('date');
			$user_id = $this->session->userdata('id');
		
			$data=array(
				'invoice_no'=>$invoice_no,
				'date'=>$date,
				'emp_id'=>$this->input->post('emp_id'),
				
				'grand_total'=>$this->input->post('grand_total'),
				'payment_type'=>$this->input->post('payment_type'),
				'delivary_type'=>$this->input->post('delivary_type'),
				'shop_id'=>$user_id,
			);
			$customer = $this->input->post('customer');
			if($this->input->post('customer')=='new'){
				$data_cus=array(
					'name'=>$this->input->post('name'),
					'contact'=>$this->input->post('contact'),
					'email'=>$this->input->post('email'),
					'address'=>$this->input->post('address'),
					'customer_id'=>$user_id,
				);
				$new_cus = $this->Admin_model->create('shop_cus',$data_cus);
				$data['cus_id'] = $new_cus;
			}
			else{
				$data['cus_id'] = $this->input->post('cus_id');
		
			}
			$product_id = $this->input->post('product_id');
			$rate =$this->input->post('rate');
			$qua =$this->input->post('qua');
			$total =$this->input->post('total');
				for($i=0;$i<count($qua);$i++)
				{
					$data_pres=array(
					'product_id'=>$product_id[$i],
					'rate'=>$rate[$i],
					'qua'=>$qua[$i],
					'total'=>$total[$i],
					'invoice_no'=>$invoice_no,
					'customer_id'=>$user_id,
				);
				$this->Admin_model->create('shop_invoice_data',$data_pres);
				}
				$this->Admin_model->create('shop_invoice',$data);
				$shop_id = $this->session->userdata('id');
				$print = $this->Admin_model->table_column('invoice_type','shop_id',$shop_id);
				
				if(count($print) >0)
				{
					foreach($print as $row_print)
					{
						if($row_print['invoice_type'] == '1')
						{
							redirect('Vendor/bill/'.$folder.'/invoice_bill/'.$invoice_no.'');
						}
						if($row_print['invoice_type'] == '2')
						{
							redirect('Vendor/bill/'.$folder.'/pos_invoice/'.$invoice_no.'');
						}
					}
				}
				else{
				redirect('Vendor/bill/'.$folder.'/invoice_bill/'.$invoice_no.'');
				}
		}
		public function Update_Image($tablename,$folder,$id,$page,$current_page)
		{
			$where['id']=$id;
			if($_FILES["img"]["name"] != ''){
				$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
				$imgname=time().'_a.'.$fileExt;
				$config['upload_path']='./assets/admin/img'; 
				$config['allowed_types']='png|jpg|jpeg';
				$config['encrypt_name']=FALSE;
				$config['file_name']=$imgname;
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('img')) {
				$error = array('error' => $this->upload->display_errors());
				} 
				else {
					$data = array('img' => $this->upload->data());
				}
			}
			$data=array(
				'img'=>$imgname,
			);
			$ins = $this->Admin_model->edit($tablename,$data,$where);
			if(isset($ins))
			{
				redirect('View_vendor/'.$folder.'/'.$page);
			}
			else{
				redirect('View_vendor/'.$folder.'/'.$current_page);
			}
		}
		public function img_cross()
		{
			
			$where['id'] = $this->input->post('id');
			$tablename = $this->input->post('table');
			$data['img']='';
			$this->Admin_model->edit($tablename,$data,$where);

		}
		public function Edit_setting_vendor($tablename,$foldername,$filename)
		{
			$where['id'] = '1';
				$shop_id = $this->session->userdata('id');
					$columns = $fields['columns'] = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if(($columns[$i]!="id")&&($columns[$i]!="status")&&($columns[$i]!="date_created")&&($columns[$i]!="shop_id"))
						{
							if($columns[$i]=="date_modified") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							} else{
								$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
		        $insert = $this->Admin_model->edit($tablename,$data,$where);
		        if(isset($insert))
		        {
		            redirect('View_vendor/'.$foldername.'/'.$filename.'');
		        }
		        else{
		            redirect('View_vendor/'.$foldername.'/'.$filename.'');
		        }
		}
		public function invoice_report()
		{
			echo "hii"; exit;
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$tablename=$this->input->post('table');
			$shop_id = $this->session->userdata('id');
			$output='';
			$ins = $this->Admin_model->invoice_select($tablename,$from,$to,'shop_id',$shop_id);
			if(count($ins) > 0)
			{ $i=1;
				foreach($ins as $row)
				{
				$output.='<tr>';
                  $output.='<td>'.$i.'</td>
                    <td>'.$row['invoice_no'].'</td>
                    <td>'.$row['date'].'</td>
                    <td>'.$row['grand_total'].'</td>
                    <td><a href="'.base_url().'Vendor/bill/invoice/invoice_bill/'.$row['invoice_no'].'" class="btn btn-sm btn-success">View Bill</a>
                    <a href="'.base_url().'Vendor/bill/invoice/pos_invoice/'.$row['invoice_no'].'" class="btn btn-sm btn-primary">POS Bill</a></td>
                </tr>';
			$i++;	}
			}
		echo $output;
		}
}
?>