 <?php
$servername = "localhost";
$username = "root";
$password = "soham";
$dbname = "CODECHEF";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE USERS (
username VARCHAR(30) PRIMARY KEY,
password VARCHAR(30) NOT NULL,
karma INT
)";

if (mysqli_query($conn, $sql)) {
    echo "Table USERS created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


$sql = "CREATE TABLE POST(
ID int NOT NULL AUTO_INCREMENT,
userid VARCHAR(50) NOT NULL,
title VARCHAR(100) NOT NULL,
likes INT,
dislikes INT,
content VARCHAR(10000),
PRIMARY KEY(ID)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table POST created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE COMMENTS(
id int NOT NULL AUTO_INCREMENT,
userid VARCHAR(50) NOT NULL,
postid int NOT NULL,
comment VARCHAR(10000) NOT NULL,
date VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table COMMENT created successfully";
} else {
    echo "Error creating table COMMENT: " . mysqli_error($conn);
}


mysqli_close($conn);
?> 