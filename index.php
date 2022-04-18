<?php
require_once 'db.php';
define('ROOT_PATH', dirname(__FILE__));
include ROOT_PATH . '/system/dcwh.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  	fDcwh("Database OK", "Database connect() was triggered when someone accessed https://web-staging.heavennodes.com. Reported `Code 200` from server!", "Database all good! ✨", "Webook sent from `index.php`", "72ed61");
  	header('Location: ../../secure');
} catch (PDOException $pe) {
   	fDcwh("❗❗ DATABASE ERROR DETECTED, SEE BELOW", "$pe", "Database Error supplied above.", "Webook sent from `index.php` | Ping: <@324596012955992065>", "cf3e3e");
  	header('Location: ../../dberror');
}