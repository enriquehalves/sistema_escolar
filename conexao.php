<?php 

 function conectar(){

 	$servidor ="localhost";
 	$usuario  ="root";
 	$senha    ="10021993";
 	$bd       ="sistema_escolar";

 	$con = new mysqli($servidor,$usuario,$senha,$bd);
 	return $con;
 }

 $conexao = conectar();



 ?>