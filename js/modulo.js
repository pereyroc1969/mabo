// Defaults
//Chart.defaults.global.defaultFontColor = '#005'
//Chart.defaults.global.elements.line.borderWidth = 1
//Chart.defaults.global.elements.rectangle.borderWidth = 1
//Chart.defaults.scale.gridLines.color = '#444'
//Chart.defaults.scale.ticks.display = false

let chart0, chart1, chart2, chart3, chart4

document.getElementById("mes").addEventListener("change", () => camb());
document.getElementById("ano").addEventListener("change", () =>camb());
camb();

function camb() {

var mes=document.getElementById("mes").value;
var ano=document.getElementById("ano").value;

fetch('http://TE202052A/MABO/myData5.php?mm='+mes+'&yyyy='+ano)
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
    const ctx= document.querySelector('#miChart').getContext('2d');
    const ctx1= document.querySelector('#chart1').getContext('2d');
    const ctx2= document.querySelector('#chart2').getContext('2d');
    const ctx3= document.querySelector('#chart3').getContext('2d');
    const ctx4= document.querySelector('#chart4').getContext('2d');
    
    chart0 = grafico1(ctx,datos,'TODAS');
    chart1 = grafico1(ctx1,datos,'MABO_1');
    chart2 = grafico1(ctx2,datos,'MABO_2');
    chart3 = grafico1(ctx3,datos,'MABO_3');
    chart4 = grafico1(ctx4,datos,'MABO_4');
   
  };

  
  function grafico1(id,jdato,mabo)
  {
   
      //type: 'bar',
     var produceMesa=[];
     var derivaMesa=[];
     var ingresoMesa=[];
     var mesas=['MABO_1','MABO_2','MABO_3','MABO_4','sin Especificar'];
     for(n=0;n<5;n++){
        ;var prod=0;var derv=0; var ingr=0; 
        for(m=0;m<jdato.length;m++){
            if(jdato[m].mesa===mesas[n]){
                    prod=prod+parseInt(jdato[m].produccion);
                    derv=derv+parseInt(jdato[m].derivados);
                    ingr=ingr+parseInt(jdato[m].ingresos);
                         }
                                    };
    produceMesa.push(prod);
            derivaMesa.push(derv);
            ingresoMesa.push(ingr);
     
                    };
     
    const type='bar';
     const jdat=jdato.filter(person => (person.mesa === mabo) );

     var x=0;var produceAnal=[];var analista=[];
     var derivaAnal=[];var ingresoAnal=[];var long=jdat.length;var agregar=0;
     for(x=0;x<long;x++){
       
        analista.push(jdat[x].analista);
        produceAnal.push(jdat[x].produccion);
        derivaAnal.push(jdat[x].derivados);
        ingresoAnal.push(jdat[x].ingresos);
        };

        if(mabo==='TODAS')
        {
            analista=mesas;
            produceAnal=produceMesa;
            derivaAnal=derivaMesa;
            ingresoAnal=ingresoMesa;
        };
   
     const data = {
        labels:analista,
        datasets: [{
            label: 'Produccion',
            data: produceAnal,
            backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)' ,'rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)' ],
            borderColor: ['rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)','rgba(255, 99, 132, 1)'],
            borderWidth: 1
           },
           {
            label: 'Ingresos',
            data: ingresoAnal,
            backgroundColor: ['rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)' ],
            borderColor: ['rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)' ],
            borderWidth: 1
            },
           {
            label: 'Derivados',
            data: derivaAnal,
            backgroundColor: ['rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)','rgba(173, 255, 47, 0.2)' ],
            borderColor: ['rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)','rgba(173, 255, 47, 1)'],
            borderWidth: 1
            }  ],
                    }
    
     const options = { scales:   {
        y: {
            beginAtZero: true
            }
                                 }
                     }

    return new Chart(id, { type: 'bar', data, options })
};



