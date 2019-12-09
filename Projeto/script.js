function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function tryLogin(loginForm) {
    var email = loginForm.email.value;
    var pwd = loginForm.password.value;

    console.log(email);
    console.log(pwd);

    if(email !== null && pwd !== null) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { loginSuccess(request); };
        request.open("POST", "login.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encodeForAjax({email: email, pwd: pwd}));
    }

    event.preventDefault();
}

function loginSuccess(request) {
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

document.addEventListener('click', function (event) {
    if (!document.getElementById('account-popup').contains(event.target) && !event.target.matches('#account-button'))
        close_account_panel();
});

let account_popup = document.getElementById('account-popup');
console.log(account_popup);
let login_container = document.getElementById('login-container');
console.log(login_container);
if(login_container != null) {
    login_container.addEventListener('submit', function() { tryLogin(login_container); });
}
else {
    let logged_container = document.getElementById('logged-container');
    console.log(logged_container);
    if(logged_container != null) {
        logged_container.addEventListener('submit', function (event) {
            document.location = 'logout.php';
            event.preventDefault();
        });
    }
}

let account_btn = document.getElementById('account-button');
console.log(account_btn);

account_btn.addEventListener('click', toggle_account_panel);

