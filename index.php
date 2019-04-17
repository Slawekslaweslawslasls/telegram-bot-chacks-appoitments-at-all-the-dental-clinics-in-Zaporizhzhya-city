<?php
/*Done! Congratulations on your new bot. You will find it at t.me/ya_v_zp_bot. You can now add a description, about section and profile picture for your bot, see /help for a list of commands. By the way, when you've finished creating your cool bot, ping our Bot Support if you want a better username for it. Just make sure the bot is fully operational before you do this.

Use this token to access the HTTP API:
781684063:AAFR2Z3u7xEqUxYO1gONvg8XSUysDenqGBY
Keep your token secure and store it safely, it can be used by anyone to control your bot.

For a description of the Bot API, see this page: https://core.telegram.org/bots/api
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'parser.php';
include 'api.php';



define('BASE_URL', 'https://api.telegram.org/bot'.TOKEN.'/');

$options=[
	'url'=>'https://slawek.dev/tlgrm/index.php',
		];
$init_msg='Приветствую вас в чат-боте "Я В ЗП"';



function setWebhook($url, $options){
		$method='setWebhook';
		$response=file_get_contents($url.$method.'?'.http_build_query($options));
		var_dump($response);
}

//setWebhook(BASE_URL, $options);



function sendMessage(){
	$method='getUpdates';
	$response=file_get_contents(BASE_URL.$method);
	var_dump($response);
}

//sendMessage();

//function getUpdates(){
$updates =json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
file_put_contents(__DIR__.'/log.txt', file_get_contents('php://input'), FILE_APPEND);




function sendRequest($params,$replyMarkup){

	if(!empty($params)){
	return	
		 //json_decode(file_get_contents(BASE_URL.'sendMessage?'.http_build_query($params)),JSON_OBJECT_AS_ARRAY);
		 

    file_put_contents(__DIR__.'/log_responses.txt',  file_get_contents(BASE_URL.'sendMessage?'.http_build_query($params).'&reply_markup=' . $replyMarkup), FILE_APPEND);
    //echo BASE_URL.'sendMessage?'.http_build_query($params).'&reply_markup=' . $replyMarkup;
	}else{
		printf('check parameters');
	}

}

$chat_id=$updates['message']['chat']['id'];

	$inline_button1 = array("text"=>"Google url","url"=>"http://google.com");
    $inline_button2 = array("text"=>"work plz","callback_data"=>'/plz');
    $inline_keyboard = [[$inline_button1,$inline_button2]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard,"resize_keyboard" => true);
    $replyMarkup = json_encode($keyboard, JSON_UNESCAPED_UNICODE); 

	
 	$keyboard_test=array("inline_keyboard"=>[domThreeHandler('//*[contains(@class,"article-intro")][p]')],'one_time_keyboard' => true, "resize_keyboard" => true, 'parse_mode'=>HTML,);
 	$replyMarkupTest=json_encode($keyboard_test, JSON_UNESCAPED_UNICODE);

 	//var_dump(json_encode($keyboard_test));
 	var_dump($replyMarkup);
 	//var_dump($keyboard);
 	var_dump($replyMarkupTest);
	sendRequest(['chat_id'=>$chat_id,'text'=>$init_msg], $replyMarkupTest);
//echo '<br>'.$i++.' - '.$nodes_iterator_announce_title=$value->nodeValue; 
?>


