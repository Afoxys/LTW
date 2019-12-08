function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function tryLogin(loginForm) {
    var email = loginForm.email.value;
    var pwd = loginForm.password.value;

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

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}



let loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', function() { tryLogin(loginForm); });