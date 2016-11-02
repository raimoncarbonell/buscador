<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Busqueda</title>
        <style>
            h1{
                color: chocolate;
                text-align: center;
                font-size: 3em;
                text-transform: capitalize;
                font-variant: small-caps;
            }
            
            table{
                width: 400px;
                margin: auto;
                text-align: center;
            }
            
            #titulos
            {
                background-color:burlywood;
            }
            
            tr:nth-child(2n){background-color: beige;}
        </style>
    </head>
    <body>
        <h1></h1>
        <table border="1">
        <?php
            
            
             // datosPeli
            
            echo "<tr><th colspan='3' id='titulos'>Datos basicos</th></tr>";
            $datosPeli= $data['datosPeli'];     
            
            $tit = array_keys($datosPeli[0]);
            echo "<tr>";
            foreach($tit as $titulo){
                echo "<th colspan='3'>$titulo</th>";
            }
            echo "</tr>";
            
            foreach($datosPeli as $t){
                echo "<tr>";
                
                 foreach($t as $fila){
                      //$cab = array_keys($t);
                //print_r($cab)
                     echo "<td colspan='3'>$fila</td>"; 
            }
                echo "</tr>";
            }
            
            // lista de actores
            echo "</table> <table border='1'>";
            echo "<tr><th  colspan='4' id='titulos'>Actores</th></tr>";
            $actores= $data['actores'];  
            
            
            $tit = array_keys($actores[0]);
            echo "<tr>";
            foreach($tit as $titulo){
                echo "<th colspan='3'>$titulo</th>";
            }
            echo "</tr>";
            
            foreach($actores as $t){
                echo "<tr>";
                
                 foreach($t as $fila){
                      //$cab = array_keys($t);
                //print_r($cab)
                     echo "<td colspan='3'>$fila</td>"; 
            }
                echo "</tr>";
            }
            
            //genero
            
                 echo "<tr><th  colspan='4' id='titulos'>Genero y Descripcion</th></tr>";
            $genero= $data['genero'];     
            
            $tit = array_keys($genero[0]);
            echo "<tr>";
            foreach($tit as $titulo){
                echo "<th colspan='2'>$titulo</th>";
            }
            echo "</tr>";
            
            foreach($genero as $t){
                echo "<tr>";
                
                 foreach($t as $fila){
                      //$cab = array_keys($t);
                //print_r($cab)
                     echo "<td colspan='3'>$fila</td>"; 
            }
                echo "</tr>";
            }
            
            
            //idioma
            
         
            $genero= $data['idioma'];     
            
            $tit = array_keys($idioma[0]);
            echo "<tr>";
            foreach($tit as $titulo){
                echo "<th colspan='4'>$titulo</th>";
            }
            echo "</tr>";
            
            foreach($idioma as $t){
                echo "<tr>";
                
                 foreach($t as $fila){
                      //$cab = array_keys($t);
                //print_r($cab)
                     echo "<td colspan='4'>$fila</td>"; 
            }
                echo "</tr>";
            }
           
        ?>
        </table>
        <a href="/raimon/ejrest/form.html">Volver la inicio</a>
    </body>
</html>
















