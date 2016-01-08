<?php
header('Access-Control-Allow-Origin: *');

$servername = "568e8eb50c1e661ec50001a7-cuibo.rhcloud.com";
$username = "adminjZcePWq";
$password = "gG95_u8qtSsn";
$dbname = "php";
$port = 56031;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
	echo json_encode(array('return' => "KO" ));
    die("Connection failed: " . $conn->connect_error);
} 
//echo json_encode(array('return' => "OK" ));

$sql = "SELECT * FROM restos";
$result = $conn->query($sql);
$tabReturn = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tabTmp = array(
          'id' => $row['id'],
          'resto' => $row['resto'],
          'address' => $row['address'],
          'latitude' => $row['latitude'],
          'longitude' => $row['longitude'],
          'zoom' => $row['zoom'],
          'description' => $row['description']
        );
        array_push($tabReturn, $tabTmp);
    }

    echo json_encode($tabReturn);
} else {
    echo "0 results";
}
$conn->close();



