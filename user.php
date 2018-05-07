<?php
$servername = "localhost";
$username = "root";
$password = "soham";
$dbname = "CODECHEF";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO USERS (username, password, karma)
VALUES ('soham', 'soham', 0);";
$sql .= "INSERT INTO USERS (username, password, karma)
VALUES ('admin', 'admin', 0);";
$sql .= "INSERT INTO USERS (username, password, karma)
VALUES ('codechef', 'codechef', 0);";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>