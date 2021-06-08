<?php
  // JWT
  define ('JWT_KEY',"Vrem sa luam 10 la web.");
  define ('JWT_ISS', "http://localhost/rest-api-authentication-example");
  define ('JWT_AUD', "http://localhost/rest-api-authentication-example");
  define ('JWT_IAT', time());
  define ('JWT_EXP', time()+3600000); // valabil 1000 ore  
?>  