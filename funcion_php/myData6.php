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
 $sql2="SELECT  a.[semana] ,a.SECTOR,a.[responsable_gestion] analista,SUM(a.[puntual]) puntuales,SUM(a.[cuenta]) cantidad,SUM(a.[eficiencia]) eficiencia
FROM [MABO].[dbo].[vis_web_puntualidad_mesa]  a
inner join  
(select distinct DATEPART(wk,fc_fecha) sem,cd_año as ano  from [MABO].[dbo].[TIPO_FECHAS] where [cd_mes]=".$mm."and cd_año=".$yy.") s
on  a.semana=s.sem and a.yyyy=s.ano group by a.[semana] ,a.[SECTOR],a.[responsable_gestion] " ;
    
  $sin=sqlsrv_query($base2,$sql2);
  while( $reg2= sqlsrv_fetch_array($sin, SQLSRV_FETCH_ASSOC) )
  { 
   
    
    if($i==0)
    { 
    $vec0='{"semana":"'.$reg2['semana'].'","mesa":"'.$reg2['SECTOR'].'","puntuales":"'.$reg2['puntuales'].'","cantidad":"'.$reg2['cantidad'].'","eficiencia":"'.$reg2['eficiencia'].'","analista":"'.$reg2['analista'].'"}'; 
    $i=$i+1; 
    } 
  else
    {
    $vec1=',{"semana":"'.$reg2['semana'].'","mesa":"'.$reg2['SECTOR'].'","puntuales":"'.$reg2['puntuales'].'","cantidad":"'.$reg2['cantidad'].'","eficiencia":"'.$reg2['eficiencia'].'","analista":"'.$reg2['analista'].'"}'.$vec1; 
        
    } ;

   };
   
   echo '['.$vec0.$vec1.']'; 
  
  
  
  
 sqlsrv_free_stmt($sin);
sqlsrv_close($base2);
    ?>

