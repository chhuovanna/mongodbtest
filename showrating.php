<?php  
require 'vendor/autoload.php'; 
require_once 'menu.php';
use MongoDB\Client as Mongo;


    $mongo = new Mongo("mongodb://127.0.0.1:27017");
    $movies = $mongo->movieRating->movie->find(['title'=>['$exists' => true]]);
    //$reviewers = $mongo->movieRating->reviewer->find(['name'=>['$exists' => true]]);

    $movieOptions = "";


    foreach ($movies as $movie) {
        $movieOptions .= "<option value='". $movie->_id ."'>".$movie->title."</option>";
    }



    $html=<<<EOF

<label>Movie:</label>
<select name="mid" id="mid">
$movieOptions
</select>

<div id="result"></div>
<script>

    $('#mid').off('change');
    $('#mid').on('change', function(){
        $.ajax({
                type:"GET",
                url:"getrating.php",
                data:{mid: parseInt($('#mid').val())},    
                success: function (data) {
                    console.log(data);
                    $('#result').html(data);
                }, 
                error: function(data){
                    console.log(data);
                }
            });

    });
</script>
EOF;
echo $html;

echo "</body></html>";
?>

