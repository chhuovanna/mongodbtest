<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;
/*
$user = "admin";
$pwd = 'admin';*/

//$mongo = new Mongo("mongodb://${user}:${pwd}@127.0.0.1:27017");

$mongo = new Mongo("mongodb://127.0.0.1:27017");
$moviecollection = $mongo->movieRating->movie;

try {
	$insertOneResult = $moviecollection->insertOne(["_id"=>(int) $_POST['mid']
							, "title"=> $_POST['title']
							, "year" => (int) $_POST['year']
							, "director" => $_POST[ 'director']
							, "ratings" => []
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