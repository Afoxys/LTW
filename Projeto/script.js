function encode_for_ajax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function try_login(login_form) {
    var email = login_form.email.value;
    var pwd = login_form.password.value;

    if(email !== null && pwd !== null) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { login_success(request); };
        request.open("POST", "login.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encode_for_ajax({email: email, pwd: pwd}));
    }

    event.preventDefault();
}

function try_signup(signup_form) {
    var email = signup_form.email.value;
    var first = signup_form.firstname.value;
    var last = signup_form.firstname.value;
    var phone = signup_form.phone.value;
    var pwd = signup_form.password.value;
    var pwd_confirm = signup_form.passwordconfirm.value;

    console.log(email);
    console.log(first);
    console.log(last);
    console.log(phone);
    console.log(pwd);
    console.log(pwd_confirm);

    if(email !== null && first !== null && last !== null && pwd !== null && pwd_confirm !== null) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { signup_success(request); };
        request.open("POST", "register.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encode_for_ajax({email: email, first: first, last: last, phone: phone, pwd: pwd, pwd_confirm: pwd_confirm}));
    }

    event.preventDefault();
}

function login_success(request) {
    if(request.readyState === XMLHttpRequest.DONE && request.status === 200) {

        console.log(request.responseText);
        let requestData = null;

        try {
            requestData = JSON.parse(request.responseText);
            console.log(requestData);
        } catch (error) {
            console.log('Failed to parse request JSON data.');
        }

        if(requestData.success) {
            location.href = 'index.php';
        }
        else {
            console.log(requestData.msg);
        }
    }
}

function signup_success(request) {
    if(request.readyState === XMLHttpRequest.DONE && request.status === 200) {

        console.log(request.responseText);
        let requestData = null;

        try {
            requestData = JSON.parse(request.responseText);
            console.log(requestData);
        } catch (error) {
            console.log('Failed to parse request JSON data.');
        }

        if(requestData.success) {
            location.href = 'index.php';
        }
        else {
            console.log(requestData.msg);
        }
    }
}

function close_account_panel() {
    document.getElementById("account-popup").style.display = "none";
}

function toggle_account_panel() {
    let account_popup = document.getElementById("account-popup");
    account_popup.style.display = (account_popup.style.display == "block") ? "none" : "block";
}



// Toggle account panel
let account_btn = document.getElementById('account-button');
account_btn.addEventListener('click', toggle_account_panel);

// Close account panel everywhere
document.addEventListener('click', function (event) {
    if (!document.getElementById('account-popup').contains(event.target) && !event.target.matches('#account-button'))
        close_account_panel();
});

let login_container = document.getElementById('login-container');
if(login_container != null) {
    // Event handling for login button
    login_container.addEventListener('submit', function() { try_login(login_container); });
}
else {
    // Event handling for logout button
    let logged_container = document.getElementById('logged-container');
    if(logged_container != null) {
        logged_container.addEventListener('submit', function (event) {
            document.location = 'logout.php';
            event.preventDefault();
        });
    }
}

// Event handling for signup button
let signup_container = document.getElementById('signup-container');
if(signup_container != null) {
    signup_container.addEventListener('submit', function() { try_signup(signup_container); });
}