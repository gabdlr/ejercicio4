

    
//Chart options


//Initialize



const jsonResponse = $.getJSON('servicio-apexchart.php', function(data){
    data: data
    let mujeres = parseInt(data.M);
    let hombres = parseInt(data.H);
    var options = {
        series: [hombres, mujeres],
        chart: {
        width: 380,
        type: 'pie',
      },
      labels: ['Hombres', 'Mujeres'],
       responsive: [{
         breakpoint: 480,
         options: {
           chart: {
             width: 200
           },
           legend: {
             position: 'bottom'
           }
         }
       }]
      };
      const chart = new ApexCharts(document.querySelector('#chart'), options );
    //Render
    chart.render();
    ;})