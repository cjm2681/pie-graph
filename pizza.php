<!DOCTYPE html>
<html>
<head>
	<title>Pizza 입력 페이지</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			var dataString = $("#pizza_form").serialize();
			$.ajax({
				type: "POST",
				url: "insert_pizza.php",
				data: dataString,
				cache: false,
				success: function(){
					alert("데이터 입력이 완료되었습니다.");
				}
			});
			return false;
		});
	});
	</script>
</head>
<body>
	<form id="pizza_form">
		<label for="name">이름:</label>
		<input type="text" name="name" id="name">
		<br>
		<label for="quantity">수량:</label>
		<input type="text" name="quantity" id="quantity">
		<br>
		<input type="submit" name="submit" id="submit" value="입력">
	</form>
</body>
</html>
