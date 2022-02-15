<?php
function sicollar()
{
$mysql_host=mysql_connect("192.168.30.91","sicollar","S1c0llar")or die("Problemas en la conexion");
mysql_select_db("pdir",$mysql_host)or die("Problemas en la seleccion de la base de datos");
return $mysql_host;
};

function ssamse7()
{
 $a7=mssql_connect("SSAMSE7","PEREYRAOC","P3r3_3938");
mssql_select_db("master",$a7)or die("Problemas en la seleccion de la base de datos");
return $a7 ;
};
function ssamse3()
{
 $a3=mssql_connect("SSAMSE3","PEREYRAOC","P3r3_3938");
mssql_select_db("DDAi",$a4)or die("Problemas en la seleccion de la base de datos");
return $a3 ;
};
function ssamse2()
{
 $a2=mssql_connect("SSAMSE2","PEREYRAOC","P3r3_3938");
mssql_select_db("master",$a2)or die("Problemas en la seleccion de la base de datos");
return $a2 ;
};

function speedytools()
{
 $base=mssql_connect("speedytools2","soporte","soporte");
mssql_select_db("master",$base)or die("Problemas en la seleccion de la base de datos");
return $base ;
};
function local()
{
 $sico=mssql_connect("TPHP5877\DOT4","dot5","dot5");
mssql_select_db("SICOLLAR",$sico)or die("Problemas en la seleccion de la base de datos");
return $sico ;
};


function montechingolo3()
{
$sico=sqlsrv_connect( "10.245.72.60", array("UID" => "sa", "PWD" => "602590","ReturnDatesAsStrings"=>true, "Database"=>"MABO", "CharacterSet" => "UTF-8",));
#$sico=sqlsrv_connect( "10.245.72.60", array("UID" => "sa", "PWD" => "602590","ReturnDatesAsStrings"=>true, "Database"=>"MABO"));
return $sico ;
};
?>
