<?php 

include_once('templates/header.php');
include_once('database/account_q.php');

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$user_data = try_get_user($_SESSION['email']);

?>
<div class="background" id="rentbackground">
	<?php include_once('templates/navbar.php'); ?>
	<?php include_once('templates/settings_form.php'); ?>
</div>
<?php
    if(isset($_GET['code'])) {
        ?> <h3>Change <?php echo $_GET['code'] ?> </h3> <?php
    }
?>

<?php include_once('templates/footer.php'); ?>