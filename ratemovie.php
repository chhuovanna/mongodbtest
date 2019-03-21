<?php  
require 'vendor/autoload.php'; 
require_once 'menu.php';
use MongoDB\Client as Mongo;

    //test if the previous insert is successful or not 
    if (array_key_exists("success", $_GET) ){
        if ($_GET['success'] == 1)
            echo("<script>alert('Added')</script>");
        else
            echo("<script>alert('Fail to add')</script>");
    }



    $mongo = new Mongo("mongodb://127.0.0.1:27017");
    $movieCollection = $mongo->movieRating->movie;
    $movies = $movieCollection->find(['title'=>['$exists' => true]]); // get only the movie with title
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
    <label>Stars:</label><input type="number" min='1' max='5' name="stars" required>
    <br>
    <button type="submit">Save</button>
</form>
EOF;
echo $html;





echo "</body></html>";
?>

