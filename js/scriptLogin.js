const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    var ok1=1;
    var ok2=1;

    if (usernameValue === '') {
        //show error
        //add error class
        alert("Username cannot be blank!");
        ok1=0;
    }
    else {
        //add success class
        ok1=1;
    }


    if (passwordValue === '') {
        alert("Password cannot be blank!");
        ok2=0;
    }
    else {
        ok2=1;
    }

    if(ok1==1 && ok2==1 && usernameValue==='profesor'){
        myFunction2();
    }
    else if(ok1==1 && ok2==1){
        myFunction();
    }

    function myFunction() {
        location.replace("Menu.html");
      }

      function myFunction2() {
        location.replace("Menu-prof.html");
      }

}


