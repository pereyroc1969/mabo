<?php
header('Content-Type: text/html; charset=iso-8859-1');
require_once("/conectar.php");
$base2=montechingolo3();
$i = 0;
$j=1;
$m=0;
$vec0='';
$vec1='';
$mm = $_REQUEST['mm'];
$yy = $_REQUEST['yyyy'];
$mabo=array('MABO_1','MABO_2','MABO_3','MABO_4');
 $sql2="select mesa,produccion,derivados,ingresos,analista  from MABO.dbo.vis_web_produccion_mesa  where mes=".$mm."and yyyy=".$yy;
    
  $sin=sqlsrv_query($base2,$sql2);
  while( $reg2= sqlsrv_fetch_array($sin, SQLSRV_FETCH_ASSOC) )
  { 
   
    
    if($i==0)
    { 
    $vec0='{"mesa":"'.$reg2['mesa'].'","produccion":"'.$reg2['produccion'].'","derivados":"'.$reg2['derivados'].'","ingresos":"'.$reg2['ingresos'].'","analista":"'.$reg2['analista'].'"}'; 
    $i=$i+1; 
    } 
  else
    {
    $vec1=',{"mesa":"'.$reg2['mesa'].'","produccion":"'.$reg2['produccion'].'","derivados":"'.$reg2['derivados'].'","ingresos":"'.$reg2['ingresos'].'","analista":"'.$reg2['analista'].'"}'.$vec1; 
        
    } ;

   };
   
   echo '['.$vec0.$vec1.']'; 
  
  
  
  
 sqlsrv_free_stmt($sin);
sqlsrv_close($base2);
    ?>

