<?php
/***For Base64 Code Checkbox***/

function PSLLB_base64_display() 
{
	$base64_data_checkbox=esc_attr(get_option('base64_data_checkbox'));
	$base64_include_image_checkbox = esc_attr(get_option('base64_include_image_checkbox'));
	$base64_include_image_content = esc_url(get_option('base64_include_image_content'));
	$base64_include_og_url_for_image_checkbox = esc_attr(get_option('base64_include_og_url_for_image_checkbox'));				
	$base64_include_og_url_for_image_checkbox = esc_attr(get_option('base64_include_og_url_for_image_checkbox'));				
	$base64_include_og_url_for_image_content = esc_url(get_option('base64_include_og_url_for_image_content'));
	$base64_set_max_file_size_content = esc_attr(get_option('base64_set_max_file_size_content'));
	$base64_set_max_file_size_checkbox = esc_attr(get_option('base64_set_max_file_size_checkbox'));
	$base64_do_not_include_admin_checkbox = esc_attr(get_option('base64_do_not_include_admin_checkbox','false'));
?>		
	<input type="checkbox" id="base64_data_checkbox" name="base64_data_checkbox" onclick="PSLLB_ShowHideDivBase64(this)" value="1" <?php checked(1, $base64_data_checkbox, true); ?> /><br><br>
<?php	
	if($base64_data_checkbox==1) 
    {
?>
		<div id="dvBase64DoNotIncludeAdminCheckbox" class="displayblock">		
<?php
	}
	else 
    {
?>
		<div id="dvBase64DoNotIncludeAdminCheckbox" class="displaynone">		
<?php
	}
?>	    	
<?php 
			if ($base64_do_not_include_admin_checkbox!=="false")
			{
				?>
				<input type="checkbox" id="base64_do_not_include_admin_checkbox" name="base64_do_not_include_admin_checkbox" value="1" <?php checked(1, $base64_do_not_include_admin_checkbox, true); ?> />
				<?php	
			}
			else
			{?>
				<input type="checkbox" id="base64_do_not_include_admin_checkbox" name="base64_do_not_include_admin_checkbox" value="1" <?php checked(1,1, true); ?> />
			<?php
			}
			?>
			<label class="bold">Do not include wp-admin images</label>
			<div class="infobox" >
							<div class="hover-icon" >
								<div class="icon" onmouseover="PSLLB_ShowBase64DoNotIncludeWPAdminImages(this);" onmouseout="PSLLB_HideBase64DoNotIncludeWPAdminImages(this);" >
									<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
								</div>
							</div>
							<div id="content_div_base64_do_not_include_wp_admin_images" class="content-div">						
								<div id="content_div-inside">
									On clicking “Do not include wp-admin” checkbox under enable base 64 section all your admin images will not be encoded.
								</div>
							</div>
			</div>	
	</div>
<?php	
	if($base64_data_checkbox==1) 
    {
?>
		<div id="dvSetMaxFileSizeCheckbox" class="displayblock">		
<?php
	}
	else 
    {
?>
		<div id="dvSetMaxFileSizeCheckbox" class="displaynone">		
<?php
	}
?>	
			<br><input type="checkbox" id="base64_set_max_file_size_checkbox" name="base64_set_max_file_size_checkbox" onclick="PSLLB_ShowHideDivBase64SetMaxFileSize(this)" value="1" <?php checked(1, $base64_set_max_file_size_checkbox, true); ?> />
            <label class="bold">Set maximum file size of images to be encoded</label>				
			<div class="infobox" >
				<div class="hover-icon" >
					<div class="icon" onmouseover="PSLLB_ShowSetMaxFileSize(this);" onmouseout="PSLLB_HideSetMaxFileSize(this);" >
						<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
					</div>
				</div>
				<div id="content_div_set_max_file_size" class="content-div">						
					<div id="content_div-inside">
						Here we have given the provision for the maximum file size of the image to be encoded as 100KB. It is highly recommended to base64 encode only the tiny images not larger than 1KB which has SEO value. If you try to base64 encode larger images, you will end up with a large page size and lose out the performance benefits.
					</div>
				</div>
			</div>	
<?php
	if($base64_set_max_file_size_checkbox==1) 
    {
?>
			<div id="dvSetMaxFileSizeContent" class="displayblock">
<?php
	}
	else 
    {
?>
			<div id="dvSetMaxFileSizeContent" class="displaynone">
<?php
	}
?>
				<label><br>Enter maximum image size</label><br><br><label>(e.g -- 1 KB)</label><br><br>
				<input type="number" name="base64_set_max_file_size_content" class="width70" step="0.01" min="0" max="100" value="<?php echo $base64_set_max_file_size_content;?>"><label>&nbsp;KB</label><br><br>
			</div>
			</div>	
<?php
	if($base64_data_checkbox==1) 
    {
?>		
		<div id="dvImageCheckbox" class="displayblock">			
<?php
	}
    else 
    {
?>			
		<div id="dvImageCheckbox" class="displaynone">			
<?php
	}
?>
			<input type="checkbox" id="base64_include_image_checkbox" name="base64_include_image_checkbox" onclick="PSLLB_ShowHideDivBase64IncludeImage(this)" value="1" <?php checked(1, $base64_include_image_checkbox, true); ?> />
			<label class="bold">Include bigger size image to be encoded</label>
			<div class="infobox" >
				<div class="hover-icon" >
					<div class="icon" onmouseover="PSLLB_ShowIncludeImages(this);" onmouseout="PSLLB_HideIncludeImages(this);" >
						<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
					</div>
				</div>
				<div id="content_div_include_images" class="content-div">						
					<div id="content_div-inside">
						We should exclude the images of larger file size and images having SEO value. Example of images to be included for base 64 encoding are Social media icons, Thumbnail images etc.
					</div>
				</div>
			</div>	
<?php	
	 if($base64_include_image_checkbox==1) 
     {	
?>
			<div id="dvImageContent" class="displayblock">
<?php
	 }
	 else 
     {	
?>
			 <div id="dvImageContent" class="displaynone">
<?php
	 }
?>
				<label><br>Enter complete URL to be included separated with a comma</label><br><br>
				<label>(e.g -- https://www.abc.com/wp-content/uploads/images/master_logo.png)</label><br><br>
				<?php
				if(isset($_POST['base64_include_image_content']))
				{
				$base64_include_image_content_sanitized = sanitize_textarea_field($_POST['base64_include_image_content']);
				update_post_meta($post->ID, 'base64_include_image_content', $base64_include_image_content_sanitized);
				}
				?>
				<textarea type="text" id="base64_include_image_content" name="base64_include_image_content" rows="2" cols="30" class="width500" onblur="PSLLB_CheckIncludeImageContentURL(this)" value="<?php echo $base64_include_image_content_sanitized; ?>"><?php echo $base64_include_image_content;?></textarea><br><br>
					 <div id="dvIncludeImageURLError" style="display: none">
						<label style="color:red;font:bold;"><b>Enter Valid URL</b></label>
					 </div><br/>
			</div>
		</div>		
<?php
	if($base64_data_checkbox==1) 
	{	
?>		
		<div id="dvOgUrlCheckbox" class="displayblock">		
<?php
	}
	else 
	{
?>			
		<div id="dvOgUrlCheckbox" class="displaynone">				
<?php
	}
?>
			<input type="checkbox" id="base64_include_og_url_for_image_checkbox" name="base64_include_og_url_for_image_checkbox" onclick="PSLLB_ShowHideDivBase64IncludeOgUrl(this)" value="1" <?php checked(1, $base64_include_og_url_for_image_checkbox, true); ?> />
			<label class="bold">Include OG URL for the following base64 encoded images</label>
			<div class="infobox">
				<div class="hover-icon" >
					<div class="icon" onmouseover="PSLLB_ShowIncludeOGUrl(this);" onmouseout="PSLLB_HideIncludeOGUrl(this);" >
						<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
					</div>
				</div>
				<div id="content_div_og_url" class="content-div">				
					<div id="content_div-inside">
						Base 64 images are not indexed by search engine, so we are going for open graph tag format to make the images crawled by search engine.
					</div>
				</div>
			</div>	
<?php	
	 if($base64_include_og_url_for_image_checkbox==1) 
	 {
?>
			<div id="dvOgUrlContent" class="displayblock">
<?php
	 }
	 else 
	 {
?>
			<div id="dvOgUrlContent" class="displaynone">
<?php
	 }
?>
				<label><br>Enter complete URL to add OG tags in the header separated by comma</label><br><br>
				<label>(e.g -- https://www.abc.com/wp-content/uploads/images/master_logo.png)</label><br><br>
				<?php
				if(isset($_POST['base64_include_og_url_for_image_content']))
				{
					$base64_include_og_url_for_image_content_sanitized = sanitize_textarea_field($_POST['base64_include_og_url_for_image_content']);
					update_post_meta($post->ID, 'base64_include_og_url_for_image_content', $base64_include_og_url_for_image_content_sanitized);
				}
				?>
				<textarea id="base64_include_og_url_for_image_content" type="text" name="base64_include_og_url_for_image_content" rows="2" cols="30" class="width500" onblur="PSLLB_CheckIncludeImageContentOGURL(this)" value="<?php echo $base64_include_og_url_for_image_content_sanitized; ?>"><?php echo $base64_include_og_url_for_image_content;?></textarea><br><br>
					<div id="dvIncludeOGURLError" style="display: none">
						<label style="color:red;font:bold;"><b>Enter Valid URL</b></label>
					</div><br/>
			</div>
		</div>
<?php
	}
	/***For LazyLoad Code Checkbox***/
function PSLLB_lazy_load_display() 
{
	$lazy_load_data_checkbox=esc_attr(get_option('lazy_load_data_checkbox'));
	$lazy_load_exclude_image_checkbox = esc_attr(get_option('lazy_load_exclude_image_checkbox'));
	$lazy_load_exclude_image_content = esc_url(get_option('lazy_load_exclude_image_content'));	
	$lazy_load_do_not_include_admin_checkbox = esc_attr(get_option('lazy_load_do_not_include_admin_checkbox','false'));	
?>	
	<input type="checkbox" id="lazy_load_data_checkbox" name="lazy_load_data_checkbox" onclick="PSLLB_ShowHideDivLazyLoad(this)" value="1" <?php checked(1, $lazy_load_data_checkbox, true); ?> /><br><br>
<?php	
if($lazy_load_data_checkbox==1) 
    {
?>
		<div id="dvLazyLoadDoNotIncludeAdminCheckbox" class="displayblock">		
<?php
	}
	else 
    {
?>
		<div id="dvLazyLoadDoNotIncludeAdminCheckbox" class="displaynone">		
<?php
	}
 if ($lazy_load_do_not_include_admin_checkbox!=="false")
 {
	?>
	<input type="checkbox" id="lazy_load_do_not_include_admin_checkbox" name="lazy_load_do_not_include_admin_checkbox" value="1" <?php checked(1, $lazy_load_do_not_include_admin_checkbox, true); ?> />	
	<?php
}
else
{
	?>
	<input type="checkbox" id="lazy_load_do_not_include_admin_checkbox" name="lazy_load_do_not_include_admin_checkbox" value="1" <?php checked(1, 1, true); ?> />	
	<?php
}
?>
<label class="bold">Do not include wp-admin images</label>
<div class="infobox" >
				<div class="hover-icon" >
					<div class="icon" onmouseover="PSLLB_ShowLazyLoadDoNotIncludeWPAdminImages(this);" onmouseout="PSLLB_HideLazyLoadDoNotIncludeWPAdminImages(this);" >
						<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
					</div>
				</div>
				<div id="content_div_lazyload_do_not_include_wp_admin_images" class="content-div">						
					<div id="content_div-inside">
						On clicking “Do not include wp-admin” checkbox under enable lazy load  section all your admin images will not be lazy loaded.
					</div>
				</div>
			</div>	
</div>			
<?php
	if($lazy_load_data_checkbox==1) 
	{
?>
		<div id="dvLazyLoad" class="displayblock">		
<?php
	}
	else 
	{
?>
		<div id="dvLazyLoad" class="displaynone">		
<?php
	}
?>	
			<label><br>By activating the "Enable Lazy Load" option all images will be lazy loaded which are not base64 encoded</label><br><br>			
			<input type="checkbox" id="lazy_load_exclude_image_checkbox" name="lazy_load_exclude_image_checkbox" onclick="PSLLB_ShowHideDivLazyLoadExcludeImage(this)" value="1" <?php checked(1, $lazy_load_exclude_image_checkbox, true); ?> />
			<label class="bold">Exclude images from lazy loading</label>
		
			<div class="infobox" >
				<div class="hover-icon" >
					<div class="icon" onmouseover="PSLLB_ShowLazyLoad(this);" onmouseout="PSLLB_HideLazyLoad(this);" >
						<i id="itsme" class="fa fa-info hidden" aria-hidden="true"></i>
					</div>
				</div>
				<div id="content_div_lazyload" class="content-div">				
					<div id="content_div-inside">
					Lazy loading is the process of delaying the loading or initialization of resources until they’re actually needed. It reduces page weight, load time and improve the site's performance. We recommend to enter all the " above the fold images" here to improve website performance.
					</div>
				</div>
			</div>	
	<?php
	if($lazy_load_exclude_image_checkbox==1) 
	{
	?>
			<div id="dvLazyLoadExcludeImageContent" class="displayblock">
	<?php
	}
	else 
	{
	?>
			<div id="dvLazyLoadExcludeImageContent" class="displaynone">
	<?php
	}
	?>
				<label><br>Enter URL of image for which lazy loading is not required</label><br><br>
				<label>(e.g -- https://www.abc.com/wp-content/uploads/images/master_logo.png)</label><br><br>		
				<?php
				if(isset($_POST['lazy_load_exclude_image_content']))
				{
				$lazy_load_exclude_image_content_sanitized = sanitize_textarea_field($_POST['lazy_load_exclude_image_content']);
				update_post_meta($post->ID, 'lazy_load_exclude_image_content', $lazy_load_exclude_image_content_sanitized);
				}
				?>				
				<textarea type="text" id="lazy_load_exclude_image_content" name="lazy_load_exclude_image_content" rows="2" cols="30" class="width500" onblur="PSLLB_CheckExcludeImageContentURL(this)" value="<?php echo $lazy_load_exclude_image_content_sanitized;?>"><?php echo $lazy_load_exclude_image_content;?></textarea><br><br>
				<div id="dvExcludeImageURLError" style="display: none">
					<label style="color:red;font:bold;"><b>Enter Valid URL</b></label>
				</div><br/>
			</div>
		</div>	
<?php
}
?>