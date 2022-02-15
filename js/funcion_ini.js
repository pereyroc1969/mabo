//***************************************
//
//***************************************
window.addEventListener('load', inicializar);

var conexionsol;           
 function inicializar()
 {

 var mm=document.getElementById("mm").value;
 
    conexionsol=crearXMLHttpRequest();
    conexionsol.onreadystatechange = pendientes;
    conexionsol.open('GET','pendientes.php?st='+mm, true);
    conexionsol.send(null);
    
document.getElementById("mm").addEventListener('change', cmb);

    
 }  ; 




function cmb(e){
  var mm=document.getElementById("mm").value;
    
    conexionsol=crearXMLHttpRequest();
    conexionsol.onreadystatechange = pendientes;
    conexionsol.open('GET','pendientes.php?st='+mm, true);
    conexionsol.send(null);
    e.preventDefault();
    
 
};
 

 
 
 
 
function  pendientes()
{
  var resultados = document.getElementById("pendientes");
  if(conexionsol.readyState == 4)
  {
    resultados.innerHTML = conexionsol.responseText;
  } 
  else 
  {
    resultados.innerHTML = 'Cargando...';
  }
}

 
 

 
        
  


        





	 
function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}