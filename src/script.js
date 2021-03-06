function encode_for_ajax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function try_login(login_form) {
    var email = login_form.email.value;
    var pwd = login_form.password.value;
    var pre_csrf = login_form.pre_csrf.value;

    if(email !== null && pwd !== null && pre_csrf !== null) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { login_success(request); };
        request.open("POST", "actions/login.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encode_for_ajax({email: email, pwd: pwd, pre_csrf: pre_csrf}));
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
            document.location = 'actions/logout.php';
            event.preventDefault();
        });
    }
}




function try_signup(signup_form) {
    var email = signup_form.email.value;
    var first = signup_form.firstname.value;
    var last = signup_form.lastname.value;
    var phone = signup_form.phone.value;
    var pwd = signup_form.password.value;
    var pwd_confirm = signup_form.passwordconfirm.value;
    var pre_csrf = signup_form.pre_csrf.value;

    if(email !== null && first !== null && last !== null && pwd !== null && pwd_confirm !== null && pre_csrf !== null) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { signup_success(request); };
        request.open("POST", "actions/register.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encode_for_ajax({email: email, first: first, last: last, phone: phone, pwd: pwd, pwd_confirm: pwd_confirm, pre_csrf: pre_csrf}));
    }

    event.preventDefault();
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

// Event handling for signup button
let signup_container = document.getElementById('signup-container');
if(signup_container != null) {
    signup_container.addEventListener('submit', function() { try_signup(signup_container); });
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
if(account_btn != null) {

    // Close account panel everywhere
    document.addEventListener('click', function (event) {
        if (!document.getElementById('account-popup').contains(event.target) && !event.target.matches('#account-button'))
            close_account_panel();
    });

    account_btn.addEventListener('click', toggle_account_panel);
}


function try_add_house(my_rent_container) {
    var title = my_rent_container.title.value;
    var price = my_rent_container.daily_price.value;
    var city = my_rent_container.city.value;
    var region = my_rent_container.region.value;
    var country = my_rent_container.country.value;
    var street = my_rent_container.street.value;
    var door = my_rent_container.door.value;
    var floor = my_rent_container.floor.value;
    var postal = my_rent_container.postal_code.value;

    var description = my_rent_container.description.value;
    var beds = my_rent_container.bed_number.value;
    var availability_start = my_rent_container.availability_start.value;
    var availability_end = my_rent_container.availability_end.value;

    var pet = my_rent_container.pet.checked;
    var kitchen = my_rent_container.kitchen.checked;
    var wifi = my_rent_container.wifi.checked;
    var air_con = my_rent_container.air_con.checked;
    var low_mobility = my_rent_container.low_mobility.checked;
    var washing = my_rent_container.washing.checked;

    var csrf = my_rent_container.csrf.value;

    if(floor == null || floor == "") {
        floor = "N/A";
    }

    if(title !== null && price !== null &&
        city !== null && region !== null && country !== null && street !== null && door !== null && postal !== null && 
        description !== null && beds !== null && 
        pet !== null && kitchen !== null && wifi !== null && air_con !== null && low_mobility !== null && washing !== null && csrf !== null
    ) {

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () { add_house_success(request); };
        request.open("POST", "actions/add_house.php", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(encode_for_ajax({title: title, price: price, city: city, region: region, country: country, street: street,
            floor: floor, door: door, postal: postal, description: description, beds: beds, availability_start: availability_start, availability_end: availability_end,
            pet: pet, kitchen: kitchen, wifi: wifi, air_con: air_con, low_mobility: low_mobility, washing: washing, csrf: csrf
        }));
    }

    event.preventDefault();
}

function add_house_success(request) {
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
            // console.log(requestData.id);
            my_form=document.createElement('FORM');
            my_form.name='redirect_create_house';
            my_form.method='POST';
            my_form.action='view_house.php';

            my_tb=document.createElement('INPUT');
            my_tb.type='HIDDEN';
            my_tb.name='id';
            my_tb.value= requestData.id;
            my_form.appendChild(my_tb);
            document.body.appendChild(my_form);

            my_form.submit();
        }
        else {
            console.log(requestData.msg);
        }
    }
}



// Event handling for rent my house button
let my_rent_container = document.getElementById('my-rent-container');
if(my_rent_container != null) {
    my_rent_container.addEventListener('submit', function() { try_add_house(my_rent_container); });
}




let search_filter = document.getElementById('search_filter');
if(search_filter != null) {
    var inputs = search_filter.getElementsByTagName("input"); 
    for (i = 0; i < inputs.length; i++) {
       inputs[i].onchange = refresh_search;
    }
}

function refresh_search() {
    console.log("REFRESH");
}