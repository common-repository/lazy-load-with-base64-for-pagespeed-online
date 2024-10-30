var displaystatus;
function PSLLB_ShowHideDivBase64(base64_data_checkbox) 
{
	var dvBase64DoNotIncludeAdminCheckbox = document.getElementById('dvBase64DoNotIncludeAdminCheckbox');
	var dvImageCheckbox = document.getElementById('dvImageCheckbox');
	var $base64_include_image_checkbox=document.getElementById('$base64_include_image_checkbox');
	var dvOgUrlCheckbox = document.getElementById('dvOgUrlCheckbox');
	var dvImageContent=document.getElementById('dvImageContent');
	var base64_include_og_url_for_image_checkbox = document.getElementById('base64_include_og_url_for_image_checkbox');	
	var dvSetMaxFileSizeCheckbox = document.getElementById('dvSetMaxFileSizeCheckbox');
	var dvOgUrlContent = document.getElementById('dvOgUrlContent');
	var base64_set_max_file_size_checkbox = document.getElementById('base64_set_max_file_size_checkbox');	
	var dvSetMaxFileSizeContent = document.getElementById('dvSetMaxFileSizeContent');
	if(base64_data_checkbox.checked)
	{
		displaystatus="block";
	}
	else 
	{
			displaystatus="none";
	}	
	dvBase64DoNotIncludeAdminCheckbox.style.display = displaystatus;	
	dvImageCheckbox.style.display = displaystatus;	   
	dvOgUrlCheckbox.style.display = displaystatus;    
	dvSetMaxFileSizeCheckbox.style.display = displaystatus;	  
	dvImageContent.style.display = base64_include_image_checkbox.checked ? "block" : "none";	  
	dvOgUrlContent.style.display = base64_include_og_url_for_image_checkbox.checked ? "block" : "none";	
	dvOgUrlContent.style.display = base64_set_max_file_size_checkbox.checked ? "block" : "none";
}
function PSLLB_ShowHideDivBase64IncludeImage(base64_include_image_checkbox) 
{       
    dvImageContent.style.display = base64_include_image_checkbox.checked ? "block" : "none";		 
} 
function PSLLB_ShowHideDivBase64IncludeOgUrl(base64_include_og_url_for_image_checkbox) 
{       
    dvOgUrlContent.style.display = base64_include_og_url_for_image_checkbox.checked ? "block" : "none";		 
}
function PSLLB_ShowHideDivBase64SetMaxFileSize(base64_set_max_file_size_checkbox) 
{       
    dvSetMaxFileSizeContent.style.display = base64_set_max_file_size_checkbox.checked ? "block" : "none";		 
}
function PSLLB_ShowSetMaxFileSize() 
{
    document.getElementById("content_div_set_max_file_size").style.display = 'block';
}
function PSLLB_HideSetMaxFileSize() 
{
    document.getElementById("content_div_set_max_file_size").style.display = 'none';
}
function PSLLB_ShowBase64DoNotIncludeWPAdminImages() 
{
    document.getElementById("content_div_base64_do_not_include_wp_admin_images").style.display = 'block';
}
function PSLLB_HideBase64DoNotIncludeWPAdminImages() 
{
    document.getElementById("content_div_base64_do_not_include_wp_admin_images").style.display = 'none';
}
function PSLLB_ShowLazyLoadDoNotIncludeWPAdminImages() 
{
    document.getElementById("content_div_lazyload_do_not_include_wp_admin_images").style.display = 'block';
}
function PSLLB_HideLazyLoadDoNotIncludeWPAdminImages() 
{
    document.getElementById("content_div_lazyload_do_not_include_wp_admin_images").style.display = 'none';
}
function PSLLB_ShowIncludeImages() 
{
    document.getElementById("content_div_include_images").style.display = 'block';
}
function PSLLB_HideIncludeImages() 
{
    document.getElementById("content_div_include_images").style.display = 'none';
}
function PSLLB_ShowIncludeOGUrl() 
{
    document.getElementById("content_div_og_url").style.display = 'block';
}
function PSLLB_HideIncludeOGUrl() 
{
    document.getElementById("content_div_og_url").style.display = 'none';
}
function PSLLB_ShowHideDivLazyLoad(lazy_load_data_checkbox) 
{
	var dvLazyLoadDoNotIncludeAdminCheckbox = document.getElementById('dvLazyLoadDoNotIncludeAdminCheckbox');
	var dvLazyLoad = document.getElementById('dvLazyLoad');
	var lazy_load_exclude_image_checkbox=document.getElementById('lazy_load_exclude_image_checkbox');
	var dvLazyLoadExcludeImageContent=document.getElementById('dvLazyLoadExcludeImageContent');
	
	if(lazy_load_data_checkbox.checked)
	{
		displaystatus="block";
	}
	else 
	{
		displaystatus="none";
	} 	
	dvLazyLoad.style.display = displaystatus;
	dvLazyLoadDoNotIncludeAdminCheckbox.style.display = displaystatus;
	dvLazyLoadExcludeImageContent.style.display = lazy_load_exclude_image_checkbox.checked ? "block" : "none";	  		
} 
function PSLLB_ShowHideDivLazyLoadExcludeImage(lazy_load_exclude_image_checkbox) 
{       
    dvLazyLoadExcludeImageContent.style.display = lazy_load_exclude_image_checkbox.checked ? "block" : "none";	
}
function PSLLB_ShowLazyLoad() 
{
    document.getElementById("content_div_lazyload").style.display = 'block';
}
function PSLLB_HideLazyLoad() 
{
    document.getElementById("content_div_lazyload").style.display = 'none';
}
function PSLLB_CheckIncludeImageContentURL(base64_include_image_content)
{
	var url = document.getElementById("base64_include_image_content").value;
	var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if (pattern.test(url)) 
	{
		document.getElementById('dvIncludeImageURLError').style.display = 'none';
		return true;
	} 
	   document.getElementById('dvIncludeImageURLError').style.display = 'block';
	   document.getElementById('base64_include_image_content').value="";	
	   return false; 
	}
function PSLLB_CheckIncludeImageContentOGURL(base64_include_og_url_for_image_content)
{
		var url = document.getElementById("base64_include_og_url_for_image_content").value;
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        if (pattern.test(url)) 
		{
            document.getElementById('dvIncludeOGURLError').style.display = 'none';
            return true;
        } 
	   document.getElementById('dvIncludeOGURLError').style.display = 'block';
	   document.getElementById('base64_include_og_url_for_image_content').value="";	
	   return false; 
}
function PSLLB_CheckExcludeImageContentURL(lazy_load_exclude_image_content)
{
		var url = document.getElementById("lazy_load_exclude_image_content").value;
        var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        if (pattern.test(url)) 
		{
           document.getElementById('dvExcludeImageURLError').style.display = 'none';
           return true;
        } 
           document.getElementById('dvExcludeImageURLError').style.display = 'block';
		   document.getElementById('lazy_load_exclude_image_content').value="";	
           return false;
}