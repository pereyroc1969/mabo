<?php
$usuario= strtoupper(trim($_SERVER['REMOTE_USER']));      //tasa\XXXXXXX
$estruc = split('[\]',$usuario);                                                                   // acá separas dominio de usuario
$usuario=$estruc[1];
$ano= date("Y");
$mes= date("m");
$dia= date("d");
$des=$dia."-".$mes."-".$ano;
require_once("funcion_php/conectar.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Indicadores organismos publicos</title>
        <meta name="keywords" content="" />
		<meta name="description" content="" />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
	    <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" /> 
      
	</head>
	
	<body>

		<div id="wrapper">
		
			<div id="logo">
				<h1><span>MABO</span></h1>
				<p>Mesa Ágil de Organismos Publicos</p>
			</div>
			
			<div id="page" class="round">
			
				<div id="menu" class="round">
					<ul>
						<li><a href="mabo.php" title="" class="round active">Pendientes</a></li>
						<li><a href="produccion5.php" title="" class="round">Producción</a></li>  
						<li><a href="puntualidad5.php" title="" class="round">Puntualidad</a></li>
					    <li><a href="eficiencia5.php" title="" class="round">Eficiencia</a></li>
                     
					</ul>
                    	
				</div>
				
				<div id="splash">
					<img src="" alt="" width="940" height="10" class="round" />
				</div>
				
				<div id="wrapper2" class="round">
				<div id="sidebar" class="round" style="width: 940px; height: 2680px;">
                    
				<div id="seg"  align="left" style=" width: 600px; height: 2100px;">
						   <ul>
                <tr> <td> Proceso: &nbsp;&nbsp;
                           
                           <select size="1"name="mm" id="mm"  style="width:250;height:22 ">
                                                      <option value="Todos">Todos</option>
                                                      <option value="Defensa del Consumidor">Defensa de consumidores</option>  
                                                      <option value="Defensa del Consumidor Informal">Defensa de consumidores informal</option> 
                                                      <option value="Defensor del Pueblo">Defensoria del pueblo</option>                         
                            </select>                        </td>
                </tr>   
                <br>   
                <br>
                <tr>     <div id="pendientes"> </div>
						 
					
                          
                      </div>
						                       
                        
					
				
                
                
              	</div>
                    
                   
				
                        
 
                        
  
</div>						
					<!-- End Content -->
					
			
					<div style="clear: both"></div>
			
				<!-- End Wrapper 2 -->
				</div>
				
			<!-- End Page -->
			</div>
		
		<!-- End Wrapper -->
		</div>
		
		<div id="footer">
			<p>copyright &copy; 2019 . Diseño <a>Octavio Pereyra</a>.</p>
		</div>
		
		<!-- End Wrapper -->
<script type="text/javascript" src="js/funcion_ini.js" ></script>  		
<div style="text-align: center; font-size: 0.75em;"><a ></a>.</div></body>
	
</html>
