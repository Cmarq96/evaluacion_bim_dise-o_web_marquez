<?php
session_start();
require_once("../../conexion.php");
require_once("../../libreria_menu.php");

//$db->debug=true;

$id_cliente=$_POST["id_cliente"];

echo"<html> 
       <head>
         <link rel='stylesheet' href='../../css/estilos.css' type='text/css'>
       </head>
       <body>
       <p> &nbsp;</p>"; 

$sql = $db->Prepare("SELECT *
                     FROM clientes
                     WHERE id_cliente= ?
                     AND _estado <> 'X'                        
                        ");
$rs = $db->GetAll($sql,array($id_cliente));
   if ($rs) {

    foreach($rs as $k => $fila){
        echo"<form action='clientes_modificar1.php' method='post' name='formu'>";
        echo"<center>
        <h1>MODIFICAR CLIENTE</h1>
            <table class='listado'>
                <tr>
                    <th><b>NOMBRE(*)</b></th>
                    <td><input type='text' name='nombre' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["nombre"]."'></td>
                </tr>
                <tr>
                    <th><b>APELLIDO(*)</b></th>
                    <td><input type='text' name='apellido' size='10' onkeyup='this.value=this.value.toUpperCase()' value='".$fila["apellido"]."'></td>
                </tr>

                <tr>
                    <th><b>CELULAR</b></th>
                    <td><input type='text' name='celular' size='10' value='".$fila["celular"]."'></td>
                    </td>                    
                </tr>               
            
              <tr>
                <td align='center' colspan='2'>  
                  <input type='submit' value='MODIFICAR CLIENTE'  >
                  <input type='hidden' name='id_cliente' value='".$fila["id_cliente"]."'>
                </td>
              </tr>

            </table>
            </center>";
      echo"</form>" ;     
                        
  }

    }
                                       
echo "</body>
      </html> ";

 ?>