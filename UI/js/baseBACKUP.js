var displaystatus;

function ShowHideDivBase64(base64_data_checkbox) {
//var dvBase64 = document.getElementById("dvBase64");	
//==Div Image Checkbox==
var dvImageCheckbox = document.getElementById('dvImageCheckbox');
//==Div Include Image Checkbox==
var $base64_include_image_checkbox=document.getElementById('$base64_include_image_checkbox');
//==Div OG Url Checkbox==
var dvOgUrlCheckbox = document.getElementById('dvOgUrlCheckbox');
//==Div Include Image Content
var dvImageContent=document.getElementById('dvImageContent');
//Og Url Checkbox==
var base64_include_og_url_for_image_checkbox = document.getElementById('base64_include_og_url_for_image_checkbox');	
//==Div Set Max File Size Checkbox==
var dvSetMaxFileSizeCheckbox = document.getElementById('dvSetMaxFileSizeCheckbox');
//Div Og Url Content
var dvOgUrlContent = document.getElementById('dvOgUrlContent');
//Set Max File Size Checkbox==
var base64_set_max_file_size_checkbox = document.getElementById('base64_set_max_file_size_checkbox');	
//Set Max File Size Content
var dvSetMaxFileSizeContent = document.getElementById('dvSetMaxFileSizeContent');
	    if(base64_data_checkbox.checked){
		displaystatus="block";
	}
	else {
		displaystatus="none";
	}		      
        //dvBase64.style.display = displaystatus;		
	    dvImageCheckbox.style.display = displaystatus;	   
	    dvOgUrlCheckbox.style.display = displaystatus;    
	    dvSetMaxFileSizeCheckbox.style.display = displaystatus;	  
		dvImageContent.style.display = base64_include_image_checkbox.checked ? "block" : "none";	  
		dvOgUrlContent.style.display = base64_include_og_url_for_image_checkbox.checked ? "block" : "none";	
		dvOgUrlContent.style.display = base64_set_max_file_size_checkbox.checked ? "block" : "none";
 }
//==19/07/2019
 function ShowHideDivBase64IncludeImage(base64_include_image_checkbox) {       
        dvImageContent.style.display = base64_include_image_checkbox.checked ? "block" : "none";		 
 }
 //==till here 19/07/2019
 function ShowHideDivBase64IncludeOgUrl(base64_include_og_url_for_image_checkbox) {       
        dvOgUrlContent.style.display = base64_include_og_url_for_image_checkbox.checked ? "block" : "none";		 
 }
 function ShowHideDivBase64SetMaxFileSize(base64_set_max_file_size_checkbox) {       
        dvSetMaxFileSizeContent.style.display = base64_set_max_file_size_checkbox.checked ? "block" : "none";		 
 }
 function ShowSetMaxFileSize() {
    document.getElementById("content_div_set_max_file_size").style.display = 'block';
}
function HideSetMaxFileSize() {
    document.getElementById("content_div_set_max_file_size").style.display = 'none';
}
//19/07/2019
function ShowIncludeImages() {
    document.getElementById("content_div_include_images").style.display = 'block';
}
function HideIncludeImages() {
    document.getElementById("content_div_include_images").style.display = 'none';
}
//till here 19/07/2019
function ShowIncludeOGUrl() {
    document.getElementById("content_div_og_url").style.display = 'block';
}
function HideIncludeOGUrl() {
    document.getElementById("content_div_og_url").style.display = 'none';
}
//19/07/2019
//==Lazy Load==()
function ShowHideDivLazyLoad(lazy_load_data_checkbox) {
//==Div Lazy Load Checkbox==
var dvLazyLoad = document.getElementById('dvLazyLoad');
//==Div Lazy Load Exclude Image Checkbox==
var lazy_load_exclude_image_checkbox=document.getElementById('lazy_load_exclude_image_checkbox');
//==Div Lazy Load Exclude Image Content
var dvLazyLoadExcludeImageContent=document.getElementById('dvLazyLoadExcludeImageContent');
	    if(lazy_load_data_checkbox.checked){
		displaystatus="block";
	}
	else {
		displaystatus="none";
	}	     
      	
	    dvLazyLoad.style.display = displaystatus;
		dvLazyLoadExcludeImageContent.style.display = lazy_load_exclude_image_checkbox.checked ? "block" : "none";	  		
 } 
 function ShowHideDivLazyLoadExcludeImage(lazy_load_exclude_image_checkbox) {       
        dvLazyLoadExcludeImageContent.style.display = lazy_load_exclude_image_checkbox.checked ? "block" : "none";	
 }
 function ShowLazyLoad() {
    document.getElementById("content_div_lazyload").style.display = 'block';
}
function HideLazyLoad() {
    document.getElementById("content_div_lazyload").style.display = 'none';
}
//==till here 19/07/2019==