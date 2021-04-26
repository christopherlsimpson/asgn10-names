<!DOCTYPE html>

<html>
<head>
	<title>index.php</title>
	
</head>
<body>
	<h1>Names</h1>

	<a href="index.php">Link</a>
<?php

include("utility-functions.php");

$fileName = "names-short-list.txt";

$lineNumber = 0;


// read the file and put it into an array called $fullNames
$FH = fopen("$fileName", "r");
$nextName = fgets($FH);

while(!feof($FH)) {

if ($lineNumber % 2 == 0) {

$fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));

}

$lineNumber++;
$nextName = fgets($FH);
}




// trim the names
foreach($fullNames as $fullName) {
     $startHere = strpos($fullName, ",") + 1;
	 $firstNames[] = trim(substr($fullName, $startHere));
	 

}

foreach($fullNames as $fullName) {
     $stopHere = strpos($fullName, ",");
	 $lastNames[] = substr($fullName, 0, $stopHere);

}


// get valid names
for ($i = 0; $i < sizeof($fullNames); $i++) {
     if (ctype_alpha($lastNames[$i].$firstNames[$i])) {
          
		$validFirstNames[$i] = $firstNames[$i];
		$validLastNames[$i] = $lastNames[$i];
		$validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];

	 }

}


// display results

echo"<h1>Names - Results</h1>";

echo"<h2>All Names</h2>";

echo"<p>There are " . sizeof($fullNames) . " total names.</p>";

foreach($fullNames as $fullName) {

	echo"$fullName</br>";

}

echo"<h2>Valid Names</h2>";

echo"<p>There are " . sizeof($validFullNames) . " Valid names.</p>";


foreach ($validFullNames as $validFullName){
	echo"$validFullName</br>";

}

echo"<h2>Unique Names</h2>";

$uniqueValidNames = (array_unique($validFullNames));

echo"<p>There are " . sizeof($uniqueValidNames) . " Unique names.</p>";

foreach($uniqueValidNames as $uniqueValidNames) {
	echo"$uniqueValidNames</br>";


}














?>




































</body>
</html>
