const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');
const password2 = document.getElementById('password2');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');


form.addEventListener('submit', (e) => {
  e.preventDefault();
  checkInputs();
});

function checkInputs() {
  //get values from checkInputs
  /* if(document.getElementById('student').checked) {
    alert("student");
    var year = document.getElementById("year");
    var stringYear = year.options[year.selectedIndex].text;
    alert(stringYear);

    var semian = document.getElementById("semian");
    var stringSemian = semian.options[semian.selectedIndex].text;
    alert(stringSemian);

    var group = document.getElementById("group");
    var stringGroup = group.options[group.selectedIndex].text;
    alert(stringGroup);
    
  }else if(document.getElementById('teacher').checked) {
    alert("profesor");
  } */
  const usernameValue = username.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();
  const firstnameValue = firstname.value.trim();
  const lastnameValue = lastname.value.trim();
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

  if (firstnameValue === '') {
    //show error
    //add error class
    setErrorFor(firstname, "Firstname cannot be blank!");
    ok1 = 0;
    console.log("salut");
  }
  else {
    //add success class
    setSuccessFor(firstname);
    ok1 = 1;
  }

  if (lastnameValue === '') {
    //show error
    //add error class
    setErrorFor(lastname, "Firstname cannot be blank!");
    ok1 = 0;
    console.log("salut");
  }
  else {
    //add success class
    setSuccessFor(lastname);
    ok1 = 1;
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


        function displayRadioValue() {
            var ele = document.getElementsByName('gender');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked)
                document.getElementById("result").innerHTML
                        = "Gender: "+ele[i].value;
            }
        }
   

function myFunction() {
  // Selecting the input element and get its value 
  var usernameValue = document.getElementById("username").value.trim();
  var emailValue = document.getElementById("email").value.trim();
  var passwordValue = document.getElementById("password").value.trim();
  var password2Value = document.getElementById("password2").value.trim();
  var firstnameValue = document.getElementById("firstname").value.trim();
  var lastnameValue = document.getElementById("lastname").value.trim();
  var rolValue;
  var yearValue;
  var semianValue;
  var groupValue;
  if(document.getElementById('student').checked) {
    rolValue = document.getElementById('student').value.trim();
    var year = document.getElementById("year");
    var stringYear = year.options[year.selectedIndex].text;
    yearValue = stringYear;
    //alert(stringYear);

    var semian = document.getElementById("semian");
    var stringSemian = semian.options[semian.selectedIndex].text;
    semianValue = stringSemian;
    //alert(stringSemian);

    var group = document.getElementById("group");
    var stringGroup = group.options[group.selectedIndex].text;
    groupValue = stringGroup;
    //alert(stringGroup);
    
  }else if(document.getElementById('teacher').checked) {
    rolValueX = document.getElementById('teacher').value.trim();
    //alert("profesor");
    rolValue = rolValueX.concat('2');
    alert(rolValue);
  }

  
  
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
  //let obj = { "firstname": usernameValue, "lastname": passwordValue, "email": emailValue, "parola":password2Value };
  let obj = { "username": usernameValue , "firstname": firstnameValue, "lastname": lastnameValue, "email": emailValue, "parola":passwordValue, "rol":rolValue, "year":yearValue, "semian":semianValue, "grup":groupValue};
  let json = JSON.stringify(obj);
  alert(json);
  ajax.send(json);
  location.replace("");
} 


