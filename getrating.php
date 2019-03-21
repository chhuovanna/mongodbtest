<?php 
require 'vendor/autoload.php'; 
use MongoDB\Client as Mongo;


$mongo = new Mongo("mongodb://127.0.0.1:27017");
$movie = $mongo->movieRating->movie->findOne(["_id" => (int) $_GET['mid'] ]);

$ratings = $movie->ratings;


$stars =0;

$html = <<<EOF
<table style="border:solid 1px black; width:500px; text-align:center">
	<th>reviewer</th>
	<th>stars</th>
	<th>ratingDate</th>
	

EOF;

foreach ($ratings as $rating) {
	$stars += $rating->stars;
	$reviewer = $mongo->movieRating->reviewer->findOne(['_id' => $rating->rid] , ['name' => 1, '_id' => 0]);

	$html .= <<<EOF
		<tr>
			
			<td>$reviewer->name</td>
			<td>$rating->stars</td>
			<td>$rating->ratingDate</td>
		</tr>
EOF;
}
if (sizeof($ratings) > 0)
	$stars = $stars/sizeof($ratings); //find avg rate

$html = "<br><label>Average stars : $stars</label><br><br>" . $html . "</table>";



echo $html;


?>

