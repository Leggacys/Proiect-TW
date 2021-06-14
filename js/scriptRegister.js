const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');
const password2 = document.getElementById('password2');
const json = '{ "fruit": "pineapple", "fingers": 10 }';



form.addEventListener('submit', (e) => {
  e.preventDefault();
  checkInputs();
});

function checkInputs() {
  //get values from checkInputs
  const usernameValue = username.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();
  var ok1 = 1;
  var ok2 = 1;
  var ok3 = 1;
  var ok4 = 1;

  if (usernameValue === '') {
    //show error
    //add error class
    setErrorFor(username, "Username cannot be blank!");
    ok1 = 0;
    console.log("salut");
  }
  else {
    //add success class
    setSuccessFor(username);
    ok1 = 1;
  }

  if (emailValue === '') {
    setErrorFor(email, "Email cannot be blank!");
    ok2 = 0;
  }
  else if (!isEmail(emailValue)) {
    setErrorFor(email, "Email is not Valid!");
    ok2 = 0;
  }
  else {
    setSuccessFor(email);
    ok2 = 1;
  }

  if (passwordValue === '') {
    setErrorFor(password, "Password cannot be blank!");
    ok3 = 0;
  }
  else {
    setSuccessFor(password);
    ok3 = 1;
  }

  if (password2Value === '') {
    setErrorFor(password2, "Password cannot be blank!");
    ok4 = 0;
  }
  else if (passwordValue != password2Value) {
    setErrorFor(password2, "Passwords does not match!");
    ok4 = 0;
  }
  else {
    setSuccessFor(password2);
    ok4 = 1;
  }
  if (ok1 == 1 && ok2 == 1 && ok3 == 1 && ok4 == 1) {

    myFunction();
  }

}

function setErrorFor(input, message) {
  const formControl = input.parentElement; //.form-control
  const small = formControl.querySelector('small');

  //add error message inside small
  small.innerText = message;

  //add error class
  formControl.className = 'form-control error';
}

function setSuccessFor(input) {
  const formControl = input.parentElement; //.form-control
  formControl.className = 'form-control success';
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function myFunction() {
  // Selecting the input element and get its value 
  var usernameValue = document.getElementById("username").value.trim();
  var emailValue = document.getElementById("email").value.trim();
  var passwordValue = document.getElementById("password").value.trim();
  var password2Value = document.getElementById("password2").value.trim();

  var ajax = new XMLHttpRequest();
  var method = "POST";
  var url = "../api/create_user.php";
  var async = true;
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var myResponse = JSON.parse(this.responseText);
      console.log(myResponse);
    }
  };
  ajax.open(method, url, async);
  let obj = { "firstname": usernameValue, "lastname": passwordValue, "email": emailValue, "parola":password2Value };
  let json = JSON.stringify(obj);
  //alert(json);
  ajax.send(json);
  location.replace("");
}


