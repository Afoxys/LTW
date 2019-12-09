<button id="account-button" >Login</button>

<div id="account-popup">
    <form id="login-container">
        <h1>Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="email" id="email" placeholder="Enter Email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" id="password" minlength="8" maxlength="128" placeholder="Enter Password" required>

        <button type="submit" id="login-btn">Login</button>

        <button type="button" id="register-btn" onclick="location.href='register.php';" >Don't have an account?</button>
    </form>
</div>
