<?php
/*
Plugin Name: Lazy Load with Base64 for Pagespeed online
Description: Pagespeed Lazy Load with Base64 plugin encodes small images by preserving SEO and lazy loads images only when the user reaches particular section.
Author: Shivaranjani & Team Hansoftech
Version: 1.0.2
*/
/***Begin -- Userinterface and settings***/
	include "UI/base64_userinterface_settings.php";
	include "UI/base64_userinterface.php";
/***End -- Userinterface and settings***/		
	$base64_do_not_include_admin_checkbox = esc_attr(get_option('base64_do_not_include_admin_checkbox'));
	$lazy_load_do_not_include_admin_checkbox = esc_attr(get_option('lazy_load_do_not_include_admin_checkbox'));	
	
if (is_admin() && ($base64_do_not_include_admin_checkbox == 1) && ($lazy_load_do_not_include_admin_checkbox == 1)) 
{
	return;
}
else
{	
	$enable_base64 = esc_attr(get_option('base64_data_checkbox'));
	$enable_lazy_load = esc_attr(get_option('lazy_load_data_checkbox'));	
	if ($enable_base64||$enable_lazy_load)
	{
		define('PSLLB_ENABLE_BASE64',$enable_base64);
		define('PSLLB_ENABLE_LAZY_LOAD',$enable_lazy_load);
		if (PSLLB_ENABLE_BASE64)
		{
			if(is_admin() && $base64_do_not_include_admin_checkbox == 1)
			{
				return;
			}
			else
			{		
				$base64_max_image_size_checkbox=esc_attr(get_option('base64_set_max_file_size_checkbox'));
				$base64_max_image_size_content=esc_attr(get_option('base64_set_max_file_size_content'));
				$base64_include_image_checkbox=esc_attr(get_option('base64_include_image_checkbox'));
				$base64_include_image_content=esc_url(get_option('base64_include_image_content'));
				$base64_include_og_url_checkbox=esc_attr(get_option('base64_include_og_url_for_image_checkbox'));
				$base64_include_og_url_content=esc_url(get_option('base64_include_og_url_for_image_content'));
			}
		}
		if (PSLLB_ENABLE_LAZY_LOAD)
		{ 
			if(is_admin() && $lazy_load_do_not_include_admin_checkbox == 1)
			{
				return;
			}
			else
			{
				add_action( 'init', 'base64_lazy_load' );
				function base64_lazy_load() 
				{
					wp_enqueue_script( 'lazymin', plugin_dir_url( __FILE__ ) . 'js/lazysize_shivi.min.js', true );
				}
				$lazy_load_exclude_image_checkbox = esc_attr(get_option('lazy_load_exclude_image_checkbox'));
				$lazy_load_exclude_image_content = esc_url(get_option('lazy_load_exclude_image_content'));
			}			
		}
		if 	($base64_max_image_size_checkbox==1)
		{			
			if ( ! function_exists( 'get_home_path' ) ) 
			{
				$content_base=ABSPATH;
			} 
			else 
				$content_base=get_home_path();
				
			define ( 'PSLLB_BASE64_SERVER_BASE_URL',$content_base);
			if  ($base64_max_image_size_content>0)
				define ( 'PSLLB_BASE64_MAX_FILE_SIZE',$base64_max_image_size_content*1024);
			else
				define ( 'PSLLB_BASE64_MAX_FILE_SIZE',6000);	
		}
		if 	(($base64_include_image_checkbox==1)&&($base64_include_image_content))
		{	
			$base64_include_image_content=$base64_include_image_content.",";
			$base64_include_image=explode(",",$base64_include_image_content);
			define ( 'PSLLB_BASE64_INCLUDE_IMAGE',$base64_include_image);
		}
		else
			define ( 'PSLLB_BASE64_INCLUDE_IMAGE',array(''));	
		
		if 	($base64_include_og_url_checkbox==1)
		{	
			$base64_include_og_url=explode(",",$base64_include_og_url_content);
			if (!empty($base64_include_og_url))
			{
				define ( 'PSLLB_BASE64_INCLUDE_OG_URL',$base64_include_og_url);
				add_action ('wp_head','PSLLB_base64_add_og_url',1);
			}	
		}
		if 	(($lazy_load_exclude_image_checkbox==1)&&($lazy_load_exclude_image_content))
		{	
			$lazy_load_exclude_image_content=$lazy_load_exclude_image_content.",";
			$lazy_load_exclude_image_url=explode(",",$lazy_load_exclude_image_content);
			define ( 'PSLLB_LAZY_LOAD_EXCLUDE_URL',$lazy_load_exclude_image_url);
		}
		else
			define ( 'PSLLB_LAZY_LOAD_EXCLUDE_URL',array(''));	
		function PSLLB_base64_buffer_stop()
		{
		   ob_end_flush();
		}
		function PSLLB_base64_buffer_callback($buffer)
		{
			$search = '(<img\s+[^>]+>)';
			$buffer = preg_replace_callback($search, 'PSLLB_base64_img_handler', $buffer);
			return $buffer;
		}
		ob_start('PSLLB_base64_buffer_callback');
		add_action('shutdown', 'PSLLB_base64_buffer_stop');
		function PSLLB_base64_img_handler($matches) 
		{ 
			$image_element = $matches[0];
			$pattern = '/(src=["\'])([^"\']+)(["\'])/'; 
			$image_element = preg_replace_callback($pattern, "PSLLB_base64_src_handler", $image_element);		
			if (strpos($image_element,'tempclass="lazyload"')) 
				$image_element='<noscript>'.$matches[0].'</noscript>'.PSLLB_base64_class_swap($image_element);
			return $image_element;
		}
		function PSLLB_base64_class_swap($img)
		{
			$img=str_replace(" class"," data-class",$img);
			$img=str_replace(" tempclass"," class",$img);
			return $img;
		}
		function PSLLB_base64_src_handler($matchess) 
		{		
			
			if (strpos($matchess[2],"data:image")>-1)
				return  $matchess[1] . $matchess[2] . $matchess[3];	
			$image_file_name = PSLLB_http_filename($matchess[2]);	
			$image_size = filesize($image_file_name);
			
			if (PSLLB_ENABLE_BASE64)
			{	
				if (($image_size<=PSLLB_BASE64_MAX_FILE_SIZE)||(in_array($matchess[2],PSLLB_BASE64_INCLUDE_IMAGE)))
					return  $matchess[1] . PSLLB_base64_encoder($matchess[2]) . $matchess[3];
			}
			if (PSLLB_ENABLE_LAZY_LOAD)
			{	
				if (!(in_array($matchess[2],PSLLB_LAZY_LOAD_EXCLUDE_URL)))
					return ' tempclass="lazyload" src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20125%20125%22%3E%3C/svg%3E" data-src="'.$matchess[2].'" ';
			}	
			return  $matchess[1] . $matchess[2] . $matchess[3];	
			
		}	
		function PSLLB_http_filename($match)
		{					
			$part_filename=explode(site_url(),$match);
			$return_filename=PSLLB_BASE64_SERVER_BASE_URL.$part_filename[1];		
			return $return_filename;
		} 
		function PSLLB_base64_encoder($filename) 
		{
			$mime = PSLLB_base64_get_mime($filename);		
			$data = base64_encode(file_get_contents($filename));		
			return "data:$mime;base64,$data";
		}
		function PSLLB_base64_get_mime($file)
		{
			$filetype=end(explode('.',$file));
			$mime='image/'.$filetype;
			return $mime;
		}	
		function PSLLB_base64_add_og_url()
		{
			foreach (PSLLB_BASE64_INCLUDE_OG_URL as $link) 
			{
				echo '<meta property="og:image" content="'.$link.'" >';
			}
		}
	}
}	
?>