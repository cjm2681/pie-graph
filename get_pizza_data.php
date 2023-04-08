<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mypie";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
  die("연결 실패: " . $conn->connect_error);
}

// 데이터 조회
$sql = "SELECT name, quantity FROM pizza ORDER BY id DESC LIMIT 10"; //LIMITE 숫자 바꾸면 그래프 품목 최대 갯수 바뀜 
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);

$conn->close();
?>
