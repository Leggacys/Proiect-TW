const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');
const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  checkInputs();
});

function checkInputs(){
  //get values from checkInputs
  const usernameValue = username.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();
  var ok1=1;
  var ok2=1;
  var ok3=1;
  var ok4=1;

  if(usernameValue === ''){
    //show error
    //add error class
    setErrorFor(username, "Username cannot be blank!");
    ok1 = 0;
  }
  else{
    //add success class
    setSuccessFor(username);
    ok1 = 1;
  }

  if(emailValue === ''){
    setErrorFor(email, "Email cannot be blank!");
    ok2=0;
  }
  else if(!isEmail(emailValue)){
    setErrorFor(email, "Email is not Valid!");
    ok2=0;
  }
  else{
    setSuccessFor(email);
    ok2=1;
  }

  if(passwordValue === ''){
    setErrorFor(password, "Password cannot be blank!");
    ok3=0;
  }
  else{
    setSuccessFor(password);
    ok3=1;
  }

  if(password2Value === ''){
    setErrorFor(password2, "Password cannot be blank!");
    ok4=0;
  }
  else if(passwordValue != password2Value){
    setErrorFor(password2, "Passwords does not match!");
    ok4=0;
  }
  else{
    setSuccessFor(password2);
    ok4=1;
  }
  if(ok1==1 && ok2==1 && ok3==1 && ok4==1)
    myFunction();

}

function setErrorFor(input, message){
  const formControl = input.parentElement; //.form-control
  const small = formControl.querySelector('small');

  //add error message inside small
  small.innerText = message;

  //add error class
  formControl.className = 'form-control error';
}

function setSuccessFor(input){
  const formControl = input.parentElement; //.form-control
  formControl.className = 'form-control success';
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function myFunction() {
  location.replace("index.html");
}