<?php

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);

// Insert it to database with POST data
try {
	$user->insert(array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'city' => $_POST['city'],
		'phoneNumber' => $_POST['phoneNumber']
	));
} catch(ValidationException $ex) {
	$errors = $ex->getErrors();
	$queryString = http_build_query(['errors' => $errors]);

	header('Content-Type: application/json');
	echo json_encode(['success' => false, 'errors' => $errors]);
	exit;
}

// Redirect back to index
header('Content-Type: application/json');
echo json_encode(['success' => true]);
