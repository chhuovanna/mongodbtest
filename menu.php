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
    $savereviewerurl = $protocol.$hostName.$pathInfo['dirname']."/savereviewer.php";
    $saveratingurl = $protocol.$hostName.$pathInfo['dirname']."/saverating.php";





    $html = <<<EOF
<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
</head>
<body>
    <div class='menu'>
        <a href="$addmovieurl" target="_self">Add Movie</a>&nbsp;&nbsp; 
        <a href="$addreviewerurl">Add Reviewer</a>&nbsp;&nbsp; 
        <a href="$ratemovieurl">Rate Movie</a>&nbsp;&nbsp; 
        <a href="$showmovierateurl">Show Movie Rate</a>&nbsp;&nbsp; 
    </div><br>



EOF;

echo $html;
?>