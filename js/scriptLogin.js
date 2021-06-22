const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('parola');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    var ok1 = 1;
    var ok2 = 1;

    if (usernameValue === '') {
        //show error
        //add error class
        alert("Username cannot be blank!");
        ok1 = 0;
    }
    else {
        //add success class
        ok1 = 1;
    }


    if (passwordValue === '') {
        alert("Password cannot be blank!");
        ok2 = 0;
    }
    else {
        ok2 = 1;
    }

    if (ok1 == 1 && ok2 == 1 && usernameValue === 'profesor') {
        myFunction2();
    }
    else if (ok1 == 1 && ok2 == 1) {
        myFunction();
    }

    function myFunction() {
        var usernameValue = document.getElementById("username").value.trim();
        var passwordValue = document.getElementById("parola").value.trim();

        var ajax = new XMLHttpRequest();
        var method = "POST";
        var url = "../api/login.php";
        var async = true;
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var myResponse = this.responseText;
                //console.log(myResponse.jwt);
                //localStorage.setItem("jwt", this.responseText);
                //alert(this.responseText);
                setCookie('jwt',this.responseText,7);
                //alert(this.responseText.length);
                
                //alert(getCookie('jwt'));
                //alert(this.responseText);
                //alert("salut!");
                //alert(this.responseText.length);
                //alert(getCookie('jwt'));
            }
            if (this.readyState == 4 && this.status == 400) {
                alert("Nume sau parola gresita!");
              // window.location.replace("http://localhost/testingWeb/html+php/index.php");
               return false;
            }
        };
        ajax.open(method, url, async);
        let obj = { "firstname": usernameValue, "password": passwordValue};
        let json = JSON.stringify(obj);
        //alert(json);
        ajax.send(json);
        setTimeout(() => {  window.location.replace("http://localhost/testingWeb/html+php/jwtVerifLogin.php"); }, 800);
        return false;
    }

    function replaceLocation(){
        location.replace("Menu.html");
    }

    function myFunction2() {
        location.replace("Menu-prof.html");
    }

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

}


