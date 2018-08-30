<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sdb = new PDO('mysql:host=localhost;dbname=knockcamp','root','');
$stmt = $sdb->prepare("SELECT * FROM users;");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
	//echo $row["user_username"];
}
  ?>