function jwtVerif(){
    var ajax = new XMLHttpRequest();
    var url = "../html+php/jwtVerification.php";
    var async = true;
    var method = "POST";


    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert("salut2");
            var myArr = JSON.parse(this.responseText);
            console.log(this.responseText);
            console.log(myArr);
        }
        if (this.readyState == 4 && this.status == 401) {
            //alert(this.responseText);
            alert("salut!");
            window.location.replace("http://localhost/testingWeb/html+php/index.html");
        }    
      };

    ajax.open(method, url, async);
    var jwt_stocat = window.localStorage.getItem("jwt");
    ajax.setRequestHeader("Authorization", "Bearer "+jwt_stocat);
}