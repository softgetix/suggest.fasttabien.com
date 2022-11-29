<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

public function __construct() {
    parent::__construct();
}
public function admin(){
    
    if($this->session->userdata('user_id') == '') { 
	     
       $this->load->view('header');
       $this->load->view('login');
       $this->load->view('footer');
                 
    }else{
        redirect('admin/dashboard');
    }
}

public function login(){
	 
     if(isset($_POST['username']) && isset($_POST['password'])){
      
        $username=$this->input->post('username');
        $pwd=$this->input->post('password');
        
        $result=$this->cnc_model->getData('user','*',['user_name'=>$username]);
       
        if(!empty($result)){
              
              if(password_verify( $pwd, $result[0]['password'])){

                   $this->session->set_userdata('user_id', $result[0]['id']);
                   $this->session->set_userdata('user_name', $result[0]['user_name']);

                   redirect('admin/dashboard');      
                    
              }else{
                
                  $this->session->set_flashdata('error', 'Password is not valid');   
                  redirect('admin');
              }

        }else{

            $this->session->set_flashdata('error', 'Username is not valid');   
            redirect('admin');     
        }
        
    }else{
        
        $this->session->set_flashdata('error', 'Invalid Username or Password');
        redirect('admin');
    }
}


public function register(){

    $this->load->view('common/page_header');
    $this->load->view('common/regis_form');
    $this->load->view('common/page_footer');

}

public function check_email(){
    $customer_email=$this->input->post('customer_email');
    if ($customer_email != "") {
            $data = $this->cnc_model->getData('customers', 'customer_email', array('customer_email' =>$customer_email));
          if(!empty($data))  
                $status='false';
          else
                $status='true';
    } else {
        $status='true';
    }
    echo $status;die;
}

public function save_register(){
    
    $post=$this->input->post();
        
    $post['name']=$post['customer'];
    $post['office_contact_email']=$post['customer_email'];
    $post['ar_customer']=1;
    $post['created_at']=date('Y/m/d H:i:s');
    $post['passwd']=password_hash($post['passwd'], PASSWORD_DEFAULT);

    unset($post['customer']);
    unset($post['customer_form_submit']);

    $this->cnc_model->rowInsert('customers',$post);

    $this->session->set_flashdata('success', 'Successfully Registered ! now you can login here');
        redirect('admin');
}

public function logout(){
    
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('email');
    $this->session->set_flashdata('success', 'You have successfully logged out.');
    redirect('admin');
}

}