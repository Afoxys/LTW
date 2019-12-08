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
    document.getElementById("login-popup").style.display = "none";
}

function toggle_account_panel() {
    let display = document.getElementById("login-popup").style.display;
    document.getElementById("login-popup").style.display = (display == "block") ? "none" : "block";
}

document.addEventListener('click', function (event) {
    if (!document.getElementById('login-popup').contains(event.target) && !event.target.matches('.account-button'))
        close_account_panel();
});

let login_container = document.getElementById('login-container');
login_container.addEventListener('submit', function() { tryLogin(login_container); });

let account_btn = document.getElementById('account-button');
account_btn.addEventListener('click', toggle_account_panel);
