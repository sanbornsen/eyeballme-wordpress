<?php 

/*
Plugin Name: eyeballme
Description: Extracting images and send it to eyeballme server.
Version: 1.0
Author: Sanborn
License: GPL2
*/

require_once('eyeballme-php-api-wrapper/Eyeballme.php');


function send_image_to_eyeballme() {
	$str = $_POST['content'];
	$post_id = $_POST['post_ID'];
	$instance = new Eyeballme($appId,$apiKey);
	$instance->apiAuth();
	$instance->sendImages($str);	
}

add_action( 'save_post', 'send_image_to_eyeballme' );

function my_action_javascript() {
	$instance = new Eyeballme($appId,$apiKey);
	$instance->apiAuth(); 
	echo $instance->createJS();
}

add_action( 'wp_footer', 'my_action_javascript' );
?>	
