<?php include_once('templates/header.php'); ?>

	<div class="background2">

		<?php include_once('templates/navbar.php'); ?>
		<div class="form">
			<form id="signup-container">
				<ul class="RegForm">
					<li>
						<label for="email">Email</label>
						<input type="email" id="email" placeholder="Enter your email here">
					</li>
					<li>
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" placeholder="Enter your first name here">
					</li>
					<li>
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" placeholder="Enter your last name here">
					</li>
					<li>
						<label for="phone">Phone</label>
						<input type="tel" id="phone" placeholder="Enter your phone here">
					</li>
					<li>
						<label for="password">Password</label>
						<input type="password" id="password" minlength="8" maxlength="32" placeholder="Minimum 8 caracters">
					</li>
					<li>
						<label for="passwordconfirm">Confirm password</label>
						<input type="password" id="passwordconfirm">
					</li>
					<li>
						<label>Password Strength</label>
					</li>
					<li>
						<button type="submit" id="signup-btn">Signup</button>
					</li>
				</ul>
			</form>
		</div>

	</div>

<?php include_once('templates/footer.php'); ?>