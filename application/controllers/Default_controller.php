<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Default_controller extends CI_Controller {

public function __construct() {
    parent::__construct();
}

public function index(){
    
	$category=$this->cnc_model->getData('category','*',['star_category'=>1]);
	if (!empty($category)) {
		$join=array(
				array(
					'table'=>'group_table g',
					'on'=>'g.id=r.group_id',
				),
				array(
					'table'=>'category c',
					'on'=>'c.id=r.catg_id',
				),		
			);
			//  $this->get_realtime_jobs($category);
			
			$group=$this->cnc_model->getData('records r','g.*',['r.catg_id'=>$category[0]['id']],$join,false,'DESC',false,false,false,'r.group_id');

			$select="r.id,c.name as cname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
			if (!empty($group)) {
				foreach ($group as $key => $value) {
					$records=$this->cnc_model->getData('records r',$select,['r.catg_id'=>$category[0]['id'],'r.group_id'=>$value['id']],$join);
					$group[$key]['records']=$records;
				}
			}

			$auction_list = $this->cnc_model->getData('auction_list','*',['auction_date'=>date('Y-m-d')]);

		    $common_section = $this->cnc_model->getData('common_section','*');
			$c_month = $this->get_month($common_section);
			$final_result=$this->get_highlight_category($auction_list,$c_month);

            $data['category']=$category[0];
			$data['data']=$group;
			$data['common_section']=$final_result;
			
			include('W3speedup/W3speedupHelper.php');
			$W3speedup = new W3speedupHelper();		
			echo $W3speedup->optimize_call($this->load->view('frontend/category',$data,true));
			//$this->load->view('frontend/category',$data);
	}else
		header("Location: http://34.203.243.14/suggest.fasttabien.com/");
	
}

public function error404(){
	$this->load->view('404.php');
}

public function homescreen($catg=''){

	list(,$catg)=explode('/',$_SERVER['REDIRECT_QUERY_STRING']);
	
	if (!empty($catg)) {
		$url=base_url().$catg;	
		$category=$this->cnc_model->getData('category','*',['url'=>$url]);
		if (!empty($category)) {
			$join=array(
				array(
					'table'=>'group_table g',
					'on'=>'g.id=r.group_id',
				),
				array(
					'table'=>'category c',
					'on'=>'c.id=r.catg_id',
				),		
			);
            //$this->get_realtime_jobs($category);

			$group=$this->cnc_model->getData('records r','g.*',['r.catg_id'=>$category[0]['id']],$join,false,'DESC',false,false,false,'r.group_id');

			$select="r.id,c.name as cname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
			if (!empty($group)) {
				foreach ($group as $key => $value) {
					$records=$this->cnc_model->getData('records r',$select,['r.catg_id'=>$category[0]['id'],'r.group_id'=>$value['id']],$join);
					$group[$key]['records']=$records;
				}
			}

			$auction_list = $this->cnc_model->getData('auction_list','*',['auction_date'=>date('Y-m-d')]);

		    $common_section = $this->cnc_model->getData('common_section','*');
			$c_month = $this->get_month($common_section);
			$final_result=$this->get_highlight_category($auction_list,$c_month);
			 

		    $data['category']=$category[0];
			$data['data']=$group;
			$data['common_section']=$final_result;
			$this->load->view('frontend/category',$data);
		}
		else
			redirect();			
	}else
		redirect();
}


public function demo(){
// die('cool');
	$category=$this->cnc_model->getData('category','*',['star_category'=>1]);
	if (!empty($category)) {
		$join=array(
				array(
					'table'=>'group_table g',
					'on'=>'g.id=r.group_id',
				),
				array(
					'table'=>'category c',
					'on'=>'c.id=r.catg_id',
				),		
			);
			//  $this->get_realtime_jobs($category);
			
			$group=$this->cnc_model->getData('records r','g.*',['r.catg_id'=>$category[0]['id']],$join,false,'DESC',false,false,false,'r.group_id');

			$select="r.id,c.name as cname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
			if (!empty($group)) {
				foreach ($group as $key => $value) {
					$records=$this->cnc_model->getData('records r',$select,['r.catg_id'=>$category[0]['id'],'r.group_id'=>$value['id']],$join);
					$group[$key]['records']=$records;
				}
			}

			$auction_list = $this->cnc_model->getData('auction_list','*',['auction_date'=>date('Y-m-d')]);

		    $common_section = $this->cnc_model->getData('common_section','*');
			$c_month = $this->get_month($common_section);
			$final_result=$this->get_highlight_category($auction_list,$c_month);


			
			

	
            $data['category']=$category[0];
			$data['data']=$group;
			$data['common_section']=$final_result;
				include('W3speedup/W3speedupHelper.php');
			$W3speedup = new W3speedupHelper();		
			echo $W3speedup->optimize_call($this->load->view('frontend/demo',$data,true));
			//$this->load->view('frontend/demo',$data);
			}else
		header("Location: https://fasttabien.com");
	
}

public function demo1(){
// die('cool');
	$category=$this->cnc_model->getData('category','*',['star_category'=>1]);
	if (!empty($category)) {
		$join=array(
				array(
					'table'=>'group_table g',
					'on'=>'g.id=r.group_id',
				),
				array(
					'table'=>'category c',
					'on'=>'c.id=r.catg_id',
				),		
			);
			//  $this->get_realtime_jobs($category);
			
			$group=$this->cnc_model->getData('records r','g.*',['r.catg_id'=>$category[0]['id']],$join,false,'DESC',false,false,false,'r.group_id');

			$select="r.id,c.name as cname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
			if (!empty($group)) {
				foreach ($group as $key => $value) {
					$records=$this->cnc_model->getData('records r',$select,['r.catg_id'=>$category[0]['id'],'r.group_id'=>$value['id']],$join);
					$group[$key]['records']=$records;
				}
			}

			$auction_list = $this->cnc_model->getData('auction_list','*',['auction_date'=>date('Y-m-d')]);

		    $common_section = $this->cnc_model->getData('common_section','*');
			$c_month = $this->get_month($common_section);
			$final_result=$this->get_highlight_category($auction_list,$c_month);


            $data['category']=$category[0];
			$data['data']=$group;
			$data['common_section']=$final_result;
			
			$this->load->view('frontend/demo',$data);
	}else
		header("Location: https://fasttabien.com");
	
}

public function demoscreen($catg=''){

	list(,$catg)=explode('/',$_SERVER['REDIRECT_QUERY_STRING']);
	
	if (!empty($catg)) {
		$url=base_url().$catg;	
		$category=$this->cnc_model->getData('category','*',['url'=>$url]);
		if (!empty($category)) {
			$join=array(
				array(
					'table'=>'group_table g',
					'on'=>'g.id=r.group_id',
				),
				array(
					'table'=>'category c',
					'on'=>'c.id=r.catg_id',
				),		
			);
            //$this->get_realtime_jobs($category);

			$group=$this->cnc_model->getData('records r','g.*',['r.catg_id'=>$category[0]['id']],$join,false,'DESC',false,false,false,'r.group_id');

			$select="r.id,c.name as cname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
			if (!empty($group)) {
				foreach ($group as $key => $value) {
					$records=$this->cnc_model->getData('records r',$select,['r.catg_id'=>$category[0]['id'],'r.group_id'=>$value['id']],$join);
					$group[$key]['records']=$records;
				}
			}

			$auction_list = $this->cnc_model->getData('auction_list','*',['auction_date'=>date('Y-m-d')]);

		    $common_section = $this->cnc_model->getData('common_section','*');
			$c_month = $this->get_month($common_section);
			$final_result=$this->get_highlight_category($auction_list,$c_month);
			 

		    $data['category']=$category[0];
			$data['data']=$group;
			$data['common_section']=$final_result;
			$this->load->view('frontend/demo',$data);
		}
		else
			redirect('demo');			
	}else
		redirect('demo');
}




public function get_highlight_category($a_list,$c_section){

    foreach ($c_section as $key => $value) {
    	foreach ($a_list as $key2 => $value2) {
   	   	  if($value['category']==$value2['category']){
             $c_section[$key]['class']="select_cat";
              break;
   	   	  }
   	   	}
    }
    return  $c_section;
}

public function get_month($c_section){

	$month_array=["01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน",'05'=>"พฤษภาคม",'06'=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม"];
 
    foreach ($c_section as $key => $value) {

        for ($i = 0; $i < count($month_array);$i++) {
            if( $value['category_order'] == 1)
            {
                $month=date("m");
                $n_month = $month_array[$month];
                $c_section[$key]['month']=$n_month;
                break;
            }

            if($value['category_order'] == 2){
			
			   $month=date("m",strtotime("+1 week"));
			   $n_month = $month_array[$month];
			   $c_section[$key]['month']=$n_month;
                break;
            }

            if($value['category_order'] == 3){
		        $month = date("m",strtotime("+2 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }

	        if($value['category_order'] == 4){
		        $month = date("m",strtotime("+3 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 5){
		        $month = date("m",strtotime("+4 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 6){
		        $month = date("m",strtotime("+5 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 7){
		        $month = date("m",strtotime("+6 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 8){
		        $month = date("m",strtotime("+7 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 9){
		        $month = date("m",strtotime("+8 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month']=$n_month;
                break;
	        }
        } 
    }
    return  $c_section;
} 


// execute cron_job 


public function get_all_data($no="",$clm_count){

    for($i=1; $i <= $clm_count; $i++){
        $this->db->or_group_start();
          	$this->db->where('no'.$i,$no);
            $this->db->where('status','in progress');
	    $this->db->group_end();
    } 
    $res = $this->db->get('customer')->result_array();

    if(!empty($res)){
    	for ($i=1; $i <= $clm_count ; $i++) {
	        foreach ($res as $key => $value) {

	        	if($value['no'.$i] == $no){

	        		$array[] = ["id"=>$value['id'],'status'=>$value['status'],'cat'=>$value['cat'.$i],'no'=>$value['no'.$i]];
	        	}
	           	
	    	}
        }
    }

    if(!empty($array)){
       return $array;
    }       
}


public function secondCronjob(){

	$select = "r.id,r.catg_id,c.name as cname,r.price,r.data,r.number,r.is_sold,r.created_at,r.updated_at";
    $join = array(
        	array(
        		'table'=>'category c',
        		'on'=>'c.id=r.catg_id',
        		),		
        	);
    
    $result = $this->db->select($select)
                        ->from('records r')
                        ->join('category c','c.id=r.catg_id')
                        ->get()
                        ->result_array();

    $fields = $this->db->list_fields('customer');
    $clm_count = (count($fields)-15)/2;

    $get_count = $this->get_all_data($value['number'],$clm_count);

    foreach ($result as $key => $value) {

		$get_count = $this->get_all_data($value['number'],$clm_count);

    	if(!empty($get_count) && count($get_count) > 3){ 
    		$post['updated_at'] = date('Y-m-d H:i:s');
            $post['is_sold'] = 1;
            $post['cron_test'] = 1;
	        $res = $this->cnc_model->rowUpdate('records',$post,['id'=>$value['id']]); 	
    	}
    }

    echo "success";die();

}


public function sync_cron_jobs(){

	$select="r.id,r.catg_id,c.name as cname,price,data,number,is_sold,r.created_at,r.updated_at";
    $join=array(
        	array(
        		'table'=>'category c',
        		'on'=>'c.id=r.catg_id',
        		),		
        	);
    
    $result = $this->db->select($select)
                        ->from('records r')
                        ->join('category c','c.id=r.catg_id')
                        ->get()
                        ->result_array();
    
    $num = [];

    $fields = $this->db->list_fields('customer');
    $clm_count =(count($fields)-15)/2;

    foreach ($result as $key => $value) {
   
    	$category = $value['cname'];
    	$number = $value['number'];

    	$check_cat_no = $this->check_number($category,$number,$clm_count);
    	
    	if($check_cat_no == true){
    	    $post['updated_at']=date('Y-m-d H:i:s');
            $post['is_sold']=1;
            $post['cron_test'] = 1;
	        $res = $this->cnc_model->rowUpdate('records',$post,['id'=>$value['id']]);
	    }
	    else{
	    	$post['updated_at']=date('Y-m-d H:i:s');
            $post['is_sold']=0;
            $post['cron_test'] = 2;
	        $res = $this->cnc_model->rowUpdate('records',$post,['id'=>$value['id']]);
	    }
    }

    echo "success";die();
}

function check_number($cat,$no,$clm_count){
    $flag =false;
    
        for($i=1; $i <= $clm_count; $i++){
            $this->db->or_group_start();
                $this->db->where('cat'.$i,$cat);
	          	$this->db->where('no'.$i,$no);
                $this->db->where('status','in progress');
          	    
          	    $this->db->or_group_start();
          	 		$this->db->where('cat'.$i,"xx");
		          	$this->db->where('no'.$i,$no);
		          	$this->db->where('status','in progress');
                $this->db->group_end();
		    $this->db->group_end();
	    } 
        $num = $this->db->count_all_results('customer');
        if($num > 0)
           $flag = true;  

    return $flag; 
}

// end  execute cron_job 


function check_new_number(){
	$post = $this->input->post();
    $where = array('number'=>$post['number']);

    	$records = $this->cnc_model->getData('allnumbers','*',$where);
    	if(!empty($records)){
    		$data['price']= $records[0]['resultsuggest'];
        }else{
            $data['error_record']="Number is not matched!";
        }

    if (isset($data['price']) && !empty($data['price'])) {
   	    $price = $data['price'] ." | สนใจใช้บริการกรุณาแอดไลน์ <a href=https://line.me/R/ti/p/%40fasttabien target=_blank style=color:#38C801>คลิ๊กเลย</a>  ";
    }else{
    	$price = '';
    }
    if (isset($data['error_record']) && !empty($data['error_record'])) {
   	 
   	    $error = $data['error_record'];
    }else{
    	$error = '';
    }
    $result = array("price" => $price,"error" => $error);
	echo json_encode($result);die();
}

public function popup_details(){
    $post = $this->input->post();

    $select="r.id,r.catg_id,r.group_id,r.price,r.data,r.number,r.is_sold,g.name as groupname,c.name as catname,g.description,c.description";
	$join = array(

		    array(
				  'table'=>'group_table g',
				  'on'=>'g.id = r.group_id',
				),
		    array(
				 'table'=>'category c',
				 'on'=>'c.id = r.catg_id',
				),		
	);

    $res = $this->cnc_model->getData('records r',$select,['r.id'=>$post['id']],$join);
    if(!empty($res)){
		$data = $res[0];
	}
	echo json_encode($data);
	die();
}

//New Design Demo
public function newDesign(){
	$this->load->view('Newdesign/index');
}


public function test(){
	$this->db->update('records_old',['test'=>1]);
}

}
