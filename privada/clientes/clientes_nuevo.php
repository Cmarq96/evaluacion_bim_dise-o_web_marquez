<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");
//$db->debug=true;

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>
       <p> &nbsp;</p>";
        
        echo"<form action='clientes_nuevo1.php' method='post' name='formu'>";
        echo"<center>
        <h1>INSERTAR CLIENTE</h1>
                <table class='listado'>
                  <tr>
                    <th><b>Nombre</b></th>
                    <td><input type='text' name='nombre' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  <tr>
                    <th><b>Apellido</b></th>
                    <td><input type='text' name='apellido' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  <tr>
                    <th><b>Celular</b></th>
                    <td><input type='text' name='celular' size='10' onkeyup='this.value=this.value.toUpperCase()'></td>
                  </tr>
                  <tr>
                    <td align='center' colspan='2'>  
                      <input type='submit' value='ADICIONAR CLIENTE'  >
                    </td>
                  </tr>
                </table>
                </center>";
          echo"</form>" ;     
    /*}*/

echo "</body>
      </html> ";

 ?>