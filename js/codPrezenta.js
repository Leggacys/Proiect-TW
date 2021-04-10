const form = document.getElementById('form');
const cod = document.getElementById('cod');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
  });

  function checkInputs(){
    const codValue = cod.value.trim();
    var ok=0;
    if (codValue === ''){
        alert("Codul nu a fost introdus.");
        ok=0;
    }
    else{ ok=1;}

  
    if(ok==1)
        myFunction();


        function myFunction() {
          location.replace("Menu.html");
        }
  }
  