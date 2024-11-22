<?php

$database = array(
    'address'  => getenv('MYSQL_HOST'),
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASSWORD'),
    'database' => getenv('MYSQL_DATABASE'),
	'port' => getenv('MYSQL_PORT')
);
