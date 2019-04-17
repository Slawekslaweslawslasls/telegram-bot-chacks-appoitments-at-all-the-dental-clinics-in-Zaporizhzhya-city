<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0);

        
		

		//var_dump($xpath);
		

function domThreeHandler($xpathquery){
		//var_dump($xpath);
		$i=0;
		$j=0;
		$url="http://health.zp.ua/stomatolohiya";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		$html = curl_exec($curl);
		$dom = new DOMDocument('1.0', 'UTF-8');
		@$dom->loadHTML($html);
		 $xpath = new DOMXPath($dom);
		//$elements = $xpath->query("//*[contains(@class,'article-intro')][p]");
		$elements = $xpath->query($xpathquery);
		if(!empty($xpathquery)){
		foreach ($elements as $value) {
			$nodes_inline_keyboard[]= array('text'=>preg_replace("/[\n\r\t]/", "", $value->nodeValue),'callback_data'=>'/help'); 
			//var_dump($value->nodeName);
			
			}	
		}else{
			echo "No elements there!";
		}

		return $nodes_inline_keyboard;
//var_dump($nodes_inline_keyboard);
}
//var_dump(domThreeHandler('//*[contains(@class,"article-intro")][p]'));


?>
</html>