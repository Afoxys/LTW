<?php include_once('templates/header.php'); ?>

	<div class="background" id="homebackground">
	<?php include_once('templates/navbar.php'); ?>
	<?php include_once('templates/search_form.php'); ?>
	</div>

<?php include_once('templates/footer.php'); ?>


<?php
// TODO:
// Em modo "not login", se permitir "search", eventual botao "rent this house" manda para "create_account.php"
    //(apos criar, redirecionar para onde? guardar o pedido de rent feito anteriormente? como?)
// Alugar casa
// Rate aluguer de casa -> apos login se tiver um aluguer que já passou e que ainda não deu rating redirecionar para pagina de rating
// CSRF - segurança
// List reservations for their places.
// AFONSO: Do rent action - Done
//         Add comment query to view_house
//         Do my_house_rent_listing
?>