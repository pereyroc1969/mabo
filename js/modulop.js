// Defaults
//Chart.defaults.global.defaultFontColor = '#005'
//Chart.defaults.global.elements.line.borderWidth = 1
//Chart.defaults.global.elements.rectangle.borderWidth = 1
//Chart.defaults.scale.gridLines.color = '#444'
//Chart.defaults.scale.ticks.display = false

let chart0, chart1, chart2, chart3, chart4,vecSem=[]

document.getElementById("mes").addEventListener("change", () => camb());
document.getElementById("ano").addEventListener("change", () =>camb());
camb();

function camb() {
vecSem=[];
var mes=document.getElementById("mes").value;
var ano=document.getElementById("ano").value;

fetch('http://TE202052A/MABO/myData6.php?mm='+mes+'&yyyy='+ano)
.then(response => response.json())
.then(data => {
    destroyCharts()
    renderCharts(data)
} );


};

function destroyCharts() {
    if(chart0) chart0.destroy() 
    if(chart1) chart1.destroy() 
    if(chart2) chart2.destroy() 
    if(chart3) chart3.destroy() 
    if(chart4) chart4.destroy() 
}
    



function renderCharts(datos){

    let  min=parseInt(datos[0].semana);
    vecSem.push(min);
    for(n=1;n<datos.length;n++)
    {
     let rep=0;   
        for (m=0;m<vecSem.length;m++)
        {
                    if(vecSem[m]===parseInt(datos[n].semana)) {rep=1};
        };
        if(rep==0)
            { min=parseInt(datos[n].semana)
              vecSem.push(min);
            };
 };
   
        vecSem.sort();
    const ctx= document.querySelector('#pChart0').getContext('2d');
    const ctx1= document.querySelector('#pChart1').getContext('2d');
    const ctx2= document.querySelector('#pChart2').getContext('2d');
    const ctx3= document.querySelector('#pChart3').getContext('2d');
    const ctx4= document.querySelector('#pChart4').getContext('2d');
    
    chart0 = grafico1(ctx,datos,'TODAS',vecSem);
    chart1 = grafico1(ctx1,datos,'MABO_1',vecSem);
    chart2 = grafico1(ctx2,datos,'MABO_2',vecSem);
    chart3 = grafico1(ctx3,datos,'MABO_3',vecSem);
    chart4 = grafico1(ctx4,datos,'MABO_4',vecSem);
   
  };

  
  function grafico1(id,jdato,mabo,vectorSem)
  {
    
   
      //type: 'bar',

     let vecPunTodos=[];
     let vecEfiTodos=[];
     let mabo_1p=[],mabo_2p=[],mabo_3p=[],mabo_4p=[];
     let mabo_1e=[],mabo_2e=[],mabo_3e=[],mabo_4e=[];
     var puntMesa=[];
     var efectMesa=[];
     var cantMesa=[];
     var mesas=['MABO_1','MABO_2','MABO_3','MABO_4','sin Especificar','TODAS'];
     var semanas=['Semana 1','Semana 2','Semana 3','Semana 4','Semana 5','Semana 6'];
     let nueSem=[];
     let analistas=[];
    



     for(x=0;x<vectorSem.length;x++)
       {  
          nueSem.push(semanas[x]);
          const todasVec=jdato.filter(punt => (parseInt(punt.semana) ==  vectorSem[x]) );
          let cantSum=0, eficSum=0, puntSum=0;
      for(k=0;k<todasVec.length;k++)
        {
            cantSum=cantSum+parseInt(todasVec[k].cantidad);
            eficSum=eficSum+parseInt(todasVec[k].eficiencia);
            puntSum=puntSum+parseInt(todasVec[k].puntuales);
        }; 
           
            vecPunTodos.push(Math.round(10000*puntSum/cantSum)/100);
            vecEfiTodos.push(Math.round(10000*eficSum/cantSum)/100);
         
     for(l=0;l<4;l++)  {    
     const mesasVec=jdato.filter(punt => (parseInt(punt.semana) == vectorSem[x] && punt.mesa===mesas[l]) );
     let cantS=0, eficS=0, puntS=0;
    for(k=0;k<mesasVec.length;k++)
     {
            cantS=cantS+parseInt( mesasVec[k].cantidad);
            eficS=eficS+parseInt( mesasVec[k].eficiencia);
            puntS=puntS+parseInt( mesasVec[k].puntuales);
     }; 
          
     if(l==0){ mabo_1p.push(Math.round(10000*puntS/cantS)/100);
               mabo_1e.push(Math.round(10000*eficS/cantS)/100)};
     if(l==1){ mabo_2p.push(Math.round(10000*puntS/cantS)/100);
               mabo_2e.push(Math.round(10000*eficS/cantS)/100)};
     if(l==2){ mabo_3p.push(Math.round(10000*puntS/cantS)/100);
               mabo_3e.push(Math.round(10000*eficS/cantS)/100)};
     if(l==3){ mabo_4p.push(Math.round(10000*puntS/cantS)/100);
               mabo_4e.push(Math.round(10000*eficS/cantS)/100)};
     } ;
         };








 if(mabo=='TODAS'){
        const data = {
        labels:nueSem,
        datasets: [
                     
            {
               label: mesas[5],
               data:vecPunTodos,
               backgroundColor: estilos.fondo[0],
               borderColor: estilos.color[0],
            
                borderWidth: 1
            },
            {
                label: mesas[0],
                data: mabo_1p,
                backgroundColor: estilos.fondo[1],
                borderColor: estilos.color[1],
                
                borderWidth: 1
                },
            {
                label: mesas[1],
                data: mabo_2p,
                backgroundColor: estilos.fondo[2],
                borderColor: estilos.color[2],
                   
                borderWidth: 1
                    },
            {
                label: mesas[2],
                data: mabo_3p,
                backgroundColor: estilos.fondo[4],
                borderColor: estilos.color[4],
                        
                borderWidth: 1
                    },   

           {
               label: mesas[3],
               data: mabo_4p,
               backgroundColor: estilos.fondo[3],
               borderColor: estilos.color[3],
                               
               borderWidth: 1
                     },
           ],
          }
    
     const options = { scales:   {
        y: {
            beginAtZero: true
            }
                                 }
                     };
    

    //console.log(data) ;
    return new Chart(id, { type: 'line', data, options });

};










if(mabo!='TODAS'){

    const anaVec=jdato.filter(punt => ( punt.mesa===mabo ));
    let auxAna=[],j=0;
        auxAna.push(anaVec[0].analista);
    for(j=1;j<anaVec.length;j++){
    let x=0;
         for(i=0;i<auxAna.length;i++){
            if(auxAna[i]==anaVec[j].analista){x=1;i=auxAna.length; } else{x=0};
             }
        if(x===0){auxAna.push(anaVec[j].analista);}
           
                                        };

    let vectoSet=[];
for(p=0;p<auxAna.length;p++)
    {   let vecAna=[];
        let cant=0;
        let puntu=0;

        for(s=0;s<vectorSem.length;s++){
        const mesasVec=jdato.filter(punt => (parseInt(punt.semana) == vectorSem[s] && punt.mesa===mabo && punt.analista===auxAna[p]) );
        let cant=0;
        let puntu=0;
        //alert(vectorSem[s]);
        //alert(auxAna[p]);
        //alert(mesasVec[0]?.puntuales);
        //alert(mesasVec[0]?.cantidad);
       if(mesasVec[0]?.puntuales!= undefined)  
       {
         cant=parseInt( mesasVec[0].cantidad);
            puntu=parseInt( mesasVec[0].puntuales);   
            cantAnal=Math.round(10000*puntu/cant)/100;
        vecAna.push(cantAnal);
        }
        else
        {
            vecAna.push('');    
        }
        ;
        //console.log(cantAnal);
        };
        
//console.log(vecAna);




        vectoSet.push({label : auxAna[p], data: vecAna ,backgroundColor: estilos.fondo[p],borderColor: estilos.color[p],  borderWidth: 1});
    };
    








    const data = {
    labels:nueSem,
    datasets: vectoSet,
      }

 const options = { scales:   {
    y: {
        beginAtZero: true
        }
                             }
                 };


//console.log(data) ;
return new Chart(id, { type: 'line', data, options });

};

   

   
}

  





