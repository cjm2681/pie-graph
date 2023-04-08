<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mypie";

$name = $_POST['name'];
$quantity = $_POST['quantity'];

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
  die("연결 실패: " . $conn->connect_error);
}

// 데이터 삽입
$sql = "INSERT INTO pizza (name, quantity) VALUES ('$name', '$quantity')";

if ($conn->query($sql) === TRUE) {
  echo "데이터 삽입 성공";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
