<?php
  session_set_cookie_params(0, '/', '', false, true);
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-PT">

	<head>
		<title>LTW</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">

		<!-- <?php
		switch ($_SERVER["SCRIPT_NAME"]) {
			case "/LTW/Projeto/rent_house.php":
			?> <link href="css/form.css" rel="stylesheet"> <?php
			break;
			default:
			break;
		}
		?> -->

		<link rel="icon" href="icon.png">
		<script src="script.js" defer></script>
	</head>

	<body>

		<!-- DEBUG -->
		<?php
		if(isset($_SESSION['email']))
			echo $_SESSION['email'];
		?>
		<!-- DEBUG -->