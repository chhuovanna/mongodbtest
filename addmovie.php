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
    $savemovieurl = $protocol.$hostName.$pathInfo['dirname']."/savemovie.php";



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

<form action="$savemovieurl" method="post">
    <label>mid:</label><input type="number" name="mid" min=1 required>
    <br><br>
    <label>title:</label><input type="text" name="title" required>
    <br><br>
    <label>year:</label><input type="number" min='1' max='9999' name="year">
    <br><br>
    <label>director:</label><input type="text" name="director">
    <br><br>
    <button type="submit">Save</button>
</form>
EOF;
echo $html;





echo "</body></html>";
?>

