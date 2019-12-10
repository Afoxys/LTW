<?php
	//session_set_cookie_params(0, '/', '', false, true);
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-PT">

	<head>
		<title>LTW</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="/LTW/Projeto/css/style.css" rel="stylesheet">  <!-- Presentation: Absolute path to prevent path relative stylesheet import exploit -->   
        <link href="/LTW/Projeto/css/popup.css" rel="stylesheet">  <!-- Presentation: Absolute path to prevent path relative stylesheet import exploit -->

		<!-- <?php
		switch ($_SERVER["SCRIPT_NAME"]) {
			case "/LTW/Projeto/rent_house.php":
			?> <link href="css/form.css" rel="stylesheet"> <?php
			break;
			default:
			break;
		}
		?> -->

		<link rel="icon" href="/LTW/Projeto/favicon.ico">
		<link rel="shortcut icon" href="/LTW/Projeto/favicon.ico">
		<script src="script.js" defer></script>
	</head>

	<body>

		<!-- DEBUG -->
		<?php
		if(isset($_SESSION['email']))
			echo $_SESSION['email'];
		?>
		<!-- DEBUG -->