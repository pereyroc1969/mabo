<?php
$usuario= strtoupper(trim($_SERVER['REMOTE_USER']));      //tasa\XXXXXXX
$estruc = split('[\]',$usuario);                                                                   // acá separas dominio de usuario
$usuario=$estruc[1];
$ano= date("Y");
$mes= date("m");
$dia= date("d");
$des='01'."-".$mes."-".$ano;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
        
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
     
     
       	
       <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" /> 
       
       
       <!-- Styles -->
<style>
#chartdiv {
    height: 320px;
}
#chartdiv2 {
    height: 320px;
}
#chartdiv3 {
    height: 320px;
}
</style>






<!-- Chart code -->

<!-- HTML -->
		
        
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
						<li><a href="mabo.php" title="" class="round">Pendientes</a></li>
						<li><a href="produccion5.php" title="" class="round active">Producción</a></li> 
                        <li><a href="puntualidad5.php" title="" class="round">Puntualidad</a></li> 
                        <li><a href="eficiencia5.php" title="" class="round">Eficiencia</a></li>
					 <!--   <li><a href="kamban.php" title="" class="round">Puntualidad</a></li>
                        <li><a href="graficos2.php" title="" class="round">Gestiones</a></li> 
                        <li><a href="actualizar.php" title="" class="round">Eficiencia</a></li> -->
                        
					
					</ul>
                    	
				</div>
				
				<div id="splash">
					<img src="" alt="" width="960" height="10" class="round" />
				</div>
				
				<div id="wrapper2" class="round">
				
					<div id="sidebar" class="round" style="width: 940px; height: 1150px;">
                    
					    
                        
                        
          <section class="cols-1">
            <figure>            
            
			<div class="select">
  <select id='ano' >
    
    <option value="2020"<?php if($ano==='2020'){echo('selected');}   ?> >2020</option>
	<option value="2021"<?php if($ano==='2021'){echo('selected');}   ?> >2021</option>
	<option value="2022"<?php if($ano==='2022'){echo('selected');}   ?> >2022</option>
	<option value="2023"<?php if($ano==='2023'){echo('selected');}   ?> >2023</option>
    
  </select>
  <select id='mes'>
    
    <option value="1" <?php if($mes==='1'){echo('selected');}   ?>>enero</option>
    <option value="2" <?php if($mes==='2'){echo('selected');}   ?>>febrero</option>
    <option value="3" <?php if($mes==='3'){echo('selected');}   ?>>marzo</option>
	<option value="4" <?php if($mes==='4'){echo('selected');}   ?>>abril</option>
    <option value="5" <?php if($mes==='5'){echo('selected');}   ?>>mayo</option>
    <option value="6" <?php if($mes==='6'){echo('selected');}   ?>>junio</option>
	<option value="7" <?php if($mes==='7'){echo('selected');}   ?>>julio</option>
    <option value="8" <?php if($mes==='8'){echo('selected');}   ?>>agosto</option>
    <option value="9" <?php if($mes==='9'){echo('selected');}   ?>>septiembre</option>
	<option value="10" <?php if($mes==='10'){echo('selected');}   ?>>octubre</option>
    <option value="11" <?php if($mes==='11'){echo('selected');}   ?>>noviembre</option>
    <option value="12" <?php if($mes==='12'){echo('selected');}   ?>>diciembre</option>









  </select>
</div>
  
  <canvas id="miChart" width="800px" height="200px"></canvas>

  </figure>
  </section>
    
  
  <section class="cols-2">
            <figure>
                
                <h3>Mesa 1</h3>
                <canvas id="chart1"></canvas>
            </figure>

            <figure>
                
                <h3>Mesa 2</h3>
                <canvas id="chart2"></canvas>
            </figure>
        </section>

        

        <section class="cols-2">
            <figure>
                
                <h3>Mesa 3</h3>
                <canvas id="chart3"></canvas>
            </figure>

            <figure>
               
                <h3>Mesa4</h3>
                <canvas id="chart4"></canvas>
            </figure>

           
        </section>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="modulo.js"></script>
  

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

					
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
			<p>copyright &copy; 2018 . Diseño <a>Octavio Pereyra</a>.</p>
		</div>
		
		
<div style="text-align: center; font-size: 0.75em;"><a ></a>.</div></body>
	
</html>
