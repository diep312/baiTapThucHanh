<?php
$servername = "localhost:3306";
$username = "username";
$password = "password";

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// TẠO DB 
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// TẠO BẢNG MOVIE 
$sql = "CREATE TABLE Movie (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_name VARCHAR(30) NOT NULL,
    img_URL VARCHAR(320) NOT NULL,
    category VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

// Insert dữ liệu thử 
$sql = "INSERT INTO Movie (movie_name, img_URL, category)
        VALUES ('The Shawshank Redemption', '/img/p1.PNG', 'Drama'),
                ('The Godfather', '/img/p2.PNG', 'Crime'),
                ('The Dark Knight', '/img/p3.PNG', 'Action'),
                ('Forrest Gump', '/img/p4.PNG', 'Drama'),
                ('Inception', '/img/p5.PNG', 'Sci-Fi');"


//Query data từ bảng 
$sql = "SELECT id, movie_name, img_URL FROM Movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo <a href=""><img src=$row["img_URL"] alt=$row["movie_name"]></a>
  }
} else {
  echo "0 results";
}

$conn->close();
?>