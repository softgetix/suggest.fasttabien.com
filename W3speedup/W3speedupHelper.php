<?php
define('W3SPEEDUP_PATH',__dir__);
include_once(W3SPEEDUP_PATH.'/includes/class_init.php');

class W3speedupHelper {
	
	function w3speedup_mandatory_config_admin_notice() {
		if ( version_compare( PHP_VERSION, '5.6', '<' )){
			echo '<div class="error"><p>' . __( 'W3speedup requires PHP 5.6 (or higher) to function properly.', 'w3speedup' ) . '</p></div>';
		}
		if ( !extension_loaded ('xml')){
			echo '<div class="error"><p>' . __( 'W3speedup requires PHP-XML module to function properly.', 'w3speedup' ) . '</p></div>';
		}
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
	}

	function w3speedup_optimize_image_on_upload($metadata, $attachment_id, $context="create"){
		require_once(W3SPEEDUP_PATH . '/includes/class_image.php');
		$w3_speedup_opt_img = new w3speedup_optimize_image();
		return $w3_speedup_opt_img->w3speedup_optimize_single_image($metadata, $attachment_id, $context);
	}

	function w3speedup_image_optimization_callback(){
		require_once(W3SPEEDUP_PATH . '/includes/class_image.php');	
		$w3_speedup_opt_img = new w3speedup_optimize_image();
		$w3_speedup_opt_img->w3speedup_optimize_image_callback();
	}
	
	function w3speedup_put_preload_css_callback(){
		$w3_speedup = new w3speedup(); 
		$w3_speedup->w3_put_preload_css();
		exit;
	}
	function w3speedup_preload_css_callback(){
		$w3_speedup = new w3speedup(); 
		$w3_speedup->w3_generate_preload_css();
		exit;
	}
	function w3speedup_add_image_optimization_schedule(){
		
		$this->w3speedup_image_optimization_callback();
		exit;
	}
	function w3speedup_add_mobile_thumbnail(){
		add_image_size( 'w3speedup-mobile', 595 );
	}

	function optimize_call($html = null){
		//return $html;
			/*
			
			require_once(W3SPEEDUP_PATH.'/admin/class_admin.php');
			$w3_speedup_admin = new w3speedup_admin(); 
			$w3_speedup_admin->launch();
			exit;
			
			
			*/
		if(!empty($_REQUEST['admin'])){	
			//require_once(W3SPEEDUP_PATH.'/admin/class_admin.php');
			//$w3_speedup_admin = new w3speedup_admin(); 
			//$w3_speedup_admin->launch();
			//header("Location: https://kratos3.com/giveaway", true, 301);
			exit();
		} elseif(!empty($_REQUEST['delete-w3-cache'])){
			echo $_SERVER['DOCUMENT_ROOT'].'/cache';
			// please remove ISPWP from root url 
			
			$this->delete_directory($_SERVER['DOCUMENT_ROOT'].'/cache');
			echo "delete cache successfully";
			exit;
		}elseif(!empty($_REQUEST['action']) && $_REQUEST['action'] == 'w3speedup_validate_license_key'){
			$w3_speedup = new w3speedup();
			$w3_speedup->w3speedup_validate_license_key();
		} elseif(!empty($_REQUEST['action']) && $_REQUEST['action'] == 'w3speedup_optimize_image'){
		$this->w3speedup_image_optimization_callback();
	}elseif(!empty($_REQUEST['w3_preload_css'])){
		$this->w3speedup_preload_css_callback();
	}elseif(!empty($_REQUEST['w3_put_preload_css'])){
		$this->w3speedup_put_preload_css_callback();
	}else {
			require_once(W3SPEEDUP_PATH.'/includes/class_minify_css.php');
			require_once(W3SPEEDUP_PATH.'/includes/class_js_minify.php');
			require_once(W3SPEEDUP_PATH.'/includes/class_html_optimize.php');
			$w3_optimize = new w3speed_html_optimize();
			echo $w3_optimize->w3_speedup($html); exit;	   
			$w3_optimize = new w3speed_html_optimize();
			$w3_optimize->start();		
		}
	}
	function w3speedup_before_start_optimization($html){
		return str_replace(array('https://safsocial.com/'),'https://www.safsocial.com/',$html);
	}

	function w3speedup_internal_css_customize($html,$path){
		
		if(strpos($path,'/assets/css/') !== false){
		   
			$html = str_replace(';!important;','!important;',$html);	
		}
		return $html;
	}
	function delete_directory($folderName) {
		if (is_dir($folderName))

           $folderHandle = opendir($folderName);

  

         if (!$folderHandle)

              return false;

  

         while($file = readdir($folderHandle)) {

               if ($file != "." && $file != "..") {

                    if (!is_dir($folderName."/".$file))

                         unlink($folderName."/".$file);

                    else

                        $this->delete_directory($folderName.'/'.$file);

               }

         }

  

         closedir($folderHandle);

         rmdir($folderName);

         return true;
	}
}

function w3speedup_internal_js_customize($html,$path){
	if(strpos($path,'js/main.js') !== false){
		$html = str_replace('$( document ).ready(function() {','setTimeout(function(){',$html);	
	}
	return $html;
}