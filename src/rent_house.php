<?php 
    include_once('templates/header.php');
    if(!isset($_SESSION['email'])) {
        header('Location: create_account.php');
    }
?>
	<div class="background" id="rentbackground">
		<?php include_once('templates/navbar.php'); ?>
		<?php include_once('templates/rent_form.php'); ?>
	</div>

<?php include_once('templates/footer.php'); ?>