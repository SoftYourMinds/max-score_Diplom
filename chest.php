<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wait...</title>
</head>
<body>
	Wait for it...
	<form action="personal_area.php" method="POST">
		<input type="hidden" name ="email_user" value="<?php echo $_GET['email']; ?>">
		<input type="hidden" name ="pass_user" value="<?php echo $_GET['pass']; ?>">
	
	</form>

	<script>
		let form = document.querySelector('form');
		form.submit();
	</script>
</body>

</html>