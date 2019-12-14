<?php include_once('templates/header.php'); ?>

<div class="background" id="rentbackground">
<?php include_once('templates/navbar.php'); ?>
    <div class="form">
        <form id="signup-container">
            <h1>Register an account</h2>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email here">

            <br><label for="firstname">First Name</label>
            <input type="text" id="firstname" placeholder="Enter your first name here">

            <br><label for="lastname">Last Name</label>
            <input type="text" id="lastname" placeholder="Enter your last name here">

            <br><label for="phone">Phone</label>
            <input type="tel" id="phone" placeholder="Enter your phone here">

            <br><label for="password">Password</label>
            <input type="password" id="password" minlength="8" maxlength="32" placeholder="Minimum 8 caracters">

            <br><label for="passwordconfirm">Confirm password</label>
            <input type="password" id="passwordconfirm">

            <br><button type="submit" id="register-btn">Register</button>
        </form>
    </div>
</div>
<?php include_once('templates/footer.php'); ?>
