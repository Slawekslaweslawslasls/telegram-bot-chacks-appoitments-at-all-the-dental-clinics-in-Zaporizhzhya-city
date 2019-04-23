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
		

function domTreeHandler($xpathquery, $url_parse){
		//var_dump($xpath);
		$i=0;
		$j=0;
		//$url_parse="sp3.health.zp.ua/zapys-do-likarya-st1";
		
        $curl = curl_init($url_parse);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0); 
		$html = curl_exec($curl);
		$dom = new DOMDocument('1.0', 'UTF-8');
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		//$xpathquery = '(//div[contains(@class,"button-4-gl")]/a/@href)';

		//*[count(BBB)=2]  [@class="class"]
		$elements = $xpath->query($xpathquery);

		if(!empty($xpathquery)){
		foreach ($elements as $value) {
			//$nodes_inline_keyboard[]= array(['text'=>preg_replace("/[\n\r\t]/", "", $value->nodeValue),'callback_data'=>'/help']); 
			$nodes_inline_keyboard[]= ' '.preg_replace("/[\n\r\t]/", "", $value->nodeValue).' '; 
			//var_dump($value->nodeName);
			
			}	
		}else{
			echo "No elements there!";
		}

		return $nodes_inline_keyboard;
}
//var_dump(domTreeHandler('void',"void"));


?>
</html>