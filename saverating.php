<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;
/*
$user = "admin";
$pwd = 'admin';*/

//$mongo = new Mongo("mongodb://${user}:${pwd}@127.0.0.1:27017");

$mongo = new Mongo("mongodb://127.0.0.1:27017");
$moviecollection = $mongo->movieRating->movie;

$updateResult = $moviecollection->updateOne(['_id'=>$_POST['mid']]
				, ['$set' => [ 'year'=>'10'
							]
				] );

/*$updateResult = $moviecollection->updateOne(['_id'=>$_POST['mid']]
				, ['$set' => ['rates'=>
										[['rid'=>$_POST['rid']
										,'stars' => $_POST['stars']
										,'ratingDate' =>  date("Y-m-d")
										]]
							]
				] );

$array =[ ['_id'=>$_POST['mid']]
				, ['$set' => ['rates'=>
										[['rid'=>$_POST['rid']
										,'stars' => $_POST['stars']
										,'ratingDate' =>  date("Y-m-d")
										]]
							]
				] ];

print_r($array);
*/


if ($updateResult->getMatchedCount() == 1){
	header('location:'.$_SERVER['HTTP_REFERER']);
}else{
	echo "fail to add new rating";
}


?>
