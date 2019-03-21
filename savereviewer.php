<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;

$user = "admin";
$pwd = 'admin';

$mongo = new Mongo("mongodb://127.0.0.1:27017");
$reviewercollection = $mongo->movieRating->reviewer;


try{
	$insertOneResult = $reviewercollection->insertOne(["_id"=> (int)$_POST['rid']
							, "name"=> $_POST['name']
						]);
	if ($insertOneResult->getInsertedCount() == 1){
		header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=1");
	}else{
		header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=0");	
	}

} catch (Exception $e) {
    header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=0");
}



?>