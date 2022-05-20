<?php
header('Content-Type:text/plain');

// ini_set('display_errors', 1);

// https://www.nashuaweb.net/~multiple/home.php

/* echo 'get var_dump:'. PHP_EOL;
var_dump($_GET); */

$filename = strval($_GET['file']);
echo "filename: $filename" . PHP_EOL;

$data = file_get_contents("php://input");
echo "data: " . $data . PHP_EOL;

$response = ['success' => 'success', 'error' => 'error'];

header('Content-Type: application/json');
if (json_decode($data) === false) {
	echo json_encode($response['error']) . PHP_EOL;
} else {
	echo json_encode($response['success']) . PHP_EOL;
}

$jsonData = json_encode($data);
echo "jsonData: " . $jsonData . PHP_EOL;

// fix this
if (file_put_contents($filename, $jsonData)) {
	echo "Success, wrote ($jsonData) to file ($filename)" . PHP_EOL;
 } else {
	die("noooo" . PHP_EOL);
	// figure out why this doesn't work
}

// send to https://www.nashuaweb.net/~abikombe/CSCI206/10_lab8_validation/submit.php