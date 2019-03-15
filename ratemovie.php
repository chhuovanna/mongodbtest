<?php  
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;

   // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 
    
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 
    
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 
    
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
    $addmovieurl=$protocol.$hostName.$pathInfo['dirname']."/addmovie.php";
    $addreviewerurl=$protocol.$hostName.$pathInfo['dirname']."/addreviewer.php";
    $ratemovieurl=$protocol.$hostName.$pathInfo['dirname']."/ratemovie.php";
    $showmovierateurl=$protocol.$hostName.$pathInfo['dirname']."/showrating.php";
    $saveratingurl = $protocol.$hostName.$pathInfo['dirname']."/saverating.php";



	$html = <<<EOF
<!DOCTYPE html>
<html>
<head>
	<title>Rate Movie</title>
</head>
<body>
	<div class='menu'>
		<a href="$addmovieurl" target="_self">Add Movie</a>
		<a href="$addreviewerurl">Add Reviewer</a>
		<a href="$ratemovieurl">Rate Movie</a>
		<a href="$showmovierateurl">Show Movie Rate</a>
	</div>
EOF;
echo $html;

    $mongo = new Mongo("mongodb://127.0.0.1:27017");
    $movieCollection = $mongo->movieRating->movie;
    $movies = $movieCollection->find(['title'=>['$exists' => true]]);
    $movieOptions = "";


    foreach ($movies as $movie) {
        $movieOptions .= "<option value='". $movie->_id ."'>".$movie->title."</option>";
    }

    $reviewers = $mongo->movieRating->reviewer->find(['name'=>['$exists'=>true]]); 

    $reviewerOptions="";

    foreach ($reviewers as $reviewer) {
        $reviewerOptions .= "<option value='". $reviewer->_id ."'>".$reviewer->name."</option>";
    }


    $html=<<<EOF

<form action="$saveratingurl" method="post">
    <label>Movie:</label>
    <select name="mid">
    $movieOptions
    </select>
    <label>Reviewer:</label>
    <select name="rid">
    $reviewerOptions
    </select>
    <label>Stars:</label><input type="number" min='0' max='5' name="stars">
    <br>
    <button type="submit">Save</button>
</form>
EOF;
echo $html;





echo "</body></html>";
?>

