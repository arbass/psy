<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {

	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))

			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		exit(0);
	}


	$botToken = "1315148288:AAEkdHhmx4LtqUMafqc_2MiEgWLw5PGQR5U";
	$website = "https://api.telegram.org/bot".$botToken;

$chatId = "182851935";

if(isset($_POST['name']) && trim($_POST['name']) !== '' && isset($_POST['phone']) && trim($_POST['phone']) !== '') {
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$answer = "Новая заявка с сайта!\n\n";
	$answer .= "Имя: <b>$name</b>\n";
	$answer .= "Телефон: <b>$phone</b>\n";
	$result = [
		'status' => 'success'
	];
	send_message($answer);
} else {
	$result = [
		'status' => 'error',
		'message' => 'No phone or name or they are empty'
	];
}
	echo json_encode($result);

function send_message($message_text){
	file_get_contents( $GLOBALS["website"]."/sendmessage?chat_id=".$GLOBALS["chatId"]."&text=".urlencode($message_text)."&parse_mode=HTML&disable_web_page_preview=true");
}
