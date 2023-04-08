<!DOCTYPE html>
<html>
<head>
	<title>피자 품목 삭제</title>
</head>
<body>
	<h1>피자 품목 삭제</h1>
	<?php
		// DB 연결 정보
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mypie";

		// DB 연결
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("DB 연결 실패: " . $conn->connect_error);
		}

		// POST로 받은 id로 데이터 삭제
		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$sql = "DELETE FROM pizza WHERE id = $id";
			if ($conn->query($sql) === TRUE) {
				echo "<p>품목이 성공적으로 삭제되었습니다.</p>";
			} else {
				echo "<p>삭제 실패: " . $conn->error . "</p>";
			}
		}

		// 피자 품목 리스트 출력
		$sql = "SELECT id, name, quantity FROM pizza ORDER BY id ASC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr><th>ID</th><th>피자 종류</th><th>수량</th><th>삭제</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["quantity"] . "</td>";
				echo '<td><form method="post" action=""><input type="hidden" name="id" value="' . $row["id"] . '"><input type="submit" value="삭제"></form></td>';
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "<p>등록된 피자 품목이 없습니다.</p>";
		}

		// DB 연결 종료
		$conn->close();
	?>
</body>
</html>
