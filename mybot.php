<?php
include("Telegram.php");

// Set the bot TOKEN
$bot_id = "TOKEN";

// Instances the class
$telegram = new Telegram($bot_id);

date_default_timezone_set("Asia/Tehran"); 

$inline_query_id  	= $telegram->Inline_Query_ID();
$inline_query_text  = $telegram->Inline_Query_Text();
$msgType		  	= $telegram->getUpdateType();


if($msgType == 'inline_query'){
	
	if(!empty($inline_query_text)){
		
		$results = array(
			array(
				"type" => "article",
				"id" => "876",
				"title" => "Content Title",
				"message_text" => "Message will shown to user after they clicked on title",
				"url" => "https://en.wikipedia.org/wiki/Fifa",
				"thumb_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/FIFA_Logo_%282010%29.svg/440px-FIFA_Logo_%282010%29.svg.png",
				"description" => "short story..."
			  ),
			array(
				"type" => "article",
				"id" => "900",
				"title" => "Content Title 2",
				"message_text" => "Message will shown to user after they clicked on title 2",
				"url" => "https://en.wikipedia.org/wiki/iran",
				"thumb_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/250px-Flag_of_Iran.svg.png",
				"description" => "short story 2..."
			  )
		);
		$results = json_encode($results);

		$content = array('inline_query_id' => $inline_query_id, "results" => $results);
		$telegram->answerInlineQuery($content);		
		
	}

}