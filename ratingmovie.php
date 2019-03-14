<?php  
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
	<title>Add Movie</title>
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
    $html=<<<EOF

<form action="$saveratingurl" method="post">
    <label>mid:</label><input type="text" name="mid">
    <br>
    <label>title:</label><input type="text" name="title">
    <br>
    <label>year:</label><input type="text" name="year">
    <br>
    <label>director:</label><input type="text" name="director">
    <br>
    <button type="submit">Save</button>
</form>
EOF;
echo $html;





echo "</body></html>";
?>

