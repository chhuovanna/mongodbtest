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
    $savereviewerurl = $protocol.$hostName.$pathInfo['dirname']."/savereviewer.php";



	$html = <<<EOF
<!DOCTYPE html>
<html>
<head>
	<title>Add Reviewer</title>
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

<form action="$savereviewerurl" method="post">
    <label>rid:</label><input type="number" name="rid" min='1' required>
    <br><br>
    <label>name:</label><input type="text" name="name">
    <br>
    <br>
    <button type="submit">Save</button>
</form>
EOF;
echo $html;
echo "</body></html>";
?>

