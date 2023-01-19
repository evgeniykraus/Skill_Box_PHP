<?php

require_once 'connect.php';
require_once 'countries.php';
require_once 'cities.php';
require_once 'data.php';

$connection = new Database;
$db = $connection->getConnection();

$countries = new Country($db);
$cities = new Cities($db);
