<?php include_once('templates/header.php'); ?>

	<div class="background2">
		<?php include_once('templates/navbar.php'); ?>
		<div class="form">
			<form method="post">
				<ul class="RegForm">
					<li>
						<label for="first-name">First Name</label>
						<input type="text" id="first-name" placeholder="Enter your first name here">
					</li>
					<li>
						<label for="last-name">Last Name</label>
						<input type="text" id="last-name" placeholder="Enter your last name here">
					</li>
					<li>
						<label for="email">Email</label>
						<input type="email" id="email" placeholder="Enter your email here">
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
						<button type="submit">Submit</button>
					</li>
				</ul>
			</form>
		</div>
	</div>

<?php include_once('templates/footer.php'); ?>