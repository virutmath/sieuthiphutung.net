<?php 
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='products.html') {
	include $browser_t.'/products.html';
	}
elseif ($page_name=='services.html') {
	include $browser_t.'/services.html';
	}
elseif ($page_name=='preview.html') {
	include $browser_t.'/preview.html';
	}
elseif ($page_name=='preview-2.html') {
	include $browser_t.'/preview-2.html';
	}
elseif ($page_name=='preview-3.html') {
	include $browser_t.'/preview-3.html';
	}
elseif ($page_name=='preview-4.html') {
	include $browser_t.'/preview-4.html';
	}
elseif ($page_name=='preview-5.html') {
	include $browser_t.'/preview-5.html';
	}
elseif ($page_name=='preview-6.html') {
	include $browser_t.'/preview-6.html';
	}
elseif ($page_name=='about.html') {
	include $browser_t.'/about.html';
	}
elseif ($page_name=='faq.html') {
	include $browser_t.'/faq.html';
	}
elseif ($page_name=='cart.html') {
	include $browser_t.'/cart.html';
	}
elseif ($page_name=='login.html') {
	include $browser_t.'/login.html';
	}
elseif ($page_name=='contact.html') {
	include $browser_t.'/contact.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
