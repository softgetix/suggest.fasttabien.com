 <?php 
	require_once(W3SPEEDUP_PATH . '/admin/class_admin.php');
	//require_once(W3SPEEDUP_PATH . '/includes/class_image.php');
	$result = $this->get_option( 'w3_speedup_option');
	$w3_speedup_admin = new w3speedup_admin();
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="W3speedup/assets/css/admin.css?ver=<?php echo rand(10,1000); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.tab-content > .tab-pane.active{
	opacity:1 !important;
	display:block !important;
}
</style>
<main class="admin-speedup">
	<div class="col-md-12 top_panel_container">
		<div class="top_panel">
			<div class="col-md-6 logo_container">
				<img class="logo" src="W3speedup/assets/images/w3-logo.png">
			</div>

			<div class="col-md-6 support_section">
				<div class="right_section">
					<div class="doc">
						Need help or have question?<br />
						<a href="https://w3speedup.pro/w3speedup-documentation/" target="_blank">Check our documentation.</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2">
	<ul class="nav nav-tabs ">
	<li class="active w3_general"><a data-toggle="tab" href="#general">General</a></li>
	<li class="w3_css"><a data-toggle="tab" href="#css">Css</a></li>
    <li class="w3_js"><a data-toggle="tab" href="#js">Javascript</a></li>
	<li class="w3_cache"><a data-toggle="tab" href="#cache">Cache</a></li>
    <li class="w3_opt_img"><a data-toggle="tab" href="#opt_img">Image Optimization</a></li>
	<li class="w3_import"><a data-toggle="tab" href="#import">Import/Export</a></li>
	 	 
	</ul>	
	
	<div class="addi-contact-info">
		<div class="need-support">
			<div class="icon-supp"><i class="fa fa-headphones" aria-hidden="true"></i></div>
				<div class="info-supp">
					<h3>Need Support</h3>
					<a class="btn-supp" href="https://w3speedup.pro/contact-us/">Contact Us</a>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<form method="post">
		<div class="tab-content col-md-10">
			<section id="general" class="tab-pane fade in active">
				<div class="header">
					<div class="heading_container">
					<h4 class="heading">General Setting</h4>
					<h4 class="sub_heading">Optimization Level</h4> <span class="info"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span>
					</div>
					 <div class="icon_container"><span class="h-icon"><img src="W3speedup/assets/images/general-setting-icn.png"></span></div>
				</div>
				<table class="form-table">

				<tbody>
					<tr>
						<th scope="row">License Key<span class="info"></span><span class="info-display">Activate key to get updates and access to all features of the plugin.</span></th>
						<td>
							<input type="text" name="license_key" value="<?php echo !empty($result['license_key']) ? $result['license_key'] : '';?>" style="width:300px;margin-right:20px;">
							<input type="hidden" name="w3_api_url" value="<?php echo !empty($result['w3_api_url']) ? $result['w3_api_url'] : '';?>">
							<input type="hidden" name="is_activated" value="<?php echo !empty($result['is_activated']) ? $result['is_activated'] : '';?>">
							<?php if(!empty($result['license_key']) && !empty($result['is_activated'])){
								?>
								<i class="fa fa-check-circle-o" aria-hidden="true"></i>
								<?php
							}else{ ?>
								<button class="activate-key" type="button">Activate</button>
							<?php }
							?>
							
						</td>
					</tr>
					<?php /*<tr class="col-md-6 no-info">
						<th scope="row">Enable html cache<span class="info"></span><span class="info-display">Enable to turn on html cache.' ); ?></span></th>
						<td><input type="checkbox" name="html_cache" <?php if (!empty($result['html_cache']) && $result['html_cache'] == "on") echo "checked";?> ></td>
					</tr> */ ?>
					<tr>
						<th scope="row">Turn ON optimization<span class="info"></span><span class="info-display">Site will start to optimize. All optimization settings will be applied.</span></th>
						<td>
							<input type="checkbox" name="optimization_on" <?php if (!empty($result['optimization_on']) && $result['optimization_on'] == "on") echo "checked";?> >
							
							<input type="hidden" name="ws_action" value="cache">
						</td>
					</tr>
					<tr>
						<th scope="row">CDN url<span class="info"></span><span class="info-display">Enter CDN url with http or https' ); ?></span></th>
						<td><input type="text" name="cdn" placeholder="Please Enter CDN url here" value="<?php if(!empty($result['cdn'])) echo $result['cdn'];?>">
						</td>
					</tr>
					<tr>
						<th scope="row">Exclude file extensions from cdn<span class="info"></span><span class="info-display">Enter extension separated by comma which are to excluded from CDN. For eg. (.woff, .eot)' ); ?></span></th>
						<td><input type="text" name="exclude_cdn" placeholder="Please Enter extensions separated by comma ie .jpg, .woff" value="<?php if(!empty($result['exclude_cdn'])) echo $result['exclude_cdn'];?>">
						</td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Enable leverage browsing cache<span class="info"></span><span class="info-display">Enable to turn on leverage browsing cache.' ); ?></span></th>
						<td><input type="checkbox" name="lbc" <?php if (!empty($result['lbc']) && $result['lbc'] == "on") echo "checked";?> ></td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Enable Gzip compression<span class="info"></span><span class="info-display">Enable to turn on Gzip compresssion.' ); ?></span></th>
						<td><input type="checkbox" name="gzip" <?php if (!empty($result['gzip']) && $result['gzip'] == "on") echo "checked";?> ></td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Remove query parmaters<span class="info"></span><span class="info-display">Enable to remove query paramters from resources.' ); ?></span></th>
						<td><input type="checkbox" name="remquery" <?php if (!empty($result['remquery']) && $result['remquery'] == "on") echo "checked";?> ></td>
					</tr>
					
					<tr class="col-md-6 no-info">
						<th scope="row">Enable lazy Load<span class="info"></span><span class="info-display">This will enable lazy loading of resources.' ); ?></span></th>
						<td><span class="td-span">Image</span><input type="checkbox" name="lazy_load" <?php if (!empty($result['lazy_load']) && $result['lazy_load'] == "on") echo "checked";?> ><span class="td-span">Iframe</span><input type="checkbox" name="lazy_load_iframe" <?php if (!empty($result['lazy_load_iframe']) && $result['lazy_load_iframe'] == "on") echo "checked";?> ><span class="td-span">Video</span><input type="checkbox" name="lazy_load_video" <?php if (!empty($result['lazy_load_video']) && $result['lazy_load_video'] == "on") echo "checked";?> >
						</td>
					</tr>
					<tr class="col-md-6 no-info">	
						<th scope="row">Start Lazy load Images, Videos, Iframes pixels below the screen<span class="info"></span><span class="info-display">Enter pixels to start lazy loading of resources which are below the viewable page. For eg. 200' ); ?></span></th>
						<td><input style="width:50px;" type="text" name="lazy_load_px" value="<?php echo !empty($result['lazy_load_px']) ? $result['lazy_load_px'] : 200;?>" > &nbsp;px</td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Enable Webp support<span class="info"></span><span class="info-display">This will convert and render images in webp.' ); ?></span></th>
						<td><span class="td-span">Jpg</span><input type="checkbox" name="webp_jpg" <?php if (!empty($result['webp_jpg']) && $result['webp_jpg'] == "on") echo "checked";?> ><span class="td-span">Png</span><input type="checkbox" name="webp_png" <?php if (!empty($result['webp_png']) && $result['webp_png'] == "on") echo "checked";?> >
						</td>
						
					</tr>
					<tr class="col-md-6 no-info">	
						<th scope="row">Webp image quality<span class="info"></span><span class="info-display">90 recommended' ); ?></span></th>
						<td><input style="width:50px;" type="text" name="webp_quality" value="<?php echo !empty($result['webp_quality']) ? $result['webp_quality'] : 90;?>" ></td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Optimize jpg/png images<span class="info"></span><span class="info-display">Enable to optimize jpg and png images.' ); ?></span></th>
						<td><input type="checkbox" name="opt_jpg_png" <?php if (!empty($result['opt_jpg_png']) && $result['opt_jpg_png'] == "on") echo "checked";?> ></td>
					</tr>
					<tr class="col-md-6 no-info">	
						<th scope="row">Jpg png image quality<span class="info"></span><span class="info-display">90 recommended' ); ?></span></th>
						<td><input style="width:50px;" type="text" name="img_quality" value="<?php echo !empty($result['img_quality']) ? $result['img_quality'] : 90;?>" ></td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Optimize images on the go<span class="info"></span><span class="info-display">Automatically optimize images when site pages are crawled. Recommended to turn off after initial first crawl of all pages.' ); ?></span></th>
						<td><input type="checkbox" name="opt_img_on_the_go" <?php if (!empty($result['opt_img_on_the_go']) && $result['opt_img_on_the_go'] == "on") echo "checked";?> ></td>
					</tr>
					<tr class="col-md-6 no-info">
						<th scope="row">Automatically optimize images on upload<span class="info"></span><span class="info-display">Automatically optimize new images on upload. Turn off if upload of images is taking more than expected.' ); ?></span></th>
						<td><input type="checkbox" name="opt_upload" <?php if (!empty($result['opt_upload']) && $result['opt_upload'] == "on") echo "checked";?> ></td>
					</tr>
					
					
					
					<tr>
						<th scope="row">Exclude images from Lazy Loading<span class="info"></span><span class="info-display">Enter any matching text of image tag to exclude from lazy loading. For more than one exclusion, enter in a new line. For eg. (class / Id / url / alt). Images will still continue to be optimized and rendered in webp if respective settings are turned on' ); ?>.</span></th>
						<td><textarea name="exclude_lazy_load" rows="10" cols="16" placeholder="Please Enter matching text of the image here" ><?php if (!empty($result['exclude_lazy_load'])) echo stripslashes($result['exclude_lazy_load']);?></textarea></td>
					</tr>
					<tr>
					    <th scope="row">Optimize Image Path<span class="info"></span><span class="info-display">Enter path where all images needs to be optimized.</span></th>
						<td><input type="text" name="optimize_image_path" placeholder="Please Enter full image folder path" value="<?php echo !empty($result['optimize_image_path']) ? $result['optimize_image_path'] : ''; ?>"><div></div></td> 
					</tr>
					
					<tr>
						<th scope="row">Exclude Pages From Optimization<span class="info"></span><span class="info-display">Enter slug of the url to exclude from optimization. For  eg. (/blog/). For home page, enter home url' ); ?>.</span></th>
						<td><textarea name="exclude_pages_from_optimization" rows="10" cols="16" placeholder="Please Enter Page Url" ><?php if(!empty($result['exclude_pages_from_optimization'])) echo stripslashes($result['exclude_pages_from_optimization']);?></textarea></td>
					</tr>
					<tr>
					    <th scope="row">Cache Path<span class="info"></span><span class="info-display">Enter path where cache can be stored. Leave empty for default path' ); ?>.</span></th>
						<td><input type="text" name="cache_path" placeholder="Please Enter full cache path" value="<?php echo !empty($result['cache_path']) ? $result['cache_path'] : ''; ?>"><div>Default cache path:&nbsp;&nbsp;<?php echo $this->add_settings['root_cache_path']; ?></div></td> 
					</tr>
					
					<tr>
						<th scope="row"><input type="submit" value="Save Changes"></th>
						<td></td>
					</tr>
				</tbody>
			</table>
			<script>
			jQuery('.activate-key').click(function(){
				var key = jQuery("[name='license_key']");
				if(key.val() == ''){
					alert("Please enter key");
					return false;
				}
				jQuery(this).prop('disabled',true);
				activate_license_key(key);
				
			});
			function activate_license_key(key){
				
				jQuery.ajax({
					url: "<?php echo $this->add_settings['home_url']; ?>/demo",
					data: {
						'action': 'w3speedup_validate_license_key',
						'key' : key.val()
					},
					success:function(data) {
						// This outputs the result of the ajax request
						data=jQuery.parseJSON( data );
						if(data[1] == 'verified'){
							jQuery('[name="is_activated"]').val(data[2]);
							key.closest('form').submit();
						}else{
							alert("Invalid key");
						}
						jQuery('.activate-key').prop('disabled',false);
						console.log(data[1]);
						console.log(data);
					},
					error: function(errorThrown){
						console.log(errorThrown);
					}
				});
			}
		</script>
		</section>
		<section id="css">
		<div class="header">
		<div class="heading_container no_subhead">
		<h4 class="heading">CSS Optimization</h4>
		
		<span class="info"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span>
		</div>
		<div class="icon_container"> <span class="h-icon"><img src="W3speedup/assets/images/css-h.png"></span></div>
		</div><table class="form-table">

				<tbody>
				<tr>
						<th scope="row">Enable css minification<span class="info"></span><span class="info-display">Turn on to optimize css.</span></th>
						<td><input type="checkbox" name="css" <?php if (!empty($result['css']) && $result['css'] == "on") echo "checked";?> ></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">Load critical Css<span class="info"></span><span class="info-display">Preload generated crictical css.</span></th>
						<td><input type="checkbox" name="load_critical_css" <?php if (!empty($result['load_critical_css']) && $result['load_critical_css'] == "on") echo "checked";?> ></td>
					</tr>
					
					<tr>
						<th scope="row">Exclude link tag css from minification<span class="info"></span><span class="info-display">Enter matching text of css link url, which are to be excluded from css optimization. Each Exclusion to be entered in a new line.</span></th>
						<td><textarea name="exclude_css" rows="10" cols="16" placeholder="Please Enter part of link tag css here" ><?php if (!empty($result['exclude_css'])) echo $result['exclude_css'];?></textarea></td>
					</tr>
					<tr>
						<th scope="row">Force lazy load link tag css<span class="info"></span><span class="info-display">Enter matching text of css link url, which are forced to be lazyloaded. Each Exclusion to be entered in a new line.</span></th>
						<td><textarea name="force_lazyload_css" rows="10" cols="16" placeholder="Please Enter part of link tag css here" ><?php if (!empty($result['force_lazyload_css'])) echo $result['force_lazyload_css'];?></textarea></td>
					</tr>
					
					<tr>
						<th scope="row">Load Secondary Css<span class="info"></span><span class="info-display">Choose when to load secondary css(which are not preloaded).</span></th>
						<td><select name="load_combined_css">
							<option value="on_page_load" <?php echo !empty($result['load_combined_css']) && $result['load_combined_css'] == 'on_page_load' ? 'selected' : '' ;?>>On Page Load</option>
							<option value="after_page_load" <?php echo !empty($result['load_combined_css']) && $result['load_combined_css'] == 'after_page_load' ? 'selected' : '' ;?>>After Page Load</option>
							</select>
						</td>
					</tr>
					<tr>
					<th scope="row">Delay secondary css by<span class="info"></span><span class="info-display">Enter in seconds to delay loading of secondary css.</span></th>
						<td>
						<input type="number" step="any" name="internal_css_delay_load" value="<?php echo !empty($result['internal_css_delay_load']) ? $result['internal_css_delay_load'] : 10 ;?>" >
						</td>
					</tr>
					<tr>
						<th scope="row">Combine Google fonts<span class="info"></span><span class="info-display">Turn on to combine all google fonts.</span></th>
						<td><input type="checkbox" name="google_fonts" <?php if (!empty($result['google_fonts']) && $result['google_fonts'] == "on") echo "checked";?> ></td>
					</tr>
					<th scope="row">Delay google fonts by<span class="info"></span><span class="info-display">Enter in seconds to delay loading of combined google fonts.</span></th>
						<td>
						<input type="number" step="any" name="google_fonts_delay_load" value="<?php echo !empty($result['google_fonts_delay_load']) ? $result['google_fonts_delay_load'] : 2 ;?>" >
						</td>
					</tr>
					<tr>
						<th scope="row">Exclude page from Load Combined Css<span class="info"></span><span class="info-display">Enter slug of the page to exclude from css optimization</span></th>
						<td><textarea name="exclude_page_from_load_combined_css" rows="10" cols="16" placeholder="Please Enter css Page Url." ><?php if (!empty($result['exclude_page_from_load_combined_css'])) echo stripslashes($result['exclude_page_from_load_combined_css']);?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">Custom css to load with preload css<span class="info"></span><span class="info-display">Enter custom css which works only when css optimization is applied.</span></th>
						<td><textarea name="custom_css" rows="10" cols="16" placeholder="Please Enter css without the style tag." ><?php if (!empty($result['custom_css'])) echo $result['custom_css'];?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row"><input type="submit" value="Save Changes"></th>
						<td></td>
					</tr>
				</tbody>
			</table>
		</section>
		<section id="js" class="white-bg-speedup">
			<div class="header">
			<div class="heading_container no_subhead">
				<h4 class="heading">Javascript Optimization</h4>
				
				</span><span class="info-display"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span></div> 
				<div class="icon_container"><span class="h-icon"><img src="W3speedup/assets/images/js-flat-js-dashboard.png"></span></div>
			</div>
			<table class="form-table">

				<tbody>
					<tr>
						<th scope="row">Enable js minification<span class="info"></span><span class="info-display">Turn on to optimize javascript</span></th>
						<td><input type="checkbox" name="js" <?php if (!empty($result['js']) && $result['js'] == "on") echo "checked";?> ></td>
					</tr>
					<tr>
						<th scope="row">Exclude Javascript tags from combine<span class="info"></span><span class="info-display">Enter matching text of javascript url, which are to be excluded from javascript optimization. Each exclusion to be entered in new line.</span></th>
						<td><textarea name="exclude_javascript" rows="10" cols="16" placeholder="Please Enter matching text of the javascript here" ><?php if (!empty($result['exclude_javascript'])) echo $result['exclude_javascript'];?></textarea></td>
						<td class="top">Defer&nbsp;<input type="checkbox" name="exclude_js_defer" <?php if (!empty($result['exclude_js_defer']) && $result['exclude_js_defer'] == "on") echo "checked";?> ></td>
					</tr>
					<tr>
						<th scope="row">Preload Custom Javascript<span class="info"></span><span class="info-display">Enter javascript code which needs to be loaded before page load.</span></th>
						<td><textarea name="custom_javascript" rows="10" cols="16" placeholder="Please javascript without script tag" ><?php if (!empty($result['custom_javascript'])) echo stripslashes($result['custom_javascript']);?></textarea></td>
						<td class="top">Load as file&nbsp;<input type="checkbox" name="custom_javascript_file" <?php if (!empty($result['custom_javascript_file']) && $result['custom_javascript_file'] == "on") echo "checked";?> >&nbsp;&nbsp;Defer&nbsp;<input type="checkbox" name="custom_javascript_defer" <?php if (!empty($result['custom_javascript_defer']) && $result['custom_javascript_defer'] == "on") echo "checked";?> ></td>
					</tr>
					<tr>
						<th scope="row">Exclude Inline Javascript from combine<span class="info"></span><span class="info-display">Enter matching text of inline script url, which needs to be excluded from deferring of javascript. Each exclusion to be entered in a new line.</span></th>
						<td><textarea name="exclude_inner_javascript" rows="10" cols="16" placeholder="Please Enter matching text of the inline javascript here" ><?php if (!empty($result['exclude_inner_javascript'])) echo stripslashes($result['exclude_inner_javascript']);?></textarea></td>
					</tr>
					<tr>
						<th scope="row">Force lazy load Javascript<span class="info"></span><span class="info-display">Enter matching text of inline javascript which needs to be forced to lazyload. Each lazyload javascript to be entered in a new line </span></th>
						<td><textarea name="force_lazy_load_inner_javascript" rows="10" cols="16" placeholder="Please Enter matching text of the inline javascript here" ><?php if (!empty($result['force_lazy_load_inner_javascript'])) echo stripslashes($result['force_lazy_load_inner_javascript']);?></textarea></td>
					</tr>
					<tr>
						<th scope="row">Load Combined Javascript<span class="info"></span><span class="info-display">Choose when to load combined javascript</span></th>
						<td><select name="load_combined_js">
						<option value="on_page_load" <?php echo !empty($result['load_combined_js']) && $result['load_combined_js'] == 'on_page_load' ? 'selected' : '' ;?>>On Page Load</option>
						<option value="after_page_load" <?php echo !empty($result['load_combined_js']) && $result['load_combined_js'] == 'after_page_load' ? 'selected' : '' ;?>>After Page Load</option>
						</select>
						</td>
						
					</tr>
					<tr>
					<th scope="row">Delay Internal Javascript Tags by<span class="info"></span><span class="info-display">Enter in seconds to delay loading of combined javascript</span></th>
						<td>
						<input type="number" step="any" name="internal_js_delay_load" value="<?php echo !empty($result['internal_js_delay_load']) ? $result['internal_js_delay_load'] : 10 ;?>" >
						</td>
					</tr>
					<?php /*<tr>
					<th scope="row">Delay External Javascript Tags by<span class="info"></span><span class="info-display">Enter in seconds to delay loading of external javascript</span></th>
						<td>
						<input type="number" step="any" name="js_delay_load" value="<?php echo !empty($result['js_delay_load']) ? $result['js_delay_load'] : 10 ;?>" >
						</td>
					</tr> */?>
					<tr>
						<th scope="row">Exclude page from Javascript Optimization<span class="info"></span><span class="info-display">Enter slug of the page to exclude from javascript optimization</span></th>
						<td><textarea name="exclude_page_from_load_combined_js" rows="10" cols="16" placeholder="Please Enter css Page Url" ><?php if (!empty($result['exclude_page_from_load_combined_js'])) echo stripslashes($result['exclude_page_from_load_combined_js']);?></textarea>
						</td>
						
					</tr>
					
					<tr>
						<th scope="row">Custom Javascript<span class="info"></span><span class="info-display">Enter javascript which needs to be loaded with combined javascript.</span></th>
						<td><textarea name="custom_js" rows="10" cols="16" placeholder="Please Enter js without the script tag" ><?php if (!empty($result['custom_js'])) echo stripslashes($result['custom_js']);?></textarea>
						</td>
					</tr>
					
					<tr>
						<th scope="row"><input type="submit" value="Save Changes"></th>
						<td></td>
					</tr>
				</tbody>
			</table>
		</section>
		<section id="cache" class="tab-pane fade">
		<div class="header">
		<div class="heading_container no_subhead">
		<h4 class="heading">Cache</h4>
		
		<span class="info"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span>
		</div>
		<div class="icon_container"> <span class="h-icon"><img src="W3speedup/assets/images/cache-icon.png"></span></div>
		</div><table class="form-table">

				<tbody>
					<tr>
						<th scope="row">Delete js/css cache<span class="info"></span><span class="info-display">Delete javascript and css combined and minified files.</span></th>
						<td><button type="button" id="del_js_css_cache">Delete Now</button></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">Delete critical css cache<span class="info"></span><span class="info-display">Delete critical css cache only when you have made any changes to style. This may take considerable amount of time to regenerate depending upon the pages on the site.</span></th>
						<td><button type="button" id="del_critical_css_cache">Delete Now</button></td>
						<td></td>
					</tr>
					
				</tbody>
			</table>
			<script>
			</script>
		</section>
	</form>
	<section id="opt_img" class="tab-pane fade">
	<div class="header">
	<div class="heading_container no_subhead">
		<h4 class="heading">Image Optimization</h4>
		
<span class="info"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span></div>
<div class="icon_container"> <span class="h-icon"><img src="W3speedup/assets/images/img-optimzation-icn.png"></span></div>
		</div>
		<form method="post">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">Image Src</th>
						<th scope="row">Width<input type="hidden" name="ws_action" value="image_fields"></th>
					</tr>
					
					<?php 
					
					$opti_images = isset($_POST['optimiz_images']) ?  $_POST['optimiz_images'] : array() ; 
					if(!empty($opti_images)){
						foreach($opti_images as $value){ 
							if(!empty($value['src'])){
								$image_url = $value['src'] ;
								$image_width = !empty($value['width']) ? $value['width'] : '' ;
								echo '<tr><td>'.$image_url.'</td>' ; 
								echo '<td>'.get_ws_optimize_image($image_url, $image_width).'</td></tr>';
							}
						}
					}
					?>
					
					<tr class="image_src_field">
						<td style="width:70%; padding-left:0px;"><input type="text" name="optimiz_images[0][src]" placeholder="Please Enter Img Src" value=""></td>
						<td style="padding-left:0px;"><input type="text" name="optimiz_images[0][width]" placeholder="Please Enter Image Width" value=""></td>
						<td class="remove_image_field" style="width:5%; cursor:pointer;">X</td>
					</tr>
					
					<tr class="image_add_more_field">
						<th scope="row"><button type="button" class="add_more_image">Add More</button></th>
						<td></td>
					</tr>
					<tr>
						<th scope="row"><input type="submit" value="Optimize"></th>
						<td></td>
					</tr>
				</tbody>
			</table>
		</form>
		<?php 
			$img_arr = $this->get_option("w3_images",1);
			if(empty($img_to_opt)){
				if(!empty($this->settings['optimize_image_path'])){
					$this->w3_calc_images($this->settings['optimize_image_path']);
					$img_to_opt = count($this->w3_images);
					$this->update_option("w3_images",$this->w3_images,1);
					$this->update_option("w3_images_count",$img_to_opt,0);
				}
			}else{
				$img_remaining = count($img_arr);
				$img_to_opt = $this->get_option("w3_images_count",0);
			}
			$img_to_opt = empty($img_to_opt) ? 1 : $img_to_opt;
			$opt_offset = (int)$this->get_option('w3speedup_opt_offset');
			$img_remaining = (int)$img_to_opt-(int)$opt_offset;
		?>
		<h2><?php echo (($img_remaining == 0) ? 'Great Work!, all images are optimized' : 'Images to be optimized').' - <span class="progress-number">'.($img_remaining).'</span>'; ?></h2>
		<div class="progress-container">
			<div class="progress" style="<?php echo 'width:'.number_format((100-($img_remaining/$img_to_opt*100)),1).'%'?>">
			<?php echo '<span class="progress-percent">'.number_format((100-($img_remaining/$img_to_opt*100)),1).'%</span>'; ?>
			</div>
		</div>
		<button class="start_image_optimization <?php echo (($img_remaining <= 0) ? 'restart' : '');?>" type="button"><?php echo ($img_remaining <= 0) ? 'Start image optimization again' : 'Start image optimization'; ?></button>
		<script>
			var start_optimization = 0;
			var offset = 0;
			var img_to_opt = <?php echo $img_to_opt; ?>;
			jQuery('.start_image_optimization').click(function(){
				if(!start_optimization){
					if(jQuery(this).hasClass('restart')){
						start_optimization = 2;
					}else{
						start_optimization = 1;
					}
					jQuery(this).hide();
					do_optimization(start_optimization);
					console.log("optimization_start");
				}					
			});
			function do_optimization(opt){
				jQuery.ajax({
					url: "<?php echo $this->add_settings['w3speedup_url'].'/w3speedup.php'; ?>",
					data: {
						'action': 'w3speedup_optimize_image',
						'start_type' : opt
					},
					success:function(data) {
						// This outputs the result of the ajax request
						if(data && data != 'optimization running'){
							data=jQuery.parseJSON( data );
							console.log(data,offset);
							if(data.offset == -1){
								setTimeout(function(){
									do_optimization(1);
								},100);
							}else if(offset != data.offset){
								offset = data.offset;
								percent = (offset/img_to_opt*100);
								jQuery('.progress-container .progress').css('width',percent.toFixed(1)+"%");
								jQuery('.progress-container .progress .progress-percent').html(percent.toFixed(1)+"%");
								jQuery('.progress-number').html(img_to_opt - offset);
								setTimeout(function(){
									do_optimization(1);
								},100);
							}
						}else{
							setTimeout(function(){
								do_optimization(1);
							},100);
						}
					},
					error: function(errorThrown){
						console.log(errorThrown);
					}
				});
			}
		</script>
	</section> 
	<section id="import" class="tab-pane fade">
	<div class="header">
	<div class="heading_container no_subhead">
		<h4 class="heading">Import / Export</h4>
		
<span class="info"><a href="https://w3speedup.pro/w3speedup-documentation/">More info?</a></span></div>
<div class="icon_container"> <span class="h-icon"><img src="W3speedup/assets/images/import-export-icon.png"></span></div>
		</div>
		
			<table class="form-table">
				<tbody>
					<form id="import_form" method="post">
					<tr>
						<th scope="row">Import Settings<span class="info"></span><span class="info-display">Enter exported json code from W3speedup plugin import/export page.</span></th>
						<td><textarea id="import_text" name="import_text" rows="10" cols="16" placeholder="Enter json code" ></textarea>
						<button id="import_button" type="button">Import</button>
						</td>
					</tr>
					</form>
					<?php 
					$export_setting = $result;
					$export_setting['license_key'] = '';
					$export_setting['is_activated'] = '';
					?>
					<tr>
						<th scope="row">Export Settings<span class="info"></span><span class="info-display">Copy the code and save it in a file for future use.</span></th>
						<td><textarea rows="10" cols="16"><?php if (!empty($export_setting)) echo json_encode($export_setting);?></textarea>
						</td>
					</tr>
					
					
				</tbody>
			</table>
		
		
	</section> 
	
	
</div>

</main>
		

<script>
var custom_css_cd = 0;
var custom_js_cd = 0;
function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
jQuery(document).ready(function(){
	jQuery('#import_button').click(function(){
		var text = jQuery("#import_text").val();
		if(!IsJsonString(text)){
			alert("Data is courrpted, please check and enter again.");
		}
		jQuery('#import_form').submit();
	});
	jQuery('.w3_css').click(function(){
		if(!custom_css_cd){
			custom_css_cd = 1;		
		}
	});
	jQuery('.w3_js').click(function(){
		console.log("js click");
		if(!custom_js_cd){
			custom_js_cd = 1;			
		}
	});
	var hash = window.location.hash;
	if(hash){
		jQuery(hash).prop("checked","checked");
	}
	jQuery('[name="tabs"]').click(function(){
		window.location.hash = jQuery(this).attr("id");
	});
	jQuery('.add_more_image').click(function(){
		var index = jQuery(this).parents('#w3_opt_img_content').find('.image_src_field').length ;
		
		var $html = '<tr class="image_src_field"><td style="width:70%; padding-left:0px;"><input type="text" name="optimiz_images['+index+'][src]" placeholder="Please Enter Img Src" value=""></td><td style="padding-left:0px;"><input type="text" name="optimiz_images['+index+'][width]" placeholder="Please Enter Image Width" value=""></td><td class="remove_image_field" style="width:5%; cursor:pointer;">X</td></tr>';
		
		jQuery(this).parents('.image_add_more_field').before($html);				
	});

	jQuery('.add_more_combine_image').click(function(){
		
		var index =  jQuery(this).parents('#w3_opt_img_combin_content').find('.image_src_field').length ;
		//alert(index);
		
		var $html = '<tr class="image_src_field"><td style="width:70%; padding-left:0px;"><input type="text" name="combine_images['+index+'][src]" placeholder="Please Enter Img Src" value=""></td><td style="padding-left:0px;"><input type="text" name="combine_images['+index+'][position]" placeholder="Please Enter Image Width" value=""></td><td class="remove_image_field" style="width:5%; cursor:pointer;">X</td></tr>';
		
		jQuery(this).parents('.image_add_more_field').before($html);				
	});

	//jQuery('.remove_image_field').click(function(){
	jQuery( "table" ).delegate( ".remove_image_field", "click", function() {
		jQuery(this).parents('.image_src_field').remove();
	});
});
</script>