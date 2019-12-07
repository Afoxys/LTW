<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');
body {font-family: 'Quicksand', sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
    float: right;
    display: block;
    color: #e27d60;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    font-weight: normal;
    border-radius: 5px;
    background-color: transparent;
    border:none;
}

.open-button:hover {
background-color: #e8a87c;
color: white;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 49px;
  right: 0;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
    border-radius: 2px;
    max-width: 335px;
    padding: 10px;
    background-color: #f1f1f1aa;
}

/* Full-width input fields */
.form-container input[type=email], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=email]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

@media screen and (max-width: 720px) {
    .open-button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
    }

    .form-popup {
        display: none;
        position: fixed;
        top: 117px;
        width: 100%;
        z-index: 1;
    }

    /* Add styles to the form container */
    .form-container {
        border-radius: 2px;
        padding: 10px;
        width: 100%;
        background-color: #f1f1f1;
    }
}

</style>

</head>
<body>

<button class="open-button" onclick="openForm()">Login</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" minlength="8" maxlength="128" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
