<!DOCTYPE html>

<html>
<head>
	<title>index.php</title>
	
</head>
<body>
	<h1>Names</h1>

	<a href="index.php">Link</a>
<?php

$fileName = "names-short-list.txt";

$lineNumber = 0;


// load the array
$FH = fopen("$fileName", "r");
$nextName = fgets($FH);

while(!feof($FH)) {

if ($lineNumber % 2 == 0) {

$fullNames[] = trim(substr($nextName, 0, strpos($nextName, " ==")));

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

echo"There are " . sizeof($fullNames) . " total names.";

foreach($fullNames as $fullName) {

	echo"<p>$fullName</p>< /br>";

}
















?>




































</body>
</html>
