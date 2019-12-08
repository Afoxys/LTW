<!DOCTYPE html>
<html>

	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		@import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');
		body {font-family: 'Quicksand', sans-serif;}
		* {box-sizing: border-box;}

		.account-button {
			float: right;
			display: block;
			color: #e27d60;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
			font-weight: normal;
			border-radius: 5px;
			background-color: transparent;
			border:none;
		}

		.account-button:hover {
			background-color: #e8a87c;
			color: white;
		}

		/* The login popup form - hidden by default */
		.login-popup {
			display: none;
			position: fixed;
			top: 49px;
			right: 0;
			z-index: 9;
		}

		/* Add styles to the login container */
		.login-container {
			border-radius: 2px;
			max-width: 335px;
			padding: 10px;
			background-color: #f1f1f1aa;
		}

		/* Full-width input fields */
		.login-container input[type=email], .login-container input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
		}

		/* When the inputs get focus, do something */
		.login-container input[type=email]:focus, .login-container input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Set a style for the login button */
		.login-container #login-btn {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			border: none;
			cursor: pointer;
			width: 100%;
			margin-bottom:10px;
			opacity: 0.8;
		}

		/* Add some hover effects to buttons */
		.login-container #login-btn:hover, .account-button:hover {
			opacity: 1;
		}

		@media screen and (max-width: 720px) {
			.account-button {
				float: none;
				display: block;
				text-align: left;
				width: 100%;
				margin: 0;
				padding: 14px;
			}

			.login-popup {
				display: none;
				position: fixed;
				top: 117px;
				width: 100%;
				z-index: 1;
			}

			/* Add styles to the login container */
			.login-container {
				border-radius: 2px;
				padding: 10px;
				width: 100%;
				background-color: #f1f1f1;
			}
		}

		</style>
	</head>
	<body>


<div class="login-popup" id="login-popup">
  <form id="login-container" class="login-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Enter Email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" id="password" minlength="8" maxlength="128" placeholder="Enter Password" required>

    <button type="submit" id="login-btn">Login</button>
  </form>
</div>

</body>
</html>
