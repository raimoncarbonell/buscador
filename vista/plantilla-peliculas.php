<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Busqueda <?php echo $_GET['dato']; ?></title>
            <link rel="stylesheet" href="../css/estilo.ccs">
 
    </head>
    <body>
        <?php
            $base = $data['url'];
            unset($data['url']);
            //echo "<h1>$base</h1>";
        ?>
          <form method="get" action="<?php echo $base ?>/listaPeliculas">
            <input type="text" name="dato">
            <input type="submit" value="buscar titulo">
        </form>
        <h1> <?php echo $_GET['dato']; ?></h1>
        
         
      
        <table>
        <?php
           
            if(count($data)>0)
            {  
                
                
                $cab = array_keys($data[0]);
                echo "<tr>";
                foreach($cab as $t){

                    echo "<th>$t</th>";
                }

                echo "</tr>";
                foreach($data as $fila){
                    echo "<tr>";
                    foreach($fila as $elem){
                       // print_r($elem);
                        echo "<td>$elem</td>";
                    }
                    if(isset($fila['id_Pelicula'])){
                        echo "<td><a href='${base}/pelicula/${fila['id_Pelicula']}'>Ver datos</a></td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
            
        </table>
        <a href='/raimon/ejrest/form.html">Volver la inicio</a>
    </body>
</html>
















