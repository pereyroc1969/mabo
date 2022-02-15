<?php
header('Content-Type: text/html; charset=iso-8859-1');
require_once("funcion_php/conectar.php");
$usuario= strtoupper(trim($_SERVER['REMOTE_USER']));      //tasa\XXXXXXX
$estruc = split('[\]',$usuario);                                                                   // acá separas dominio de usuario
$usuario=$estruc[1];
$base2=montechingolo3();
$i = 2;
$j=1;
$m=0;
$mabo=array('MABO_1','MABO_2','MABO_3','MABO_4');
$mesa=array(1,2,3,4);
$dias=array('Vencidos','Hoy','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','Total');
$sql="SELECT TOP 8 format([fc_fecha], 'dd-MMM') as dia  FROM [MABO].[dbo].[TIPO_FECHAS]  where [fc_fecha]>getdate() and cd_tipo_fecha ='H'";
$sin=sqlsrv_query($base2,$sql);
while( $reg2= sqlsrv_fetch_array($sin, SQLSRV_FETCH_ASSOC) )
{
$dias[$i]=$reg2['dia'];
$i=$i+1;
}; 
$sql="SELECT TOP 9 format([fc_fecha] , 'dd-MM-yyyy') as dia  FROM [MABO].[dbo].[TIPO_FECHAS]  where [fc_fecha]>=cast(getdate() as date) and cd_tipo_fecha ='H'";
$i = 1;
$dias2=array('VENCIDO','Hoy','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','1-Ene','Total');
$sin1=sqlsrv_query($base2,$sql);
while( $reg1= sqlsrv_fetch_array($sin, SQLSRV_FETCH_ASSOC) )
{
$dias2[$i]=$reg1['dia'];
$i=$i+1;
};

$q = $_REQUEST['st'];
$i = 1;
$m=0;
$mesa=array(1,2,3,4);
if($q=='Todos')
{
$proceso="%" ;    
}
else
{
$proceso=$q;
};
$com='"';
$form='dd-MM-yyyy';
$reg_length=1;

$arr_reg=count($rows);


$arr_length = count($mesa);


 
for($j=0;$j<$arr_length;$j++)
{
    $encabe='';
$encabe_m='<table class="tg"><thead>  <tr>    <th class="tg-c3ow" colspan="12">MESA '.$mesa[$j].'</th>  </tr></thead><tbody>';
  $encabe='<tr> 
    <td class="tg-g3jt" width="15px">Asignado</td>';
   for($i=0;$i<=9;$i++) 
    {
        $encabe=$encabe.'<td class="tg-g3jt"   >'.$dias[$i].'</td>';
    };
   $encabe=$encabe.'<td class="tg-mooa">'.$dias[10].'</td></tr>';
  

  $cuerpo1='';
  $n=0;
  $sql2="select responsable, Sum(Vencidos)as Vencidos, Sum(Hoy)as Hoy, Sum(dia2)as dia2,
 Sum(dia3)as dia3, Sum(dia4)as dia4, Sum(dia5)as dia5, Sum(dia6)as dia6, Sum(dia7)as dia7, Sum(dia8)as dia8, Sum(dia9)as dia9, Sum(total)as total
  from MABO.[dbo].[vis_web_pendientes_mesa] where [tipo_proceso] like '".$proceso."' and [SECTOR] like'".$mabo[$j]."'
  group by responsable
  ";
 
    
  $sin=sqlsrv_query($base2,$sql2);
  
    while($reg= sqlsrv_fetch_array($sin, SQLSRV_FETCH_ASSOC))
{

if($n==0)
{
    
    $cuerpo1=$cuerpo1.'
    <tr><td class="tg-0pky">'.$reg['responsable'].'</td>
    <td class="tg-kw3l">'.$reg['Vencidos'].'</td>
    <td class="tg-k7zv">'.$reg['Hoy'].'</td>
    <td class="tg-c3ow">'.$reg['dia2'].'</td>
    <td class="tg-c3ow">'.$reg['dia3'].'</td>
    <td class="tg-c3ow">'.$reg['dia4'].'</td>
    <td class="tg-c3ow">'.$reg['dia5'].'</td>
    <td class="tg-c3ow">'.$reg['dia6'].'</td>
    <td class="tg-c3ow">'.$reg['dia7'].'</td>
    <td class="tg-c3ow">'.$reg['dia8'].'</td>
    <td class="tg-c3ow">'.$reg['dia9'].'</td>
    <td class="tg-7btt">'.$reg['total'].'</td>
  </tr>';
$n=$n+1;    
}
else
{
    $cuerpo1=$cuerpo1.'
    <tr>
    <td class="tg-phtq">'.$reg['responsable'].'</td>
    <td class="tg-5gn3">'.$reg['Vencidos'].'</td>
    <td class="tg-w9bj">'.$reg['Hoy'].'</td>
    <td class="tg-svo0">'.$reg['dia2'].'</td>
    <td class="tg-svo0">'.$reg['dia3'].'</td>
    <td class="tg-svo0">'.$reg['dia4'].'</td>
    <td class="tg-svo0">'.$reg['dia5'].'</td>
    <td class="tg-o7qv">'.$reg['dia6'].'</td>
    <td class="tg-svo0">'.$reg['dia7'].'</td>
    <td class="tg-svo0">'.$reg['dia8'].'</td>
    <td class="tg-svo0">'.$reg['dia9'].'</td>
    <td class="tg-jmht">'.$reg['total'].'</td>
  </tr>';
    
$n=$n-1;    

};
};
  
  
  
  
  
  $cierre='</tbody></table>';
  echo ($encabe_m.$encabe.$cuerpo1.$cierre.'</br>');
  
 };
 sqlsrv_free_stmt($sin);
sqlsrv_close($base2);
    ?>

