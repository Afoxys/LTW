<style>
    #registerform {
        height: 35em;
    }

    #registerform {
        height: unset;
        width: 50%;
        margin: 2% 25% 0 25%; 
    }

    #registerform button{
        margin-top: 1em;
    }
</style>
<section id="registerform">
    <form action="actions/change_user.php" method="POST" enctype="application/x-www-form-urlencoded">
        <h1>Welcome, <?php echo $user_data['firstname']; ?> <?php echo $user_data['lastname']; ?></h1>
        <label><br>Change first name</label>
            <input type="text" name="firstname" placeholder=<?php echo $user_data['firstname']; ?>>
        <label><br>Change last name</label>
            <input type="text" name="lastname" placeholder=<?php echo $user_data['lastname']; ?>>
        <label><br>Change phone number</label>
            <input type="tel" name="phone" placeholder=<?php echo $user_data['phone']; ?>>
        <label><br>New password</label>
            <input type="password" name="new_pwd" placeholder="Minimum 8 caracters">
        <label><br>Type your current password in order to verify your changes:</label> 
            <input type="password" name="current_pwd" minlength="8" maxlength="128" placeholder="Current password">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
        <br><button type="submit">Change</button>
        <?php
        if(isset($_GET['code'])) {
            ?> <h3>Change <?php echo htmlentities($_GET['code'], ENT_QUOTES) ?> </h3> <?php
        }
    ?>
    </form>
</section>