<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');
body {font-family: 'Quicksand', sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
#account-button {
    padding: 7.75px 16px;
    font-size: 17px;
    font-weight: normal;
}

#account-button img{
    pointer-events:none;
}

/* Add styles to the form container */
#logged-container {
    max-width: 323.5px;
    padding: 10px;
    font-size: 0.75em;
}

/* Set a style for the submit/login button */
#logged-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

#logged-container .settings, #logged-container .houses{
  background-color: #f1f1f1bb;
  color: black;
}

/* Add some hover effects to buttons */
#logged-container .btn:hover, #account-button:hover {
  opacity: 1;
}

@media screen and (max-width: 720px) {
    #account-button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 8.3px 1em;
    }

    #account-popup {
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


<!-- TODO: Get user image via query -->
<button id="account-button"><img src="userimgs/pic-1.png"></button>

<div id="account-popup">
  <form id="logged-container">
    <!-- TODO: Get username via query -->
    <h1>Welcome, username</h1>

    <button type="button" class="btn settings"  onclick="open_settings()">Account settings</button>

    <button type="button" class="btn houses" onclick="open_management()">Manage my houses</button>

    <button type="submit" id="logout-btn"class="btn">Logout</button>
  </form>
</div>

<!-- <script>
function open_form() {
  document.getElementById("myForm").style.display = "block";
}

function close_form() {
  document.getElementById("myForm").style.display = "none";
}
function open_settings() {
  document.getElementById("myForm").style.display = "none";
}
function open_management() {
  document.getElementById("myForm").style.display = "none";
} -->

<!-- let logout = document.getElementById('myForm');
logout.addEventListener('submit', function (event) {
    document.location = 'logout.php';
}); -->

<!-- </script> -->
