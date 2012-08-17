<?php
	$url = "http://sports.espn.go.com/nfl/bottomline/scores";
	
	$newResult = file_get_contents($url);

	/*Thanks to http://www.wecodethings.com/demo/livescores/thank_you_espn.cfm to help me parse the ESPN feed! */
	$newResult = preg_replace('/%20%20/', '@', $newResult);
	$newResult = preg_replace('/%20/', ' ', $newResult);
	$newResult = preg_replace("/%26/", "", $newResult);
	$newResult = preg_replace("/[(][0-9][)]/", "", $newResult);
	$newResult = preg_replace("/[(][0-9][0-9][)]/", "", $newResult);
	$newResult = preg_replace("/[(][A-Z][A-Z][)]/", "", $newResult);
	$newResult = preg_replace("/\^/", "", $newResult);
	$newResult = preg_replace("/[ \t][a-z][a-z][ \t]/", "@", $newResult);
	$newResult = preg_replace("/[(]/", "@(", $newResult);
	$newResult = preg_replace("/[()]/", "", $newResult);

	$j = 0;

	$newResult = explode('&', $newResult);
	for ($i = 3; $i < (count($newResult)-2); $i += 3){
		$matches[$j++] = explode('@', substr($newResult[$i], (strpos($newResult[$i], "=")+1)));
	}

	echo json_encode($matches);
	
	/*for ($i = 0; $i < count($matches); $i += 1){
		echo $matches[$i][0] . " AT " . $matches[$i][1] . $matches[$i][2] . "<br />";
	}*/
?>