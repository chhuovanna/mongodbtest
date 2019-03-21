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

