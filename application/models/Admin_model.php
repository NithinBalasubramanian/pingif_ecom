<?php
class Admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    public function table($table)
    {
        return $fields = $this->db->list_fields($table);
        $this->db->result_array();
    }
    public function create($tablename,$data)
    {
        $this->db->insert($tablename,$data);
        return $this->db->insert_id();
    }
    public function table_column($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_pro($tablename,$sort,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        $this->db->where('status','1');
        if($sort == '1'){
            $this->db->order_by('id','DESC');
        }else if($sort == '2'){
            $this->db->order_by('product','ASC');
        }else if($sort == '3'){
            $this->db->order_by('final_price','ASC');
        }else if($sort == '4'){
            $this->db->order_by('final_price','DESC');
        }
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_like1($tablename,$column = FALSE,$val = FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->like('tags',$val);
        $this->db->or_like('product',$val);
        $this->db->where('status','1');
        $result=$this->db->get();
        return $result->result_array();
    }
     public function table_column_decending($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        $this->db->order_by('id','DESC');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_limit($tablename,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $this->db->limit($val);
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_limit_desc($tablename,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $this->db->limit($val);
        $this->db->order_by('id','DESC');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function edit($tablename,$data,$where)
    {
        return $this->db->update($tablename,$data,$where);
    }
    public function delete($tablename,$delete_id)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('id',$delete_id);
       $this->db->delete($tablename);
    }
    public function multiple_images($image = array()){

        return $this->db->insert_batch('profile_images',$image);
     }
    public function table_column_like($tablename,$column,$val,$column1=FALSE,$val1=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->like($column,$val);
       if($column1 != FALSE){
        $this->db->where($column1,$val1);
       }
        $this->db->where('status','1');
        $result = $this->db->get();
        return $result->result_array();
    }
    public function invoice_select($tablename,$from,$to,$column=FALSE,$val=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('date>=',$from);
        $this->db->where('date<=',$to);
        if($column!=FALSE)
        {
            $this->db->where($column,$val);
        }
        $result = $this->db->get();
        return $result->result_array();
    }
}