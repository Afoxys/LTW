<?php 

include_once('templates/header.php');
include_once('templates/navbar.php');

// include_once('database/house_q.php');

// $house_data = try_get_house_by_id($_GET['id']);

?>

    <h1>Welcome, <?php echo $_SESSION['firstname']; ?></h1>

    <form method="post">
        <label id="change_firstname">Change first name</label>
        <input type="text" id="firstname" placeholder=<?php echo $_SESSION['firstname']; ?>>
    </form>
    <form method="post">
        <label id="change_lastname">Change last name</label>
        <input type="text" id="lastname">

    </form>
    <form method="post">
        <label id="change_phone">Change phone number</label>
        <input type="tel" id="phone">

    </form>
    <form method="post">
        <label id="change_password">Change password</label>
        <input type="password" id="password" minlength="8" maxlength="32" placeholder="Minimum 8 caracters">

    </form>

<?php include_once('templates/footer.php'); ?>