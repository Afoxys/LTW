<?php 

include_once('templates/header.php');
include_once('templates/navbar.php');

include_once('database/account_q.php');

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
}

$user_data = try_get_user($_SESSION['email']);

?>

    <h1>Welcome, <?php echo $user_data['firstname']; ?></h1>
    <h2>To make a change, type your current password, fill any field you want to change and click change</h2>

    <form action="actions/change_user.php" method="POST" enctype="application/x-www-form-urlencoded">
        <label for="current_pwd">Current Password</label>
        <input type="password" name="current_pwd" minlength="8" maxlength="128" placeholder="Minimum 8 caracters">
        <hr>
        <br><label for="firstname">Change first name</label>
        <input type="text" name="firstname" placeholder=<?php echo $user_data['firstname']; ?>>
        <br><label for="lastname">Change last name</label>
        <input type="text" name="lastname" placeholder=<?php echo $user_data['lastname']; ?>>
        <br><label for="phone">Change phone number</label>
        <input type="tel" name="phone" placeholder=<?php echo $user_data['phone']; ?>>
        <br><label for="new_pwd">New password</label>
        <input type="password" name="new_pwd" placeholder="Minimum 8 caracters">

        <br><button type="submit">Change</button>
    </form>

    <?php
        if(isset($_GET['code'])) {
            ?> <h3>Change <?php echo $_GET['code'] ?> </h3> <?php
        }
    ?>

<?php include_once('templates/footer.php'); ?>