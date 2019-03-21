<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;


//if authentication is enable for mongoDB
/*
$user = "admin";
$pwd = 'admin';*/

//$mongo = new Mongo("mongodb://${user}:${pwd}@127.0.0.1:27017");

$mongo = new Mongo("mongodb://127.0.0.1:27017");
$moviecollection = $mongo->movieRating->movie;


try{
	$updateResult = $moviecollection->updateOne(['_id'=> (int) $_POST['mid']]
				, ['$push' => ['ratings'=> //push is used to add rating to array of ratings
										['rid'=> (int) $_POST['rid']
										,'stars' => (int) $_POST['stars']
										,'ratingDate' =>  date("Y-m-d")
										]
							]
				] );
	if ($updateResult->getModifiedCount() == 1){
		header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=1");
	}else{
		header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=0");	
	}

} catch (Exception $e) {
    header('location:'.strtok($_SERVER["HTTP_REFERER"],'?')."?success=0");	
}


?>
