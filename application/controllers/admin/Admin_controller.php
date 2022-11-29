<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends MY_Controller {

private $slag='';
private $page='';

public function __construct() {
	parent::__construct();
	$this->load->model('admin/Admin_model','admin');
}
function load($page='page',$data=[]){
	$side_menu=['slag'=>$this->slag,'page'=>$this->page];
	$this->load->view('admin/common/header');
    $this->load->view('admin/common/sidebar',$side_menu);
    $this->load->view("admin/".$page,$data);
}
//Category

public function index(){
	$catg=$this->cnc_model->getData('category');
	$this->slag='dashboard';
	$this->page='catg_view';
	$this->load('dashboard',$catg);
}
public function save_category(){
	$post=$this->input->post();
	if (!empty($post['name']) && !empty($post['url_slug'])) {
		$post['url_slug']=preg_replace("/\s+/", "",$post['url_slug']);
		$post['url']=base_url().$post['url_slug'];
		$post['created_at']=date('Y-m-d H:i:s');
		$catg_id=$this->cnc_model->rowInsert('category',$post);
		if ($catg_id) {
			$this->session->set_flashdata('success', 'Category successfully created');
			 redirect('admin/dashboard'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/dashboard');
		}
	}else{
		$this->session->set_flashdata('error', 'All fields are required');
			 redirect('admin/dashboard');
	}
}
function delete_category(){
	$id=$this->input->post('id');
	$this->cnc_model->rowsDelete('category',array('id'=>$id));
	$this->cnc_model->rowsDelete('records',array('catg_id'=>$id));
	$this->session->set_flashdata('success', 'Category Successfully Deleted');
	echo "true";		 
}
function getCategroyById(){
	$id=$this->input->post('id');
	$res=$this->cnc_model->getData('category','*',['id'=>$id]);
	$category=array('name'=>$res[0]['name'],'description'=>$res[0]['description'],'url_slug'=>$res[0]['url_slug']);	
	echo json_encode($category);die();
}
function check_category(){
	$name=$this->input->post('name');
	$id=$this->input->post('id');
	if (empty($id)) {
		$res=$this->cnc_model->getData('category','*',['name'=>$name]);
	}else{
		$res=$this->admin->is_category_exist($id,$name);
	}
	if (!empty($res))
		echo 'false';
	else
		echo "true";

	die();
}
function check_url_slug(){
	$url_slug=$this->input->post('url_slug');
	$id=$this->input->post('id');
	if (empty($id)) {
		$url_slug=preg_replace("/\s+/", "",$url_slug);
		$res=$this->cnc_model->getData('category','*',['url_slug'=>$url_slug]);
	}else{
		$res=$this->admin->is_slug_exist($id,$url_slug);
	}
	if (!empty($res))
		echo 'false';
	else
		echo "true";

	die();
}
function get_category(){
	 	
	 	$sLimit = "";
        $lenght = $_GET['iDisplayLength'];
        $str_point = $_GET['iDisplayStart'];
        
        $col_sort = array("id", "name", 'description', 'url',  'created_at');
		
		$order_by = "id";
        $order = 'asc';
        if (isset($_GET['iSortCol_0'])) {
            $index = $_GET['iSortCol_0'];
            $order = $_GET['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
            $order_by = $col_sort[$index];
        }
        $where = '';
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $words = $_GET['sSearch'];
            $where = '( ';
            for ($i = 0; $i < count($col_sort); $i++) {

                $where .= "$col_sort[$i] REGEXP '$words'";

                if ($i + 1 != count($col_sort)) {
                    $where .= " OR ";
                }
            }
            $where .= ') ';
        }
        if ($where != "") {
            $where .= " AND ";http://localhost/suggest/admin/Test Calendar	
        }
        $where .= "(id REGEXP id)";

        $result = $this->cnc_model->getData('category','*',$where,false,$order_by,$order,$lenght,$str_point);
        
        $total_record = $this->cnc_model->getRowCount('category','*',$where,false,$order_by,$order);
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $total_record,
            "iTotalDisplayRecords" => $total_record,
            "aaData" => array()
        );
        
        $i = 0;
        $final = array();
        foreach ($result as $key=>$val) {
        	if (!empty($val['star_category']) && $val['star_category'] > 0)
        		$star="yellow";
        	else
        		$star="btn-default";
        	
            $output['aaData'][]=array(($key+1),
            		$val['name'],
            		$val['description'],
            		'<a href="'.$val['url'].'" target="_blank">'.$val['url'].'</a>',
            		date('m-d-Y H:i',strtotime($val['created_at'])),
            		'<button type="button" data_id="'.$val['id'].'" class="edit green btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-edit"></i></button>
            		<button type="button" data_id="'.$val['id'].'" class="delete red btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-trash"></i></button>
            		<button type="button" data_id="'.$val['id'].'" class="star '.$star.' btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-star"></i></button>',
				);
        }
        echo json_encode($output);
        die;
}
function update_category(){
	$post=$this->input->post();
	if (!empty($post['name'])) {
		$data['description']=$post['description'];
		$data['name']=$post['name'];
		$data['url_slug']=preg_replace("/\s+/", "",$post['url_slug']);
		$data['url']=base_url().$post['url_slug'];
		$data['updated_at']=date('Y-m-d H:i:s');
		$catg_id=$this->cnc_model->rowUpdate('category',$data,['id'=>$post['id']]);
		if ($catg_id) {
			$this->session->set_flashdata('success', 'Category successfully Updated');
			 redirect('admin/dashboard'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/dashboard');
		}
	}else{
		$this->session->set_flashdata('error', 'Failed! fields are missing');
			 redirect('admin/dashboard');
	}
}

//Group

public function group(){
	$catg=$this->cnc_model->getData('group_table');
	$this->slag='group';
	$this->page='group_view';
	$this->load('group',$catg);
}
function get_group(){
	 	
	 	$sLimit = "";
       	$lenght = $_GET['iDisplayLength'];
        $str_point = $_GET['iDisplayStart'];
        
        $col_sort = array("id", "name", 'description', 'is_featured',  'created_at');
		
		$order_by = "id";
        $order = 'asc';
        if (isset($_GET['iSortCol_0'])) {
            $index = $_GET['iSortCol_0'];
            $order = $_GET['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
            $order_by = $col_sort[$index];
        }
        $where = '';
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $words = $_GET['sSearch'];
            $where = '( ';
            for ($i = 0; $i < count($col_sort); $i++) {

                $where .= "$col_sort[$i] REGEXP '$words'";

                if ($i + 1 != count($col_sort)) {
                    $where .= " OR ";
                }
            }
            $where .= ') ';
        }
        if ($where != "") {
            $where .= " AND ";
        }
        $where .= "(id REGEXP id)";

        $result = $this->cnc_model->getData('group_table','*',$where,false,$order_by,$order,$lenght,$str_point);
        
        $total_record = $this->cnc_model->getRowCount('group_table','*',$where,false,$order_by,$order);
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $total_record,
            "iTotalDisplayRecords" => $total_record,
            "aaData" => array()
        );
        
        $i = 0;
        $final = array();
        foreach ($result as $key=>$val) {
        	if($val['is_featured'])
        		$status="<button class='btn btn-circle btn-sm purple'>Yes</button>";
        	else
        		$status="<button class='btn btn-circle btn-sm red'>No</button>";
            $output['aaData'][]=array(($key+1),
            		$val['name'],
            		$val['description'],
            		$status,
            		date('m-d-Y H:i',strtotime($val['created_at'])),
            		'<button type="button" data_id="'.$val['id'].'" class="edit purple btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-edit"></i></button>
            		<button type="button" data_id="'.$val['id'].'" class="delete red btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-trash"></i></button>',
				);
        }
        echo json_encode($output);
        die;
}

public function save_group(){
	$post=$this->input->post();
	if (!empty($post['name'])) {
		$post['created_at']=date('Y-m-d H:i:s');
		$catg_id=$this->cnc_model->rowInsert('group_table',$post);
		if ($catg_id) {
			$this->session->set_flashdata('success', 'Group successfully created');
			 redirect('admin/group'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/group');
		}
	}else{
		$this->session->set_flashdata('error', 'All fields are required');
			 redirect('admin/group');
	}
}
function delete_group(){
	$id=$this->input->post('id');
	$this->cnc_model->rowsDelete('group_table',array('id'=>$id));
	$this->cnc_model->rowsDelete('records',array('group_id'=>$id));
	$this->session->set_flashdata('success', 'Group Successfully Deleted');
	echo "true";		 
}

function update_group(){
	$post=$this->input->post();
	if (!empty($post['name'])) {
		$data['description']=$post['description'];
		$data['name']=$post['name'];
		$data['updated_at']=date('Y-m-d H:i:s');
		if (!empty($post['is_featured']))
			$data['is_featured']=1;
		else	
			$data['is_featured']=0;
		
		$catg_id=$this->cnc_model->rowUpdate('group_table',$data,['id'=>$post['id']]);
		if ($catg_id) {
			$this->session->set_flashdata('success', 'Group successfully Updated');
			 redirect('admin/group'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/group');
		}
	}else{
		$this->session->set_flashdata('error', 'Failed! fields are missing');
			 redirect('admin/group');
	}
}

function getGroupById(){
	$id=$this->input->post('id');
	$res=$this->cnc_model->getData('group_table','*',['id'=>$id]);
	$group=array('name'=>$res[0]['name'],'description'=>$res[0]['description'],'is_featured'=>$res[0]['is_featured']);	
	echo json_encode($group);die();
}

function check_group(){
	$name=$this->input->post('name');
	$id=$this->input->post('id');
	if (empty($id)) {
		$name=$this->input->post('name');
		$res=$this->cnc_model->getData('group_table','*',['name'=>$name]);
	}else{
		$res=$this->admin->is_group_exist($id,$name);
	}
	if (!empty($res))
		echo 'false';
	else
		echo "true";

	die();
}
// Records

public function records(){
	$records=$this->cnc_model->getData('records');
	$records['category']=$this->cnc_model->getData('category');
	$records['group']=$this->cnc_model->getData('group_table');
	$this->slag='records';
	$this->page='record_view';
	$this->load('records',$records);
}

function get_records(){
	 	
	 	$sLimit = "";
        $lenght = $_GET['iDisplayLength'];
        $str_point = $_GET['iDisplayStart'];
        
        $col_sort = array("r.id", "c.name", 'g.name', 'price','data','number','is_sold','g.is_featured','r.created_at','r.updated_at');
      		
  		$select="r.id,c.name as cname,g.name as gname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
		
		$order_by = "id";
        $order = 'asc';
        if (isset($_GET['iSortCol_0'])) {
            $index = $_GET['iSortCol_0'];
            $order = $_GET['sSortDir_0'] === 'asc' ? 'asc' : 'desc';
            $order_by = $col_sort[$index];
        }
        $where = '';
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $words = $_GET['sSearch'];
            $where = '( ';
            for ($i = 0; $i < count($col_sort); $i++) {

                $where .= "$col_sort[$i] REGEXP '$words'";

                if ($i + 1 != count($col_sort)) {
                    $where .= " OR ";
                }
            }
            $where .= ') ';
        }
        if ($where != "") {
            $where .= " AND ";http://localhost/suggest/admin/Test Calendar	
        }
        $where .= "(r.id REGEXP r.id)";

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

        $result = $this->cnc_model->getData('records r',$select,$where,$join,$order_by,$order,$lenght,$str_point);
        
        $total_record = $this->cnc_model->getRowCount('records r',$select,$where,$join,$order_by,$order);
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $total_record,
            "iTotalDisplayRecords" => $total_record,
            "aaData" => array()
        );
        
        $i = 0;
        $final = array();
        foreach ($result as $key=>$val) {
        	if($val['is_featured'])
        		$featured="<button class='btn btn-circle btn-sm yellow'>Yes</button>";
        	else
        		$featured="<button class='btn btn-circle btn-sm red'>No</button>";
        	if($val['is_sold'])
        		$sold="<button class='btn btn-circle btn-sm yellow'>Yes</button>";
        	else
        		$sold="<button class='btn btn-circle btn-sm red'>No</button>";

        	$updated_date=!empty($val['updated_at'])?date('m-d-Y H:i',strtotime($val['updated_at'])):'Not updated';

            $output['aaData'][]=array(($key+1),
            		$val['cname'],
            		$val['gname'],
            		$val['price'],
            		$val['data'],
            		$val['number'],
            		$sold,
            		$featured,
            		date('m-d-Y H:i',strtotime($val['created_at'])),
            		$updated_date,
            		'<button type="button" data_id="'.$val['id'].'" class="edit yellow btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-edit"></i></button>
            		<button type="button" data_id="'.$val['id'].'" class="delete red btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-trash"></i></button>',
				);
        }
        echo json_encode($output);
        die;
}


function save_records(){
	$post=$this->input->post();
	if (!empty($post) && !empty($post['catg_id'][0]) && !empty($post['group_id'][0])) {
		$validate=true;
		$f_no=0;
		$s_no=0;
		foreach ($post['price'] as $key => $value) {
			if (!empty($post['data'][$key]) && !empty($post['price'][$key]) && !empty($post['number'][$key])){
				$insert_data['catg_id']=$post['catg_id'][$key];
				$insert_data['group_id']=$post['group_id'][$key];
				$insert_data['data']=$post['data'][$key];
				$insert_data['price']=$post['price'][$key];
				$insert_data['number']=$post['number'][$key];
				$insert_data['created_at']=date('Y-m-d H:i:s');
				
				if (!empty($post['sold'][$key]))
					$insert_data['is_sold']=1;
				else
					$insert_data['is_sold']=0;

				$res=$this->cnc_model->getData('records','*',['catg_id'=>$post['catg_id'][$key],'number'=>$post['number'][$key]]);

				if (empty($res))
					$insert_id=$this->cnc_model->rowInsert('records',$insert_data);
				else{
					unset($insert_data['catg_id']);
					unset($insert_data['number']);
					unset($insert_data['created_at']);
					$insert_data['updated_at']=date('Y-m-d H:i:s');
					$insert_id=$this->cnc_model->rowUpdate('records',$insert_data,['catg_id'=>$post['catg_id'][$key],'number'=>$post['number'][$key]]);
				}
				$s_no++;

			}else{
				$f_no++;
				$validate=false;
			}
		}
		if (!$validate) 
		{	if ($s_no > 0) 
				$this->session->set_flashdata('success', $s_no.' Record successfully inserted');
			$this->session->set_flashdata('error', $f_no.' Record failed!, fields are missing');
			 redirect('admin/records');
		}			
		if ($insert_id) {
			$this->session->set_flashdata('success', 'All Records successfully inserted');
			 redirect('admin/records'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/records');
		}
	}else{
		$this->session->set_flashdata('error', 'All fields are required');
			 redirect('admin/records');
	}
}

function update_records(){
	$post=$this->input->post();
	if (!empty($post)) {
		$id=$post['id'];	
		if (!empty($post['is_sold']))
			$post['is_sold']=1;
		else
			$post['is_sold']=0;
		$post['updated_at']=date('Y-m-d H:i:s');
		unset($post['id']);
		$res=$this->cnc_model->rowUpdate('records',$post,['id'=>$id]);
		if ($res) {
			$this->session->set_flashdata('success', 'Records successfully Updated');
			 redirect('admin/records'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/records');
		}
	}else{
		$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/records');
	}
}

function delete_record(){
	$id=$this->input->post('id');
	$this->cnc_model->rowsDelete('records',array('id'=>$id));
	$this->session->set_flashdata('success', 'Records Successfully Deleted');
	echo "true";		 
}

function delete_range_record(){
	$cat=$this->input->post('cat');
	$number_one = $this->input->post('number_one');
	$number_two = $this->input->post('number_two');
	$this->cnc_model->rowsDelete('records',array('catg_id'=>$cat,'number >='=>$number_one,'number <='=>$number_two));
	$this->session->set_flashdata('success', 'Records Successfully Deleted');
	echo "true";		 
}

function star_category(){
	$id=$this->input->post('id');
	$this->cnc_model->rowUpdate('category',['star_category'=>0],['star_category'=>1]);
	$this->cnc_model->rowUpdate('category',['star_category'=>1],['id'=>$id]);
	$this->session->set_flashdata('success', 'Category successfully set');
	echo 'success';
}
function getRecordsById(){
	$id=$this->input->post('id');
	$select="r.id,c.name as cname,g.name as gname,price,data,number,is_sold,g.is_featured,r.created_at,r.updated_at";
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
	$res=$this->cnc_model->getData('records r',$select,['r.id'=>$id],$join);
	$records=$res[0];
	echo json_encode($records);die();
}

function import(){
	$file=$_FILES['file'];
	if (!empty($file)) {
		$allowed = array('csv');
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
		    $file = fopen($file['tmp_name'],"r");
			$i=1;
			$count=0;
			$failed=0;
			while(! feof($file))
			{	
			    $fdata=fgetcsv($file);
			    if ($i > 2 && is_array($fdata)) {
					$catg=$this->cnc_model->getData('category','*',['name'=>$fdata[0]]);
					if (!empty($catg)) {
			    		$group=$this->cnc_model->getData('group_table','*',['name'=>$fdata[1]]);
			    		if (!empty($group)) {
			    			$res=$this->cnc_model->getData('records','*',['catg_id'=>$catg[0]['id'],'number'=>$fdata[4]]);
			    			$data['catg_id']=$catg[0]['id'];
			    			$data['group_id']=$group[0]['id'];
			    			$data['data']=$fdata[2];
			    			$data['price']=$fdata[3];
			    			$data['number']=$fdata[4];
			    			$data['is_sold']=($fdata[5]=='y')?1:0;
			    			$data['created_at']=date('Y-m-d H:i:s');
			    			
			    			if (empty($res))
			    				$this->cnc_model->rowInsert('records',$data);
			    			else{
			    				unset($data['catg_id']);
			    				unset($data['number']);
			    				unset($data['created_at']);
			    				$data['updated_at']=date('Y-m-d H:i:s');
			    				$this->cnc_model->rowUpdate('records',$data,['catg_id'=>$catg[0]['id'],'number'=>$fdata[4]]);
			    			}

			    			$count++;
			    		}else
			    			$failed++;
			    	}else
			    		$failed++;
				}
			    $i++;
			}
			if ($count>0) {
				if ($failed > 0)
					 $this->session->set_flashdata('error', $failed.' Record failed!, category or group not found');				
				$this->session->set_flashdata('success', $count.' Record successfully inserted');
				redirect('admin/records');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong');
			 	redirect('admin/records');
			}
		}else{
			$this->session->set_flashdata('error', 'Please upload valid excel file');
			 redirect('admin/records');
		}
	}else{
		$this->session->set_flashdata('error', 'File is required to upload');
			 redirect('admin/records');
	}
}

//import all numbers

function importallnumbers(){
	$file=$_FILES['file'];
	if (!empty($file)) {
		$allowed = array('csv');
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
		    $file = fopen($file['tmp_name'],"r");
			$i=1;
			$count=0;
			while(! feof($file))
			{	
			    $fdata=fgetcsv($file);
			    if ($i > 1 && is_array($fdata)) {

			    	$res=$this->cnc_model->getData('allnumbers','*',['number'=>$fdata[0]]);
		    			$data['number']=$fdata[0];
		    			$data['resultsuggest']=$fdata[1];
		    			$data['resultdata']=$fdata[2];
		    			$data['created_at']=date('Y-m-d H:i:s');
		    			
		    			if (empty($res)){
		    				$this->cnc_model->rowInsert('allnumbers',$data);
		    			}
		    			else{
		    				unset($data['number']);
		    				unset($data['created_at']);
		    				$data['updated_at']=date('Y-m-d H:i:s');
		    				$this->cnc_model->rowUpdate('allnumbers',$data,['id'=>$res[0]['id']]);
		    			}
                    $count++;
			    }
				$i++;
			}
			if ($count>0) {				
				$this->session->set_flashdata('success', $count.' Numbers successfully inserted');
				redirect('admin/records');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong');
			 	redirect('admin/records');
			}
		}else{
			$this->session->set_flashdata('error', 'Please upload valid excel file');
			 redirect('admin/records');
		}
	}else{
		$this->session->set_flashdata('error', 'File is required to upload');
			 redirect('admin/records');
	}
}

// Common Section

public function common_section(){
	$this->slag='common_section';
	$this->page='common_section_view';
	$this->load('common_section');
}

function get_common_records(){
	$common_section = $this->cnc_model->getData('common_section','*');
	$result = $this->get_common_section($common_section);
	$total_record = $this->cnc_model->getRowCount('common_section','*',false,false,false,false);
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $total_record,
            "iTotalDisplayRecords" => $total_record,
            "aaData" => array()
        );
        
        foreach ($result as $key=>$val) {
        	
            $output['aaData'][]=array(($key+1),
            		$val['category_order'],
            		$val['category'],
            		$val['month'],
            		'<button type="button" data_id="'.$val['id'].'" class="edit yellow btn-circle btn-sm btn" href="javascript:;"><i class="fa fa-edit"></i></button>',
            		
				);
        }
        echo json_encode($output);
        die;
}

public function get_common_section($c_section){

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
			
			   $month=date("m",strtotime("+3 week"));
			   $n_month = $month_array[$month];
			   $c_section[$key]['month']=$n_month;
                break;
            }

            if($value['category_order'] == 3){
		        $month = date("m",strtotime("+6 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }

	        if($value['category_order'] == 4){
		        $month = date("m",strtotime("+9 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 5){
		        $month = date("m",strtotime("+12 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 6){
		        $month = date("m",strtotime("+15 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 7){
		        $month = date("m",strtotime("+18 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 8){
		        $month = date("m",strtotime("+21 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month'] = $n_month;
                break;
	        }
	        if($value['category_order'] == 9){
		        $month = date("m",strtotime("+24 week"));
			    $n_month = $month_array[$month];
			    $c_section[$key]['month']=$n_month;
                break;
	        }
        } 
    }
    return  $c_section;
} 

function getCategoryById(){
	$id=$this->input->post('id');
	$res=$this->cnc_model->getData('common_section','*',['id'=>$id]);
	$records=$res[0];
	echo json_encode($records);die();
}

function update_common_section(){
	$post=$this->input->post();
	if(!empty($post)){
		$id=$post['id'];
		$post['updated_at']=date('Y-m-d H:i:s');

        $res=$this->cnc_model->rowUpdate('common_section',$post,['id'=>$id]);
		if ($res) {
			$this->session->set_flashdata('success', 'Category successfully Updated');
			 redirect('admin/common_section'); 
		}else{
			$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/common_section');
		}
	}else{
		$this->session->set_flashdata('error', 'Something went wrong');
			 redirect('admin/common_section');
	}
	
}

}




