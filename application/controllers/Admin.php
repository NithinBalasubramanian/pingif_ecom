

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$this->load->view('front/index');
    }
    public function View($foldername,$file)
    {
        $this->load->view($foldername.'/'.$file);
	}
	public function administration()
	{
		if($this->session->userdata('user_id')){
			$this->load->view('admin/index');
		}else{
			$this->load->view('admin/login');
		}
	}
	public function View_admin($foldername,$filename,$edit_id=FALSE)
	{
		if($this->session->userdata('user_id')){
		if($edit_id != FALSE)
		{
			$data['edit_id']=$edit_id;
			$this->load->view('admin/'.$foldername.'/'.$filename.'',$data);
		}
		else{
			$this->load->view('admin/'.$foldername.'/'.$filename);
		}
		}else{
			redirect('admin/administration');
		}
	}
	public function login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$val_check=$this->Admin_model->table_column('admin','email',$email,'password',$password);
		if(count($val_check)>0){
			foreach($val_check as $row){
				$this->session->set_userdata('user_id',$row['id']);
				redirect('admin/administration');
			}
		}else{
			$this->session->set_flashdata('msg','Incorrect Email or Password');
			redirect('admin/administration');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect('admin/administration');
	}
	public function add_product_admin($tablename,$folder,$pagename,$nextpage)
	{
		$data=array();
		if($_FILES["img"]["name"]){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
            $config['upload_path']='./assets/admin/img/products'; 
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
		$data['sub_category_id']=$this->input->post('sub_category_id');
        $data['brand_id']=$this->input->post('brand_id');
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
        $data['date']=date("d-m-Y");
		$data['product_by']='admin';
		$data['added_by']=$this->session->userdata('user_id');
		$product_id=$this->Admin_model->create('products',$data);
		$data1=array();
		$colors_count=$this->input->post('color_count');
		$check = $this->input->post('check');
		if($check != 0){
		for($j=0;$j<=$colors_count;$j++){
			$color=$this->input->post('color_'.$j.'');
			$data1['color']=$color;
			$data1['product_id']=$product_id;
			$files_1 = $_FILES;
        	$color_images = array();
        	$col_cpt = count($_FILES['sub_img_'.$j.'']['name']);
            for($i=0; $i<$col_cpt; $i++){
            $fileExt = pathinfo($_FILES['sub_img_'.$j.'']['name'][$i], PATHINFO_EXTENSION);
            $_FILES['userfile']['name']= time().'_'.$i.'_'.$j.'_sub.'.$fileExt;
            $_FILES['userfile']['type']= $files_1['sub_img_'.$j.'']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files_1['sub_img_'.$j.'']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files_1['sub_img_'.$j.'']['error'][$i];
            $_FILES['userfile']['size']= $files_1['sub_img_'.$j.'']['size'][$i];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $color_images[] = $_FILES['userfile']['name'];
        }
        	$color_images = implode(',',$color_images);
			$data1['sub_img']=$color_images;
			$this->Admin_model->create('product_sub',$data1);
		}
		}
		redirect('View_admin/'.$folder.'/'.$pagename.'');
	}
	public function upload_color_img($filename)
	{
		$imgname_sub=time().'_'.$_FILES[$filename]["name"];
		$config['upload_path']='./assets/admin/img/sub_products'; 
		$config['allowed_types']='png|jpg|jpeg';
		$config['encrypt_name']=FALSE;
		$config['file_name']=$imgname_sub;
		$this->load->library('upload',$config);
		$this->upload->do_upload($filename);
		return $this->upload->data();
	}
    public function set_upload_options()
    {
        $config = array();
        $config['upload_path']='./assets/admin/img/sub_products'; 
        $config['allowed_types']='png|jpg|jpeg';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
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
	public function Insert($tablename, $folder, $current_page, $page)
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
				
		$columns = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if($columns[$i]!="id")
						{
						   if($columns[$i]=="date_created") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}
							else if($columns[$i]=="status"||$columns[$i]=="verify")  {
								$data[$columns[$i]] = '1';
							}
							else if($columns[$i] == "img"){
								$img = $imgname;
								$data[$columns[$i]] = $img;
							}
							else if($columns[$i] == "banner1"){
								$img=$imgname;
								$data[$columns[$i]] = $img;
							}
							else if($columns[$i]=="banner2"){
								$img1=$imgname1;
								$data[$columns[$i]] = $img1;
							}
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
						redirect('View_admin/'.$folder.'/'.$page.'');
					} else {
						redirect('View_admin/'.$folder.'/'.$current_page.'');
					}
	}
	public function status()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$status=$row['status'];
			if($status == 1)
			{
				$data['status'] = 0;
				$where['id'] = $id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			if($status == 0 || $status == '')
			{
				$data['status'] = 1;
				$where['id']=$id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
		}
	}
	public function verify()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$verify=$row['verify'];
			if($verify == 1)
			{
				$data['verify'] = 0;
				$where['id'] = $id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			if($verify == 0)
			{
				$data['verify'] = 1;
				$where['id']=$id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			echo json_encode($data);
		}
	}
	public function express()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$express=$row['express'];
			if($express == 1)
			{
				$data['express'] = 0;
				$where['id'] = $id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			if($express == 0)
			{
				$data['express'] = 1;
				$where['id']=$id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
		}
	}
	public function today()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$todays_deal=$row['todays_deal'];
			if($todays_deal == 1)
			{
				$data['todays_deal'] = 0;
				$where['id'] = $id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			if($todays_deal == 0)
			{
				$data['todays_deal'] = 1;
				$where['id']=$id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
		}
	}
	public function Delete($tablename,$foldername,$filename,$delete_id)
	{
		$where['id']=$delete_id;
		$insert=$this->Admin_model->delete($tablename,$delete_id);
		if(isset($insert))
		{
			redirect('View_admin/'.$foldername.'/'.$filename);
		}
		else{
			redirect('View_admin/'.$foldername.'/'.$filename);
		}
	}
	public function Update_all($tablename, $folder, $edit_id, $current_page, $page)
        {
			if($_FILES["img"]["name"]){
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

			if($_FILES["banner1"]["name"]){
				$fileExt = pathinfo($_FILES["banner1"]["name"], PATHINFO_EXTENSION);
				$imgname=time().'_a.'.$fileExt;
					$config['upload_path']='./assets/admin/img/category'; 
					$config['allowed_types']='png|jpg|jpeg';
					$config['encrypt_name']=FALSE;
					$config['file_name']=$imgname;
					$this->load->library('upload',$config);
					$this->upload->do_upload('banner1');
				}
			if($_FILES["banner2"]["name"]){
					$fileExt = pathinfo($_FILES["banner2"]["name"], PATHINFO_EXTENSION);
					$imgname1=time().'_a1.'.$fileExt;
						$config['upload_path']='./assets/admin/img/category'; 
						$config['allowed_types']='png|jpg|jpeg';
						$config['encrypt_name']=FALSE;
						$config['file_name']=$imgname1;
						$this->load->library('upload',$config);
						$this->upload->do_upload('banner2');
					}

			$where = array();
					$columns = $fields['columns'] = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if(($columns[$i]!="id")&&($columns[$i]!="status")&&($columns[$i]!="date_created"))
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
						redirect('View_admin/'.$folder.'/'.$page.'');
					} else {
						redirect('View_admin/'.$folder.'/'.$current_page.'');
					}
		}
	public function product_category()
	{
		$product=$this->input->post('sub_category');
		$data=array();
		$cus_num=$this->Admin_model->table_column('sub_category','id',$product);
		foreach($cus_num as $cus_row){
			$data['category']=$cus_row['category_id'];
		}
		echo json_encode($data);
	}
	public function Edit_product_admin($tablename,$folder,$edit_id,$pagename,$nextpage)
	{
		$where['id']=$edit_id;
		if($_FILES["img"]["name"]){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
            $config['upload_path']='./assets/admin/img/products'; 
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
			redirect('View_admin/'.$folder.'/'.$pagename.'');
		}
		else{
			redirect('View_admin/'.$folder.'/'.$pagename.'');
		}
	}
    public function category_gallery()
    {
        $category = $this->input->post('category');
        $admin=$this->input->post('admin');
         
        $data=array();
        $output="";
        if($admin == '' && $category == ''){
            $img = $this->Admin_model->table_column('products');
        }elseif($admin =='' && $category != ''){
            $img = $this->Admin_model->table_column('products','category_id',$category);
        }elseif($admin !='' && $category == ''){
            $img = $this->Admin_model->table_column('products','product_by',$admin);
        }else{
            $img = $this->Admin_model->table_column('products','product_by',$admin,'category_id',$category);
        }
        foreach($img as $row)
        {
            $output .=' <div class="col-md-2" >';
            $output.='<img style="margin-bottom:25px;" src="'.base_url().'assets/' .$row['product_by'].'/img/products/'. $row['img'].'" width="100%" height="100px">';
            $output .='</div>';
        }
        echo $output;
    }
    
    public function Update_quantity($tablename,$foldername,$edit_id,$page,$current_page)
    {
        $where['id']=$edit_id;
        $data=array(
        'quantity' => $this->input->post('quantity'),
        );
        $insert = $this->Admin_model->edit($tablename,$data,$where);
        if(isset($insert))
        {
            redirect('View_admin/'.$foldername.'/'.$page.'');
        }
        else{
             redirect('View_admin/'.$foldername.'/'.$current_page.'');
        }

	}
	public function block()
	{
		
			$where = array();
			$data = array();
			$val=$this->input->post('val');
			$tablename=$this->input->post('tablename');
			$where['id']=$this->input->post('id');
			if($val == '1'){
				$data['verify']='0';
			}else{
				$data['verify']='1';
			}
			$update_all = $this->Admin_model->edit($tablename,$data,$where);
			echo json_encode($data);
		}
		public function per_del()
		{
			$delete_id = $this->input->post('id');
			$tablename = $this->input->post('table');
		$this->Admin_model->delete($tablename,$delete_id);
		}
		public function Edit_Setting($tablename,$folder,$file)
		{
			$where['id']='1';
			if($_FILES["img"]["name"]){
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
				'company_name'=>$this->input->post('company_name'),
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),
				'gstin'=>$this->input->post('gstin'),
				'img'=>$imgname,
			);
			$update = $this->Admin_model->edit($tablename,$data,$where);
			if(isset($update))
			{
				redirect('View_admin/'.$folder.'/'.$file);
			}
		}
		public function API_Setting($tablename,$folder,$file)
		{
			$where['id']='1';
			$data=array(
				'api'=>$this->input->post('api'),
				'url'=>$this->input->post('url'),
			);
			$update = $this->Admin_model->edit($tablename,$data,$where);
			if(isset($update))
			{
				redirect('View_admin/'.$folder.'/'.$file);
			}
		}
		public function Smtp_Setting($tablename,$folder,$file)
		{
			$where['id']='1';
			$data=array(
				'port'=>$this->input->post('port'),
				'host'=>$this->input->post('host'),
				'user'=>$this->input->post('user'),
				'password'=>$this->input->post('password'),
				'status'=>'1',
			);
			$update = $this->Admin_model->edit($tablename,$data,$where);
			if(isset($update))
			{
				redirect('View_admin/'.$folder.'/'.$file);
			}
		}
		public function cross()
		{
			$id = $this->input->post('id');
			$tablename = $this->input->post('tablename');
			$data['img']='';
			$where['id']=$id;
			$this->Admin_model->edit($tablename,$data,$where);
		}
		public function product_rate()
		{
			$data=array();
			$pro = $this->input->post('id');
			echo $pro; exit;
			$ins = $this->Admin_model->table_column('shop_products','id',$pro);
			echo count($ins); exit;
			if(count($ins) > 0)
			{
				foreach($ins as $row)
				{
					$data['price'] = $row['price'];
				}
			}
			echo json_encode($data);
		}
		public function search()
		{
			$output="";
			$search = $this->input->post('id');
			$user_id = $this->session->userdata('id');
			$pro = $this->Admin_model->table_column_like('shop_products','product',$search,'customer_id',$user_id);
			if(count($pro) > 0)
			{
				$output.='<option>'.count($pro).' Results Found</option>';
				foreach($pro as $row)
				{
					$output.='<option value="'.$row['id'].'">'.$row['product'].'</option>';
				}
			}
			else{
				$output.='<option>No Results Found</option>';
			}
			echo $output;
		}
		public function Insert_plan($tablename,$foldername,$page,$current_page)
		{
			$data=array(
				'plan'=>$this->input->post('plan'),
				'validation'=>$this->input->post('validation'),
				'free_plan'=>$this->input->post('free_plan'),
				'discount'=>$this->input->post('discount'),
				'seling'=>$this->input->post('seling'),
				'price'=>$this->input->post('price'),
				'status'=>'1',
			);
			$ins = $this->Admin_model->create('plan',$data);
			$choice = $this->input->post('f_choice');
			$type = $this->input->post('type');
			for($i=0;$i<count($type);$i++)
			{
				$data2=array(
					'f_choice'=>$choice[$i],
					'type'=>$type[$i],
				);
				$data2['plan_id'] = $ins;
				$this->Admin_model->create('plan_data',$data2);
			}
			if(isset($plan_ins))
			{
				redirect('View_admin/'.$foldername.'/'.$page);
			}
			else{
				redirect('View_admin/'.$foldername.'/'.$current_page);
			}

		}
}
