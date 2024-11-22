<?php

$app = require "./core/app.php";

// Create new instance of user
$user = new User($app->db);

// Insert it to database with POST data
try {
	$user->insert(array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'city' => $_POST['city']
	));
} catch(ValidationException $ex) {
	$errors = $ex->getErrors();
	$queryString = http_build_query(['errors' => $errors]);
	header('Location: index.php?' . $queryString);
	exit;
}

// Redirect back to index
header('Location: index.php');