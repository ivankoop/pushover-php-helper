<?php
include 'config.php';

function sendPushNotification($type,$text)
{

	$payload = array(
		'token' => PUSHOVER_APP_KEY,
		'user' => PUSHOVER_USER_KEYS,
		'device' => 'ios', // o Android
		'title' => 'Website Name',
		'message' => $type . ": " . $text,
	);

    $payload_query = http_build_query($payload);

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, "https://api.pushover.net/1/messages.json");
    curl_setopt($ch,CURLOPT_POST, count($payload));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $payload_query);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    echo $result;

}

sendPushNotification("Error", "Something went wrong");
