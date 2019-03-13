<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;

$user = "admin";
$pwd = 'admin';

$mongo = new Mongo("mongodb://${user}:${pwd}@127.0.0.1:27017");
$moviecollection = $mongo->movieRating->movie;
$insertOneResult = $moviecollection->insertOne(["_id"=>$_POST['mid']
							, "title"=> $_POST['title']
							, "year" => $_POST['year']
							, "director" => $_POST[ 'director']
						]);

if ($insertOneResult->getInsertedCount() == 1){
	header('location:'.$_SERVER['HTTP_REFERER']);
}else{
	echo "fail to add new movie";
}


?>