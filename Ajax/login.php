<?php 
	 //url contra la que atacamos
	 $ch = curl_init("http://localhost:8888/IsaacAPI/usersfuel/public/users/login.json");
	 //a true, obtendremos una respuesta de la url, en otro caso, 
	 //true si es correcto, false si no lo es
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 //establecemos el verbo http que queremos utilizar para la petición
	 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	 //obtenemos la respuesta
	 $response = curl_exec($ch);
	 // Se cierra el recurso CURL y se liberan los recursos del sistema
	 curl_close($ch);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Index</title>
		 <script typ="text/javascript">
		    function ajax(){
		      var userName = document.getElementById('name').value;
		      var password = document.getElementById('password').value;
		      console.log(userName);
		      console.log(password);

		      
		      connection = new XMLHttpRequest();
		     
		      connection.onreadystatechange = response;

		      connection.open('GET', "http://localhost:8888/IsaacAPI/usersfuel/public/users/login.json");

		      connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		      connection.send("name=" + userName + "&password=" + password);

		    }
		    function response(){
		      if(connection.readyState == 4){
		        var response = JSON.parse(connection.responseText);
		        document.getElementById('code').innerHTML = response.code;
		        document.getElementById('message').innerHTML = response.message;
		        document.getElementById('user').innerHTML = response.data.username;
		      //document.getElementById('token').innerHTML = response.token;
		        
		      } 
		   }
		    

 		</script>
	</head>
	<body>		
	  <h2>Usuario</h2>
	  <input id='name' type="text">
      	
      <h2>Contraseña</h2>
      	<input id='password' type="text">
      		<button onclick='ajax()'>Login/button>
      <p id='code'/>
	  <p id='message'/>
	  <p id='user'/>
	  <p id='password'/>

        <?php $response = json_decode($response, true) ?>

	</body>
</html>