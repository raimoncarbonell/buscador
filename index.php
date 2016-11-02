<?php
require "vendor/autoload.php";

$app = new Slim\App();

$c = $app->getContainer();

$c['bd'] = function(){
    $pdo = new PDO("mysql:host=localhost;dbname=sakila", "root");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$c['view'] = new \Slim\Views\PhpRenderer('vista/');




$app->get("/pelicula/{id}", function($request, $response, $args){
    $params=$request->getParsedBody();
    $con = $this->bd;
    $film_id="${args['id']};";
    
    $actores=actores($film_id, $con,$response);
    $genero=genero($film_id, $con,$response);
    $idioma=idioma($film_id, $con,$response);
    $datosPeli=datosPeli($film_id,$con,$response);
    
    $datos['actores']=$actores;
    $datos['genero']=$genero;
    $datos['idioma']=$idioma;
    $datos['datosPeli']=$datosPeli;
   //print_r($datos);
    
   $response = $this->view->render($response, "plantilla-datos-peliculas.php",$datos);
    //return $response;
});


$app->get("/listaPeliculas", function($request, $response, $args){
    $con = $this->bd;
    
    $buscar=$_GET['dato']; 
    $sql="select film_id as id_Pelicula ,f.title as Titulo ,f.release_year as Publicacion from film f where f.title like '%${buscar}%';";
   // $response->write($sql);
    $res = $con->query($sql);
   
    $d=$res->fetchAll();
    
    $d['url'] = $request->getUri()->getBasePath();
   
    
    $response = $this->view->render($response, "plantilla-peliculas.php", $d);
    return $response;
});
$app->run();

// funciones 

function actores ($film_id,$con,$response)
{
    
    
    $sql="select actor.first_name as Nombre ,actor.last_name as Apellido from actor ,film_actor, film WHERE film.film_id='${film_id}' AND film_actor.film_id=film.film_id and film_actor.actor_id=actor.actor_id;";
   // $response->write($sql);
    $res = $con->query($sql);
   
    $actores=$res->fetchAll();
    
    return $actores;
    
}

function genero ($film_id,$con,$response)
{
    
    
    $sql="SELECT film.description as descripcion,category.name as genero FROM film,category,film_category WHERE film.film_id='${film_id}' AND film_category.category_id=category.category_id and film_category.film_id=film.film_id";
    //$response->write($sql);
    $res = $con->query($sql);
   
    $genero=$res->fetchAll();
    
    return $genero;
    
}

function idioma ($film_id,$con,$response)
{
     $sql="SELECT language.name as idioma FROM language,film WHERE film.film_id='${film_id}' AND film.language_id=language.language_id";
    //$response->write($sql);
    $res = $con->query($sql);
   
    $idioma=$res->fetchAll();
    
    return $idioma;
    
}
function datosPeli ($film_id,$con,$response)
{
    $sql="SELECT title as titulo,description as descripcion,length as duracion FROM film WHERE film_id='${film_id}'"; 
    //$response->write($sql);
    $res = $con->query($sql);
   
    $datosPeli=$res->fetchAll();
    
    return $datosPeli;
    
}



?>














