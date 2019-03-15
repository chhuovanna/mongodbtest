<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;

$user = "admin";
$pwd = 'admin';

$mongo = new Mongo("mongodb://127.0.0.1:27017");
$reviewercollection = $mongo->movieRating->reviewer;
$insertOneResult = $reviewercollection->insertOne(["_id"=> (int)$_POST['rid']
							, "name"=> $_POST['name']
						]);


//echo  $_POST['name'];
if ($insertOneResult->getInsertedCount() == 1){
	header('location:'.$_SERVER['HTTP_REFERER']);
}else{
	echo "fail to add reviewer";
}


?>