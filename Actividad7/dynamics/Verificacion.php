<?php
//Se recibe las variables del formulario
$Nombre=$_POST['Nombre'];
$ApellidoP=$_POST['Ape_P'];
$ApellidoM=$_POST['Ape_M'];
$Nacimiento=$_POST['Fecha'];
$Usuario=$_POST['RFC'];
$Contraseña=$_POST['Contraseña'];
$NombreS=(isset($_POST['NombreS']))?$_POST['NombreS']:"Sin segundo nombre";
//Pasar a mayúsculas para la RFC
$APM=strtoupper($ApellidoP);
$AMM=strtoupper($ApellidoM);
$NM=strtoupper($Nombre);
$NSM=strtoupper($NombreS);
//Se define la RFC sin homoclave para verificar si los datos coinciden
$RFC=$Usuario [0].$Usuario [1].$Usuario [2].$Usuario [3].
     $Usuario [4].$Usuario [5].$Usuario [6].$Usuario [7].
     $Usuario [8].$Usuario [9];
//Variables para verificar la contraseña
$CLetras= preg_match_all("/[A-Za-z]/",$Contraseña);
$CNumeros= preg_match_all("/[0-9]/",$Contraseña);
$CAmperson= preg_match_all("/\&/",$Contraseña);
$CPesos= preg_match_all("/\$/",$Contraseña);
//Verifica si tiene dos nombres o no
if ($NombreS==false) {
  //Se define una varibale para recrear la RFC contando solo un nombre
  $Checar=$APM [0].$APM [1].$AMM [0].$NM [0].$Nacimiento [8].
          $Nacimiento [9].$Nacimiento [3].$Nacimiento [4].
          $Nacimiento [0].$Nacimiento [1];
  /*Si coinciden los datos con la RFC, ingresó correctamente los datos y pasará
  a la verificar la complejidad de la contraseña*/
  if ($Checar==$RFC) {
    echo "Tu RFC coincide :D<br>
          Bienvenido usuario ".$Nombre." ".$ApellidoP." ".$ApellidoM."<br>
          Cuya fecha de nacimiento es ".$Nacimiento."<br>
          Su RFC es ".$Usuario."<br>";
    //Estas condiciones dicen si la contrasea esta compuesta mayormente por letras o números
    if ($CLetras>=6||$CNumeros>=6) {
      echo "Aunque tu contraseña es bastante débil :c, deberías escoger una mejor <br>";
      echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
    }
    //La contrseña comienza a incluir los caracteres especiales pero sigue utilizando mayormente letras/número
    elseif ($CLetras>=5||$CNumeros>=5||$CAmperson=1||$CPesos=1) {
      echo "Tu contraseña esta mediamente tipada, deberías escoger una mejor <br>";
      echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
    }
    elseif ($CLetras>=4||$CNumeros>=4||$CAmperson>1||$CPesos>1) {
      echo "Tu contraseña esta bastante protegida :D, felicidades<br>";
      echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
    }
    //Si no hay conincidencia se pedirá ingresar correctamente los datos
  }
  else {
    echo "Tu RFC ".$Usuario." no coincide con los datos ingresados :c<br>
          Porfavor verifica que la hayas ingresado correctamente<br>
          <a href=../templates/Formulario.html>Regresa al formulario</a>";
  }
}
//Para personas con dos nombres
else {
  //Si el primero nombre es Jose/Maria se usará la RFC con el segundo nombre
  if ($Nombre=="Jose"||$Nombre=="José"||$Nombre=="Maria"||$Nombre=="María") {
    //Se define una varibale para recrear la RFC contando el segundo nombre
    $Checar=$APM [0].$APM [1].$AMM [0].$NSM [0].$Nacimiento [8].
            $Nacimiento [9].$Nacimiento [3].$Nacimiento [4].
            $Nacimiento [0].$Nacimiento [1];
    /*Si coinciden los datos con la RFC, ingresó correctamente los datos y pasará
    a la verificar la complejidad de la contraseña*/
    if ($Checar==$RFC) {
      echo "Tu RFC coincide :D<br>
            Bienvenido usuario ".$Nombre." ".$NombreS." ".$ApellidoP." ".$ApellidoM."<br>
            Cuya fecha de nacimiento es ".$Nacimiento."<br>
            Su RFC es ".$Usuario."<br>";
      //Estas condiciones dicen si la contrasea esta compuesta mayormente por letras o números
      if ($CLetras>=6||$CNumeros>=6) {
        echo "Aunque tu contraseña es bastante débil :c, deberías escoger una mejor <br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      //La contrseña comienza a incluir los caracteres especiales pero sigue utilizando mayormente letras/número
      elseif ($CLetras>=5||$CNumeros>=5||$CAmperson=1||$CPesos=1) {
        echo "Tu contraseña esta mediamente tipada, deberías escoger una mejor <br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      elseif ($CLetras>=4||$CNumeros>=4||$CAmperson>1||$CPesos>1) {
        echo "Tu contraseña esta bastante protegida :D, felicidades<br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      //Si no hay conincidencia se pedirá ingresar correctamente los datos
    }
    else {
      echo "Tu RFC ".$Usuario." no coincide con los datos ingresados :c<br>
            Porfavor verifica que la hayas ingresado correctamente<br>
            <a href=../templates/Formulario.html>Regresa al formulario</a>";
    }
  }
  //En caso de que no se llame Jose o Maria se seguirá como una RFC de un solo nombre
  else {
    //Se define una varibale para recrear la RFC contando solo un nombre pero para dos nombres
    $Checar=$APM [0].$APM [1].$AMM [0].$NM [0].$Nacimiento [8].
            $Nacimiento [9].$Nacimiento [3].$Nacimiento [4].
            $Nacimiento [0].$Nacimiento [1];
    /*Si coinciden los datos con la RFC, ingresó correctamente los datos y pasará
    a la verificar la complejidad de la contraseña*/
    if ($Checar==$RFC) {
      echo "Tu RFC coincide :D<br>
            Bienvenido usuario ".$Nombre." ".$NombreS." ".$ApellidoP." ".$ApellidoM."<br>
            Cuya fecha de nacimiento es ".$Nacimiento."<br>
            Su RFC es ".$Usuario."<br>";
      //Estas condiciones dicen si la contrasea esta compuesta mayormente por letras o números
      if ($CLetras>=6||$CNumeros>=6) {
        echo "Aunque tu contraseña es bastante débil :c, deberías escoger una mejor <br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      //La contrseña comienza a incluir los caracteres especiales pero sigue utilizando mayormente letras/número
      elseif ($CLetras>=5||$CNumeros>=5||$CAmperson=1||$CPesos=1) {
        echo "Tu contraseña esta mediamente tipada, deberías escoger una mejor <br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      elseif ($CLetras>=4||$CNumeros>=4||$CAmperson>1||$CPesos>1) {
        echo "Tu contraseña esta bastante protegida :D, felicidades<br>";
        echo "<a href=../templates/Formulario.html>Regresa al formulario</a>";
      }
      //Si no hay conincidencia se pedirá ingresar correctamente los datos
    }
    else {
      echo "Tu RFC ".$Usuario." no coincide con los datos ingresados :c<br>
            Porfavor verifica que la hayas ingresado correctamente<br>
            <a href=../templates/Formulario.html>Regresa al formulario</a>";
    }
  }
}
?>
