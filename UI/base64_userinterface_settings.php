<?php
function PSLLB_prefix_sanitize_checkbox( $input, $expected_value=1 ) {
    if ( $expected_value == $input ) {
        return $expected_value;
    } else {
        return '';
    }
}
/***To enqueue styles and script only to admin section***/
add_action( 'admin_enqueue_scripts', 'PSLLB_base64_data_show_hide_controls' );
function PSLLB_base64_data_show_hide_controls() 
{
	/***To Enqueue style***/
	wp_enqueue_style( 'base', plugin_dir_url( __FILE__ ) . 'css/base.css', true );
	wp_enqueue_style('fontawesomestyle',"https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css",true);
     /***To Enqueue script***/
	wp_enqueue_script( 'base', plugin_dir_url( __FILE__ ) . 'js/base.js', true );
}
/***END -- To enqueue styles and script only to admin section***/
add_action('admin_menu', 'PSLLB_base64_user_interface_setup_menu');
function PSLLB_base64_user_interface_setup_menu() 
{	
	add_menu_page( 'Base64 Page', 'Base64', 'manage_options', 'base-64','PSLLB_base64_init', plugin_dir_url( __FILE__ ) . 'css/images/transparent-icon-image24px.png');
}
add_action("admin_init", "PSLLB_base64_settings_page");
function PSLLB_base64_settings_page() 
{
	add_settings_section("sectionBase64", "Lazy Load with Base64 for Pagespeed online", null, "base64");
}
/***For Base64 data Checkbox***/
add_action("admin_init", "PSLLB_base64_data_settings_page");
function PSLLB_base64_data_settings_page() 
{
	$base64_data_checkbox = esc_attr(get_option('base64_data_checkbox'));	
	$base64_include_image_checkbox = esc_attr(get_option('base64_include_image_checkbox'));
	$base64_include_og_url_for_image_checkbox = esc_attr(get_option('base64_include_og_url_for_image_checkbox'));
	$base64_set_max_file_size_checkbox = esc_attr(get_option('base64_set_max_file_size_checkbox'));
	$lazy_load_data_checkbox = esc_attr(get_option('lazy_load_data_checkbox'));
	$lazy_load_exclude_image_checkbox = esc_attr(get_option('lazy_load_exclude_image_checkbox'));
	$base64_do_not_include_admin_checkbox = esc_attr(get_option('base64_do_not_include_admin_checkbox'));

	/***Add a new section to a settings page***/
  	add_settings_field("base64_data_checkbox", "Enable Base64", "PSLLB_base64_display", "base64", "sectionBase64");
	/***Add a new section to a settings page***/
  	add_settings_field("lazy_load_data_checkbox", "Enable Lazy Load", "PSLLB_lazy_load_display", "base64", "sectionBase64");
	/***Register a setting and its data***/
	register_setting("sectionBase64", "base64_data_checkbox");
	register_setting("sectionBase64", "lazy_load_data_checkbox");
	if($base64_data_checkbox||(isset($_POST['base64_data_checkbox'])!=""))
    {		
        register_setting("sectionBase64", "base64_do_not_include_admin_checkbox");
		register_setting("sectionBase64", "base64_include_image_checkbox");
		register_setting("sectionBase64", "base64_include_og_url_for_image_checkbox");
		register_setting("sectionBase64", "base64_set_max_file_size_checkbox");
	}
	if(isset($_POST['base64_do_not_include_admin_checkbox']))
    {
		$base64_do_not_include_admin_checkbox = !empty($_POST['base64_do_not_include_admin_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['base64_do_not_include_admin_checkbox'], '1') : '';		
	}
	else 
    {
		$base64_do_not_include_admin_checkbox="";
	}	
	if(isset($_POST['base64_include_image_checkbox']))
    {
		$base64_include_image_checkbox = !empty($_POST['base64_include_image_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['base64_include_image_checkbox'], '1') : '';		
	}
	else 
    {
		$base64_include_image_checkbox="";
	}
	register_setting("sectionBase64", "base64_include_image_content");		

	if(isset($_POST['base64_include_og_url_for_image_checkbox'])) 
    {			
		$base64_include_og_url_for_image_checkbox = !empty($_POST['base64_include_og_url_for_image_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['base64_include_og_url_for_image_checkbox'], '1') : '';		
	}
	else
    {
		$base64_include_og_url_for_image_checkbox="";
	}	
	register_setting("sectionBase64", "base64_include_og_url_for_image_content");
	if(isset($_POST['base64_set_max_file_size_checkbox']))
 	{	    		
		$base64_set_max_file_size_checkbox = !empty($_POST['base64_set_max_file_size_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['base64_set_max_file_size_checkbox'], '1') : '';		    	
	}
	else
    {
		$base64_set_max_file_size_checkbox="";
	}		
	register_setting("sectionBase64", "base64_set_max_file_size_content");	
	if($lazy_load_data_checkbox||(isset($_POST['lazy_load_data_checkbox'])!=""))
    {	
		register_setting("sectionBase64", "lazy_load_do_not_include_admin_checkbox");		
		register_setting("sectionBase64", "lazy_load_exclude_image_checkbox");		
	}
	if(isset($_POST['lazy_load_do_not_include_admin_checkbox']))
    {		 
		$lazy_load_do_not_include_admin_checkbox = !empty($_POST['lazy_load_do_not_include_admin_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['lazy_load_do_not_include_admin_checkbox'], '1') : '';			
	}
	else
    {
		$lazy_load_exclude_image_checkbox="";
	}	
	if(isset($_POST['lazy_load_exclude_image_checkbox']))
    {		 
		$lazy_load_exclude_image_checkbox = !empty($_POST['lazy_load_exclude_image_checkbox']) ? PSLLB_prefix_sanitize_checkbox($_POST['lazy_load_exclude_image_checkbox'], '1') : '';			
	}
	else
    {
		$lazy_load_exclude_image_checkbox="";
	}		
	register_setting("sectionBase64", "lazy_load_exclude_image_content");
}
function PSLLB_base64_init() 
{
?>
     <div class="wrap">
        <form method="post" action="options.php">
<?php	
              settings_fields("sectionBase64");	
              do_settings_sections("base64");
	          submit_button();
?>
         </form>
      </div>
<?php
}
?>