<?php
$uri=$_SERVER['REQUEST_URI'];
//Optional, if installed within a folder on the server.
//$uri="https://search-test02-fl76bf5li2o2qlyzmgaxqxuxy4.us-west-2.es.amazonaws.com/".str_replace("/".basename(__DIR__)."/","",$uri);

$contentType="application/text";

if(isset($_POST) && count($_POST)>0) {
	$data_string=json_encode($_POST);

	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $uri); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,     $data_string); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
									'Content-Type: application/json',                                                                                
									'Content-Length: ' . strlen($data_string))                                                                       
							);  

	$output = curl_exec($ch); 
	curl_close($ch);
	//exit($output);
	
	header('Content-Type: {$contentType}');
	echo $output;
} else {
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $uri); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch); 
	curl_close($ch);
	//exit($output);
	
	header('Content-Type: {$contentType}');
	echo $output;
}
?>
