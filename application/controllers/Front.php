<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->helper('email');
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->library('cart');
    }
	public function index()
	{
		$this->load->view('front/index');
    }
    public function View($foldername,$file,$edit=FALSE)
    {
        if($edit != FALSE){
            $data['data']=$edit;
            $this->load->view($foldername.'/'.$file,$data);
        }else{
            $this->load->view($foldername.'/'.$file);
        }
        
    }
    public function product_list($category=FALSE,$sub=FALSE,$brand=FALSE)
    {
        if($category != FALSE){
            $data['data']=$category;
            $product=$this->Admin_model->table_column('products','status','1');
            if($sub != FALSE){
                $product=$this->Admin_model->table_column('products','category_id',$category,'sub_category_id',$sub,'status','1');
                $data['sub']=$sub;
            }else{
                $data['sub']="";
            }
            if($brand != FALSE){
                $product=$this->Admin_model->table_column('products','category_id',$category,'brand_id',$brand,'status','1');
                $data['brand']=$brand;
            }else{
                $data['brand']="";
            }
            $data['product_list'] = $product;
            $this->load->view('front/product_listing',$data);
        }else{
            $this->load->view('front/product_listing');
        }
        
    }

    public function addcart()
    {
        $product_id = $this->input->post('product_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $data = array(
            'id' => $product_id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
        );
        $this->cart->insert($data);
    }

    public function search()
    {
        $search = $this->input->post('search');
        $i=0;
        $product=$this->Admin_model->table_column_like('products','tags',$search);
        $data['product_list'] = $product;
        if(count($product)>0){
        foreach($product as $row){
            if($i==0){
            $data['data']=$row['category_id'];
            $data['sub']=$row['sub_category_id'];
            $data['brand']=$row['brand_id'];
            }$i++;
        }
        }else{
        $data['data']="";
        $data['sub']="";
        $data['brand']=""; 
        }
        $this->load->view('front/search_listing',$data);
    }
    public function cart_listing()
    {
        $this->load->library('cart');
        $output='';
        if(count($this->cart->contents())>0){
        foreach($this->cart->contents() as $c_row){
            $cont = $this->Admin_model->table_column('products','id',$c_row['id']);
                foreach($cont as $row){
                    $output .='<div class="ps-cart-item pro_cart_'.$c_row['id'].'"><a class="ps-cart-item__close remove_this" href="#"  data-id="'.$c_row['rowid'].'"></a>
                    <div class="ps-cart-item__thumbnail"><a href="'.base_url().'"></a><img src="'.base_url().'assets/'.$row['product_by'].'/img/products/'.$row['img'].'" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="'.base_url().'View/front/product-detail.php">'.$row['product'].'</a>
                      <p><span>Quantity:'.$c_row['qty'].'</span><span>Price:<i>'.$row['final_price'].'</i></span></p>
                    </div>
                  </div>';
                }
        }
    }else{
        $output.='<b class="text-center">Cart Is Empty</b>';
    }
    echo $output;
    }
    public function cart_listing_total()
    {
        $data=array(
            'total' =>$this->cart->total(),
            'count' => count($this->cart->contents()),
        );
        echo json_encode($data);
    }
    public function listcart()
    {
        $count = 0;
        $output ='';
        $this->load->library('cart');
        if(count($this->cart->contents())>0){
        foreach($this->cart->contents() as $row){
            $count ++;
            $output .='<tr>';
                $img = $this->Admin_model->table_column('products','id',$row['id']);
                foreach($img as $pro_row){
                $output .='<td><img   class="mr-15" src="'.base_url().'assets/'.$pro_row["product_by"].'/img/products/'.$pro_row['img'].'" width="150px" height="160px">'.$pro_row['product'].'</td>
                    <td>Rs '.$pro_row["final_price"].'</td>
                    <td> '.$row['qty'].'</td>
                    <td>Rs '.$row['subtotal'].'</td>
                    <td><button class="btn btn-sm btn-danger remove" data-id="'.$row['rowid'].'" data-product_id="'.$row['id'].'">Remove</button></td>';
                }
                $output.='</tr>';
        }
        }else{
            $output .= '<tr><td colspan="5" style="text-align:center;"><b>Cart Is Empty</b></td></tr>';
        }
        echo $output;
    }
    public function remove_cart()
    {
        $this->load->library('cart');
        $id= $this->input->post('id');
        $data =array(
            'rowid'   => $id,
            'qty'     => 0
        );
        $this->cart->update($data);
        $data1=array(
            'total' =>$this->cart->total(),
            'count' => count($this->cart->contents()),
        );
        echo json_encode($data1);
    }

    public function fetch_data()
    {
        $category=$this->input->post('category');
        $sub=$this->input->post('sub');
        $brand=$this->input->post('brand');
        if($this->input->post('sort')){
            $sort = $this->input->post('sort');
        }else{
            $sort = '1';
        }
        if($sub != ''){
            $product=$this->Admin_model->table_column_pro('products',$sort,'category_id',$category,'sub_category_id',$sub);
        }if($brand != ''){
            $product=$this->Admin_model->table_column_pro('products',$sort,'category_id',$category,'brand_id',$brand);
        }
        if($sub == '' && $brand == ''){
            $product=$this->Admin_model->table_column_pro('products',$sort,'category_id',$category);
        }
        $page = $this->input->post('page');
        $next_page = $page+1;
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = ''.base_url().'Front/fetch_data';
        $config['total_rows'] = count($product);
        $config['per_page'] =6;
        $config['use_page_numbers'] = TRUE;
        $config['attributes'] = array('class' => 'next');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a > ";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li id="next" data-page="'.$next_page.'" >';
        $config['num_tag_close'] = '</li>';
         $config['num_links'] = 3;
        $this->pagination->initialize($config); 
        $start = ($page - 1) * $config['per_page'];
        $end = $page * $config['per_page'];
        $listing_out="";
        $date=date("d-m-Y");
        $j=0;
        foreach($product as $row){
            if($j >= $start && $j < $end){
            $listing_out .= '<div class="ps-product__column"><div class="ps-shoe mb-30"><div class="ps-shoe__thumbnail">';
            if($date == $row['date']){
            $listing_out .= '<div class="ps-badge"><span>New</span></div>';
            }
            if($row['discount'] != '0'){
            $listing_out .='<div class="ps-badge ps-badge--sale ps-badge--2nd"><span style="margin-left:-10%;">-'.$row["discount"].' %</span></div>';
            }
            $listing_out .= '<a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="'.base_url().'assets/'.$row['product_by'].'/img/products/'.$row['img'].'"  alt=""  width="100%" height="211px"><a class="ps-shoe__overlay"  href="'.base_url().'Front/product_view/'.$row["id"].'"></a> </div><div class="ps-shoe__content">';
            $sub_images=explode(',',$row['sub_images']);
                if(count($sub_images)>1){ 
            $listing_out .= '<div class="ps-shoe__variants">
                            <div class="ps-shoe__variant normal">';
                foreach($sub_images as $row_sub){
                    $i=0;
                        if($i < 3 ){
                $listing_out .='<img src="'.base_url().'assets/'.$row['product_by'].'/img/sub_products/'.$row_sub.'" class="sub_images" alt="">';
                        } $i++;
                     }
            $listing_out .=' </div></div>';
                }
            $listing_out .= '<div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">'.$row['product'].'</a> <p class="ps-shoe__categories"></p>';
            if($row['discount'] != '0'){
            $listing_out .= '<del>Rs '.$row["price"].'</del><br>';
            }
            $listing_out .= 'Rs '.$row['final_price'].'</span></div></div></div></div>';
        }
        $j++;
    }
        $output = array(
         'pagination_link'  => $this->pagination->create_links(),
         'product'   => $listing_out
        );
        echo json_encode($output);
    }

    public function create_user()
    {
        $this->load->helper('string');
        $customer_id=random_string('alnum',6);
        $data=array(
            'name'=>$this->input->post('name'),
            'customer_id'=>$customer_id,
            'contact'=>$this->input->post('contact'),
            'email'=>$this->input->post('email'),
            'password'=>sha1($this->input->post('password')),
            'date_created'=>date("d-m-Y"),
        );
        $insert = $this->Admin_model->create('customer',$data);
			if($insert){
				$this->session->set_flashdata("msg_pos","Register Successfully Please Wait for Veification.");
				redirect('Front');
			}else{
				redirect('View/front/customer_register');
			}
    }
    public function customer_login()
    {
        $email=$this->input->post('email');
        $password=sha1($this->input->post('password'));
        $data=array();
        $val_check=$this->Admin_model->table_column('customer','email',$email,'password',$password);
        if(count($val_check) > 0){
            foreach($val_check as $row){
                if($row['status']=='1'){
                    $this->session->set_flashdata("msg","Account has been blocked");
                    redirect('View/front/customer_login');
                }else{
                $data['customer_id']=$row['customer_id'];
                $data['name']=$row['name'];
                $this->session->set_userdata('user',$data);
                redirect('Front');
                }
            }
        }else{
            $this->session->set_flashdata("msg","Incorrect Email or Password.");
            redirect('View/front/customer_login');
        }
    }
    public function customer_account_reset()
    {
        $email=$this->input->post('email');
		$val_check=$this->Admin_model->table_column('customer','email',$email);
		if(count($val_check) > 0){
			foreach($val_check as $row){
				$where['id']=$row['id'];
				$name=$row['name'];
				$this->load->helper('string');
				$verify_otp=random_string('alnum',6);
				$data['password']=$verify_otp;
				$this->Admin_model->edit('customer',$data,$where);
				$url=''.base_url().'View/front/customer_reset_pass/'.$verify_otp.'';
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
				redirect('View/front/customer_login');
			}
		}else{
			$this->session->set_flashdata('msg','Email is not registered');
			redirect('View/front/customer_reset');
		}
    }
    public function customer_reset_pass($folder=FALSE,$page=FALSE)
	{
		$password=sha1($this->input->post('password'));
		$old_pass=$this->input->post('o_password');
		$val_check=$this->Admin_model->table_column('customer','password',$old_pass);
		if(count($val_check) > 0){
			foreach($val_check as $row){
				$where['id']=$row['id'];
				$data['password']=$password;
				$this->Admin_model->edit('customer',$data,$where);
				$this->session->set_flashdata("msg_pos","Password changed Successfully.");
				redirect('View/front/customer_login');
			}
        }
        else{
            $this->session->set_flashdata("msg","Verification link is expired.");
            redirect('View/front/customer_reset');
        }
	}
    public function product_view($product_id)
    {
        redirect('View/front/product_view/'.$product_id.'');
    }
    public function customer_logout()
    {
        $this->session->unset_userdata('user');
        redirect('Front');
    }
}
?>