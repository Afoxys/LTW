<?php include_once('templates/header.php'); ?>

	<div class="background" id="homebackground">
	<?php include_once('templates/navbar.php'); ?>
	<?php include_once('templates/search_form.php'); ?>
	</div>

<?php include_once('templates/footer.php'); ?>


<?php
// outras coisas:
// Em modo "not login", botao "rent your house" da navbar manda para "create_account.php" (apos criar, redirecionar para onde?)
// Em modo "not login", se permitir "search", eventual botao "rent this house" manda para "create_account.php"
    //(apos criar, redirecionar para onde? guardar o pedido de rent feito anteriormente? como?)
?>