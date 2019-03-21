<?php  
require_once 'menu.php';
    //test if the previous insert is successful or not 
    if (array_key_exists("success", $_GET) ){
        if ($_GET['success'] == 1)
            echo("<script>alert('Added')</script>");
        else
            echo("<script>alert('Fail to add')</script>");
    }



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

